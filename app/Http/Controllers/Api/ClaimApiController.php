<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Claim;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;

class ClaimApiController extends Controller
{
    /**
     * Get all claims for current user
     */
    public function index(Request $request)
    {
        try {
            $perPage = $request->query('per_page', 15);
            $status = $request->query('status'); // 'pending', 'approved', 'rejected'

            $query = Claim::where('user_id', Auth::id())
                ->with('item', 'user');

            if ($status) {
                $query->where('status', $status);
            }

            $claims = $query->latest('created_at')->paginate($perPage);

            return response()->json([
                'success' => true,
                'data' => $claims
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch claims',
                'errors' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get single claim
     */
    public function show($id)
    {
        try {
            $claim = Claim::with('item', 'user')->findOrFail($id);

            // Check if user owns the claim
            if ($claim->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            return response()->json([
                'success' => true,
                'data' => $claim
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Claim not found',
                'errors' => $e->getMessage()
            ], 404);
        }
    }

    /**
     * Create a new claim
     */
    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'item_id' => 'required|exists:item,id',
                'proof_description' => 'required|string|max:1000',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Check if item exists and is found
            $item = Item::findOrFail($validated['item_id']);
            if ($item->type !== 'found') {
                return response()->json([
                    'success' => false,
                    'message' => 'Can only claim found items'
                ], 422);
            }

            $validated['user_id'] = Auth::id();
            $validated['status'] = 'pending';
            $validated['date_claimed'] = now();

            // Handle image upload to Cloudinary
            if ($request->hasFile('image')) {
                try {
                    $uploadedFile = Cloudinary::uploadApi()->upload($request->file('image')->getRealPath(), [
                        'folder' => 'lost_found_claims',
                        'resource_type' => 'auto'
                    ]);
                    $validated['image'] = $uploadedFile['secure_url'];
                } catch (\Exception $e) {
                    \Log::error('Cloudinary upload error: ' . $e->getMessage());
                }
            }

            $claim = Claim::create($validated);

            return response()->json([
                'success' => true,
                'message' => 'Claim created successfully',
                'data' => $claim
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to create claim',
                'errors' => $e->getMessage()
            ], 422);
        }
    }

    /**
     * Update a claim
     */
    public function update(Request $request, $id)
    {
        try {
            $claim = Claim::findOrFail($id);

            // Check if user owns the claim
            if ($claim->user_id !== Auth::id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized'
                ], 403);
            }

            $validated = $request->validate([
                'proof_description' => 'sometimes|string|max:1000',
                'status' => 'sometimes|in:pending,approved,rejected'
            ]);

            $claim->update($validated);

            return response()->json([
                'success' => true,
                'message' => 'Claim updated successfully',
                'data' => $claim
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update claim',
                'errors' => $e->getMessage()
            ], 422);
        }
    }
}
