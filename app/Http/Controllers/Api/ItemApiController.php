<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemApiController extends Controller
{
    /**
     * Get all items (paginated)
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 15);
            $status = $request->query('status', 'active');
            $type = $request->query('type'); // 'lost' or 'found'
            $category = $request->query('category');

            $query = Item::with('user', 'category');

            if ($status) {
                $query->where('status', $status);
            }

            if ($type) {
                $query->where('type', $type);
            }

            if ($category) {
                $query->where('category_id', $category);
            }

            $items = $query->latest('date_reported')->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $items
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch items',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get single item
     */
    public function show($id)
    {
        try {
            $item = Item::with('user', 'category', 'claims')->findOrFail($id);

            return response()->json([
                'success' => true,
                'data' => $item
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Item not found',
                'errors' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Create a new item (report found/lost)
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'category_id' => 'required|exists:category,id',
                'type' => 'required|in:lost,found',
                'date_reported' => 'required|date',
                'location' => 'required|string|max:255',
                'surrender_location' => 'nullable|string|max:255',
                'description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $validated['user_id'] = Auth::id();
            $validated['status'] = 'active';

            // Handle image upload
            if ($request->hasFile('image')) {
                $validated['image'] = $request->file('image')->store('items', 'public');
            }

            $item = Item::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Item created successfully',
                'data' => $item
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create item',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Update an item
     */
    public function update(Request $request, $id)
    {
        try {
            $item = Item::findOrFail($id);

            // Check if user owns the item
            if ($item->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $validated = $request->validate([
                'name' => 'sometimes|string|max:255',
                'category_id' => 'sometimes|exists:category,id',
                'location' => 'sometimes|string|max:255',
                'surrender_location' => 'nullable|string|max:255',
                'description' => 'sometimes|string|max:1000',
                'status' => 'sometimes|in:active,claimed,returned',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($item->image) {
                    Storage::disk('public')->delete($item->image);
                }
                $validated['image'] = $request->file('image')->store('items', 'public');
            }

            $item->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Item updated successfully',
                'data' => $item
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update item',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Delete an item
     */
    public function destroy($id)
    {
        try {
            $item = Item::findOrFail($id);

            // Check if user owns the item
            if ($item->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            // Delete image if exists
            if ($item->image) {
                Storage::disk('public')->delete($item->image);
            }

            $item->delete();

            return response()->json([
                'success' => true,
                'message' => 'Item deleted successfully'
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete item',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Get public list of items without auth
     */
    public function publicList(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 15);
            $status = $request->query('status', 'active');
            $type = $request->query('type');

            $query = Item::with('user', 'category')
                ->where('status', $status);

            if ($type) {
                $query->where('type', $type);
            }

            $items = $query->latest('date_reported')->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $items
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch items',
                'errors' => $e->getMessage()
            ], 500);
        }
    }
}
