<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Item;
use App\Models\ReturnItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends Controller
{
    /**
     * Display the user's claims
     */
    public function myClaims()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $claims = Claim::where('user_id', Auth::id())
            ->with(['item.category', 'user'])
            ->orderBy('date_claimed', 'desc')
            ->get();

        return view('my_claims', ['claims' => $claims]);
    }

    /**
     * Display the user's history (claims and returns)
     */
    public function myHistory(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $filter = $request->get('filter', 'all'); // all, claims, returns

        // Fetch claims
        $claims = Claim::where('user_id', Auth::id())
            ->with(['item.category', 'item.user', 'user'])
            ->get()
            ->map(function ($claim) {
                $claim->type = 'claim';
                $claim->date = $claim->date_claimed;
                $claim->status = $claim->status;
                return $claim;
            });

        // Fetch returns
        $returns = ReturnItem::where('user_id', Auth::id())
            ->with(['item.category', 'user'])
            ->get()
            ->map(function ($return) {
                $return->type = 'return';
                $return->date = $return->created_at;
                $return->item_name = $return->item->name ?? 'Item';
                return $return;
            });

        // Merge and filter
        $history = collect();

        if ($filter === 'all' || $filter === 'claims') {
            $history = $history->merge($claims);
        }

        if ($filter === 'all' || $filter === 'returns') {
            $history = $history->merge($returns);
        }

        // Sort by date descending
        $history = $history->sortByDesc('date')->values();

        return view('my_history', [
            'history' => $history,
            'claims' => $claims,
            'returns' => $returns,
            'filter' => $filter
        ]);
    }

    /**
     * Show the form for creating a new claim
     */
    public function create($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $item = Item::findOrFail($itemId);

        return view('claim_item', ['item' => $item]);
    }

    /**
     * Store a newly created claim
     */
    public function store(Request $request)
{
    if (!Auth::check()) {
        return redirect()->route('login');
    }

    $validated = $request->validate([
        'item_id' => 'required|exists:item,id', // Checks singular 'item' table
        'proof_description' => 'required|string|max:1000',
        'contact_email' => 'required|email',
        'phone_number' => 'required|string|max:20',
        'proof_upload' => 'required|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
        'additional_details' => 'nullable|string|max:500'
    ], [
        'item_id.required' => 'Item identification is missing.',
        'item_id.exists' => 'Selected item does not exist.',
        'proof_description.required' => 'Proof description is required.',
        'contact_email.required' => 'Email is required.',
        'phone_number.required' => 'Phone number is required.',
        'proof_upload.required' => 'Please upload proof of ownership.',
    ]);

    // Handle file upload
    $proofImagePath = null;
    if ($request->hasFile('proof_upload')) {
        $file = $request->file('proof_upload');
        $proofImagePath = $file->store('claims', 'public');
    }

    // Save to Database
    Claim::create([
        'user_id' => Auth::id(),
        'item_id' => $validated['item_id'],
        'proof_description' => $validated['proof_description'],
        'contact_email' => $validated['contact_email'],
        'contact_number' => $validated['phone_number'], // Maps form field to migration column
        'image' => $proofImagePath,
        'status' => 'pending',
        'date_claimed' => now()
    ]);

    return redirect()->route('history.index')->with('success', 'Claim submitted successfully!');
}

    /**
     * Show a specific claim
     */
    public function show($itemId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $claim = Claim::where('item_id', $itemId)
            ->where('user_id', Auth::id())
            ->with('item')
            ->firstOrFail();

        return view('claim_details', ['claim' => $claim]);
    }

    /**
     * Show the form for editing a rejected claim
     */
    public function edit($claimId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $claim = Claim::findOrFail($claimId);

        // Authorize - only the claimant can edit
        if ($claim->user_id !== Auth::id()) {
            return redirect()->route('history.index')->with('error', 'Unauthorized action.');
        }

        // Only allow editing of rejected claims
        if ($claim->status !== 'rejected') {
            return redirect()->route('history.index')->with('error', 'Only rejected claims can be re-submitted.');
        }

        return view('edit_claim', ['claim' => $claim]);
    }

    /**
     * Update a rejected claim
     */
    public function update(Request $request, $claimId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $claim = Claim::findOrFail($claimId);

        // Authorize - only the claimant can update
        if ($claim->user_id !== Auth::id()) {
            return redirect()->route('history.index')->with('error', 'Unauthorized action.');
        }

        // Only allow updating of rejected claims
        if ($claim->status !== 'rejected') {
            return redirect()->route('history.index')->with('error', 'Only rejected claims can be re-submitted.');
        }

        $validated = $request->validate([
            'proof_description' => 'required|string|max:1000',
            'contact_email' => 'required|email',
            'phone_number' => 'required|string|max:20',
            'proof_upload' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            'additional_details' => 'nullable|string|max:500'
        ]);

        // Handle file upload if provided
        if ($request->hasFile('proof_upload')) {
            $file = $request->file('proof_upload');
            $proofImagePath = $file->store('claims', 'public');
            $validated['image'] = $proofImagePath;
        }

        // Update claim - reset status to pending
        $claim->update([
            'proof_description' => $validated['proof_description'],
            'contact_email' => $validated['contact_email'],
            'contact_number' => $validated['phone_number'],
            'image' => $validated['image'] ?? $claim->image,
            'status' => 'pending',
            'date_claimed' => now()
        ]);

        return redirect()->route('history.index')->with('success', 'Claim re-submitted successfully! Admin will review it again.');
    }

    /**
     * Show form to edit a rejected return
     */
    public function editReturn($returnId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $return = ReturnItem::findOrFail($returnId);

        // Authorize - only the returner can edit
        if ($return->user_id !== Auth::id()) {
            return redirect()->route('history.index')->with('error', 'Unauthorized action.');
        }

        // Only allow editing of rejected returns
        if ($return->status !== 'rejected') {
            return redirect()->route('history.index')->with('error', 'Only rejected returns can be re-submitted.');
        }

        return view('edit_return', ['return' => $return]);
    }

    /**
     * Update a rejected return
     */
    public function updateReturn(Request $request, $returnId)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $return = ReturnItem::findOrFail($returnId);

        // Authorize - only the returner can update
        if ($return->user_id !== Auth::id()) {
            return redirect()->route('history.index')->with('error', 'Unauthorized action.');
        }

        // Only allow updating of rejected returns
        if ($return->status !== 'rejected') {
            return redirect()->route('history.index')->with('error', 'Only rejected returns can be re-submitted.');
        }

        $validated = $request->validate([
            'contact_email' => 'required|email',
            'contact_number' => 'required|string|max:20',
            'proof_upload' => 'nullable|file|mimes:jpeg,png,jpg,pdf,doc,docx|max:5120',
            'additional_details' => 'nullable|string|max:1000'
        ]);

        // Handle file upload if provided
        if ($request->hasFile('proof_upload')) {
            $file = $request->file('proof_upload');
            $proofImagePath = $file->store('returns', 'public');
            $validated['image'] = $proofImagePath;
        }

        // Update return - reset status to pending
        $return->update([
            'contact_email' => $validated['contact_email'],
            'contact_number' => $validated['contact_number'],
            'image' => $validated['image'] ?? $return->image,
            'status' => 'pending',
            'additional_details' => $validated['additional_details'],
            'updated_at' => now()
        ]);

        return redirect()->route('history.index')->with('success', 'Return re-submitted successfully! Admin will review it again.');
    }
}
