<?php

namespace App\Http\Controllers;

use App\Models\Claim;
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
            ->with('foundReport')
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

        $item = \App\Models\Item::findOrFail($itemId);

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
            'found_report_id' => 'required|exists:item,id',
            'proof_description' => 'required|string|max:1000',
            'contact_email' => 'required|email',
            'contact_number' => 'required|string|max:20'
        ], [
            'found_report_id.required' => 'Found report is required',
            'found_report_id.exists' => 'Selected item does not exist',
            'proof_description.required' => 'Proof description is required',
            'contact_email.required' => 'Contact email is required',
            'contact_email.email' => 'Please enter a valid email',
            'contact_number.required' => 'Contact number is required'
        ]);

        try {
            $claim = Claim::create([
                'user_id' => Auth::id(),
                'found_report_id' => $validated['found_report_id'],
                'proof_description' => $validated['proof_description'],
                'contact_email' => $validated['contact_email'],
                'contact_number' => $validated['contact_number'],
                'status' => 'pending',
                'date_claimed' => now()
            ]);

            return redirect()->route('claims.index')->with('success', 'Claim submitted successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error while creating claim. Please try again.');
        }
    }
}
