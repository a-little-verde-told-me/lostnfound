<?php

namespace App\Http\Controllers;

use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClaimsController extends Controller
{
    /**
     * Display the user's claims
     */
    public function myClaiams()
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $claims = Claim::where('user_id', Auth::id())
            ->with(['item', 'foundReport'])
            ->orderBy('date_claimed', 'desc')
            ->get();

        return view('my_claims', ['claims' => $claims]);
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

        return view('claim_create', ['item' => $item]);
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
            'item_id' => 'required|exists:item,id',
            'proof_description' => 'required|string|max:1000',
            'phone_number' => 'required|string|max:20',
            'additional_details' => 'nullable|string|max:500'
        ], [
            'item_id.required' => 'Item is required',
            'item_id.exists' => 'Selected item does not exist',
            'proof_description.required' => 'Proof description is required',
            'phone_number.required' => 'Phone number is required'
        ]);

        try {
            $claim = Claim::create([
                'user_id' => Auth::id(),
                'item_id' => $validated['item_id'],
                'proof_description' => $validated['proof_description'],
                'phone_number' => $validated['phone_number'],
                'additional_details' => $validated['additional_details'] ?? null,
                'status' => 'pending',
                'date_claimed' => now()
            ]);

            return redirect()->route('claims.index')->with('success', 'Claim submitted successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error while creating claim. Please try again.');
        }
    }
}
