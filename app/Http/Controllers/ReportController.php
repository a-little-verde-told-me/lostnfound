<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ReportController extends Controller
{
    /**
     * Show the form for reporting a found item
     */
    public function showReportFound()
    {
        $categories = Category::all();
        return view('report_found', ['categories' => $categories]);
    }

    /**
     * Store a newly created found item
     */
    public function storeFoundItem(Request $request)
    {
        // Validate the form data (photo is optional, no validation for it)
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'date_found' => 'required|date',
            'location_found' => 'required|string|max:255',
            'location_current' => 'required|string|max:255',
            'description' => 'required|string|max:1000'
        ], [
            'item_name.required' => 'Item name is required',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Selected category does not exist',
            'date_found.required' => 'Date found is required',
            'date_found.date' => 'Please enter a valid date',
            'location_found.required' => 'Location where found is required',
            'location_current.required' => 'Current location is required',
            'description.required' => 'Description is required'
        ]);

        try {
            $imagePath = null;

            // Handle image upload (optional)
            if ($request->hasFile('photo')) {
                try {
                    $file = $request->file('photo');
                    if ($file->isValid()) {
                        $imagePath = $file->storePublicly('items', 'public');
                    }
                } catch (\Exception $e) {
                    // Silently fail - image is optional
                    $imagePath = null;
                }
            }

            // Create the item record
            $item = Item::create([
                'category_id' => $validated['category_id'],
                'name' => $validated['item_name'],
                'description' => $validated['description'],
                'image' => $imagePath,
                'type' => 'Found',
                'status' => 'active',
                'location' => $validated['location_found'],
                'surrender_location' => $validated['location_current'],
                'date_reported' => now(),
                'user_id' => Auth::id() ?? 1
            ]);

            return redirect()->route('home')->with('success', 'Found item reported successfully! Thank you for helping.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error while reporting the item. Please try again.');
        }
    }

    /**
     * Show the form for reporting a lost item
     */
    public function showReportLost()
    {
        $categories = Category::all();
        return view('report_lost', ['categories' => $categories]);
    }

    /**
     * Store a newly created lost item
     */
    public function storeLostItem(Request $request)
    {
        // Validate the form data (photo is optional, no validation for it)
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'date_lost' => 'required|date',
            'location_lost' => 'required|string|max:255',
            'description' => 'required|string|max:1000'
        ], [
            'item_name.required' => 'Item name is required',
            'category_id.required' => 'Category is required',
            'category_id.exists' => 'Selected category does not exist',
            'date_lost.required' => 'Date lost is required',
            'date_lost.date' => 'Please enter a valid date',
            'location_lost.required' => 'Location where lost is required',
            'description.required' => 'Description is required'
        ]);

        try {
            $imagePath = null;

            // Handle image upload (optional)
            if ($request->hasFile('photo')) {
                try {
                    $file = $request->file('photo');
                    if ($file->isValid()) {
                        $imagePath = $file->storePublicly('items', 'public');
                    }
                } catch (\Exception $e) {
                    // Silently fail - image is optional
                    $imagePath = null;
                }
            }

            // Create the item record
            $item = Item::create([
                'category_id' => $validated['category_id'],
                'name' => $validated['item_name'],
                'description' => $validated['description'],
                'image' => $imagePath,
                'type' => 'Lost',
                'status' => 'active',
                'location' => $validated['location_lost'],
                'date_reported' => now(),
                'user_id' => Auth::id() ?? 1
            ]);

            return redirect()->route('home')->with('success', 'Lost item reported successfully! We hope it gets found.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error while reporting the item. Please try again.');
        }
    }

    /**
     * Update a report
     */
    public function update(Request $request, $id)
    {
        $report = Item::findOrFail($id);

        // Authorize - only the owner can edit
        if ($report->user_id !== Auth::id()) {
            return redirect()->route('reports.index')->with('error', 'Unauthorized action.');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:category,id',
            'location' => 'required|string|max:255',
            'surrender_location' => 'nullable|string|max:255',
            'description' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        try {
            // Handle image upload if provided
            if ($request->hasFile('photo')) {
                // Delete old image if exists
                if ($report->image && Storage::disk('public')->exists($report->image)) {
                    Storage::disk('public')->delete($report->image);
                }
                $validated['image'] = $request->file('photo')->storePublicly('items', 'public');
            }

            $report->update($validated);

            return redirect()->route('reports.index')->with('success', 'Report updated successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Error while updating the report. Please try again.');
        }
    }

    /**
     * Delete a report
     */
    public function destroy($id)
    {
        $report = Item::findOrFail($id);

        // Authorize - only the owner can delete
        if ($report->user_id !== Auth::id()) {
            return redirect()->route('reports.index')->with('error', 'Unauthorized action.');
        }

        try {
            // Delete image if exists
            if ($report->image && Storage::disk('public')->exists($report->image)) {
                Storage::disk('public')->delete($report->image);
            }

            $report->delete();

            return redirect()->route('reports.index')->with('success', 'Report deleted successfully!');
        } catch (\Exception $e) {
            return back()->with('error', 'Error while deleting the report. Please try again.');
        }
    }
}
