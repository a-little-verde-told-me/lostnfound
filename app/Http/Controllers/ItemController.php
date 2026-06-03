<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * GET /api/items - Get all items
     */
    public function index()
    {
        $items = Item::with('category', 'user')
            ->where('user_id', auth()->id())
            ->get();
        
        return response()->json($items, 200);
    }

    /**
     * POST /api/items - Create new item
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'type' => 'required|in:Lost,Found',
            'status' => 'required|in:active,claimed,returned',
            'location' => 'required|string|max:255',
            'date_reported' => 'required|date',
            'description' => 'nullable|string',
        ]);

        $item = Item::create([
            ...$validated,
            'user_id' => auth()->id(),
        ]);

        return response()->json($item, 201);
    }

    /**
     * GET /api/items/{item} - Get single item
     */
    public function show(Item $item)
    {
        return response()->json($item->load('category', 'user'), 200);
    }

    /**
     * PUT /api/items/{item} - Update item
     */
    public function update(Request $request, Item $item)
    {
        // Check if user owns this item
        if ($item->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $validated = $request->validate([
            'name' => 'string|max:255',
            'category_id' => 'integer|exists:categories,id',
            'type' => 'in:Lost,Found',
            'status' => 'in:active,claimed,returned',
            'location' => 'string|max:255',
            'date_reported' => 'date',
            'description' => 'nullable|string',
        ]);

        $item->update($validated);

        return response()->json($item, 200);
    }

    /**
     * DELETE /api/items/{item} - Delete item
     */
    public function destroy(Item $item)
    {
        // Check if user owns this item
        if ($item->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $item->delete();

        return response()->json(['message' => 'Item deleted successfully'], 200);
    }
}
