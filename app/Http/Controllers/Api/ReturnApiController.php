<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ReturnItem;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ReturnApiController extends Controller
{
    /**
     * Get all returns for current user
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 15);

            $returns = ReturnItem::where('user_id', Auth::id())
                ->with('item', 'user')
                ->latest('created_at')
                ->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $returns
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch returns',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get single return
     */
    public function show($id)
    {
        try {
            $return = ReturnItem::with('item', 'user')->findOrFail($id);

            // Check if user owns the return
            if ($return->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            return response()->json([
                'success' => true,
                'data' => $return
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Return not found',
                'errors' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Create a new return request
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'item_id' => 'required|exists:item,id',
                'contact_email' => 'required|email',
                'contact_number' => 'required|string|max:20',
                'additional_details' => 'nullable|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $validated['user_id'] = Auth::id();

            // Handle image upload to Cloudinary
            if ($request->hasFile('image')) {
                try {
                    $uploadedFile = Cloudinary::uploadApi()->upload($request->file('image')->getRealPath(), [
                        'folder' => 'lost_found_returns',
                        'resource_type' => 'auto'
                    ]);
                    $validated['image'] = $uploadedFile['secure_url'];
                } catch (\Exception $e) {
                    \Log::error('Cloudinary upload error: ' . $e->getMessage());
                }
            }

            $return = ReturnItem::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Return request created successfully',
                'data' => $return
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create return',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Update a return request
     */
    public function update(Request $request, $id)
    {
        try {
            $return = ReturnItem::findOrFail($id);

            // Check if user owns the return
            if ($return->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $validated = $request->validate([
                'contact_email' => 'sometimes|email',
                'contact_number' => 'sometimes|string|max:20',
                'additional_details' => 'nullable|string|max:1000'
            ]);

            $return->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Return updated successfully',
                'data' => $return
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update return',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
}
