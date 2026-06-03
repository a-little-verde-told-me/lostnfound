<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
use App\Models\Claim;
use App\Models\ReturnItem;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Show manage items page
     */
    public function manageItems(Request $request): View
    {
        $query = Item::query();

        // Filter by status if provided and not 'all'
        if ($request->has('status') && $request->status !== 'all') {
            $status = $request->status;
            $query->where('status', $status);
            
            // Apply type filter based on status
            if ($status === 'claimed') {
                // Claimed items are only found items
                $query->where('type', 'found');
            } elseif ($status === 'returned') {
                // Returned items are only lost items
                $query->where('type', 'lost');
            }
        }

        // Search functionality
        if ($request->filled('search')) {

            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                ->orWhere('location', 'LIKE', "%{$search}%");
            });
        }

        // Sort by latest date reported
        $items = $query->latest('date_reported')
              ->paginate(10)
              ->withQueryString();

        // Calculate status counts (always for all items, not filtered by status)
        $totalCount = Item::count();
        $activeCount = Item::where('status', 'active')->count();
        $claimedCount = Item::where('status', 'claimed')->where('type', 'found')->count();
        $returnedCount = Item::where('status', 'returned')->where('type', 'lost')->count();

        return view('admin.manage_items', [
            'items' => $items,
            'currentStatus' => $request->input('status', 'all'),
            'totalCount' => $totalCount,
            'activeCount' => $activeCount,
            'claimedCount' => $claimedCount,
            'returnedCount' => $returnedCount
        ]);
    }

    /**
     * Show manage users page
     */
    public function manageUsers(Request $request): View
    {
        $query = User::where('role', 'user');

        // Search functionality
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('email', 'LIKE', "%{$search}%")
                  ->orWhere('phone_number', 'LIKE', "%{$search}%");
            });
        }

        // Sort by latest created
        $users = $query->latest('created_at')->paginate(10);

        return view('admin.manage_users', [
            'users' => $users
        ]);
    }

    /**
     * Update user information
     */
    public function updateUser(Request $request, User $user): RedirectResponse
    {
        // Check if user is admin - prevent editing admin users
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Cannot edit admin users');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:user,email,' . $user->id,
            'phone_number' => 'required|string|max:20',
        ]);

        $user->update($validated);

        return redirect()->route('admin.users')->with('success', 'User updated successfully');
    }

    /**
     * Delete user
     */
    public function deleteUser(User $user): RedirectResponse
    {
        // Check if user is admin - prevent deleting admin users
        if ($user->role === 'admin') {
            return redirect()->back()->with('error', 'Cannot delete admin users');
        }

        $user->delete();

        return redirect()->route('admin.users')->with('success', 'User deleted successfully');
    }

    /**
     * Show manage categories page
     */
    public function manageCategories(Request $request): View
    {
        $query = Category::query();

        // Search functionality
        if ($request->has('search') && !empty($request->input('search'))) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%");
        }

        // Sort by latest created
        $categories = $query->latest('created_at')->paginate(10);

        return view('admin.manage_categories', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a new category
     */
    public function storeCategory(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:category,name',
        ]);

        Category::create($validated);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully');
    }

    /**
     * Update category information
     */
    public function updateCategory(Request $request, Category $category): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255|unique:category,name,' . $category->id,
        ]);

        $category->update($validated);

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully');
    }

    /**
     * Delete category
     */
    public function deleteCategory(Category $category): RedirectResponse
    {
        // Check if category has items - prevent deleting if it does
        if ($category->items()->count() > 0) {
            return redirect()->back()->with('error', 'Cannot delete category with items. Please reassign or delete items first.');
        }

        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully');
    }

    /**
     * Show manage claims page
     */
    public function manageClaims(): View
    {
        $claims = Claim::with(['item', 'user'])
            ->latest('date_claimed')
            ->get();

        $allClaimsCount = $claims->count();
        $pendingCount = $claims->where('status', 'pending')->count();
        $approvedCount = $claims->where('status', 'approved')->count();
        $rejectedCount = $claims->where('status', 'rejected')->count();

        return view('admin.manage_claims', [
            'claims' => $claims,
            'allClaimsCount' => $allClaimsCount,
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount
        ]);
    }

    /**
     * Get claim details via API
     */
    public function getClaimDetails(Claim $id)
    {
        $claim = Claim::with(['item', 'user'])->find($id->id);
        
        if (!$claim) {
            return response()->json(['error' => 'Claim not found'], 404);
        }

        return response()->json($claim);
    }

    /**
     * Update claim status via API
     */
    public function updateClaimStatus(Request $request, Claim $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $claim = Claim::find($id->id);
        
        if (!$claim) {
            return response()->json(['error' => 'Claim not found'], 404);
        }

        $claim->update(['status' => $validated['status']]);

        // Update item status based on claim status
        if ($validated['status'] === 'approved') {
            // Mark item as claimed when claim is approved
            Item::where('id', $claim->item_id)->update(['status' => 'claimed']);
        } elseif ($validated['status'] === 'rejected') {
            // Restore item to active when claim is rejected
            Item::where('id', $claim->item_id)->update(['status' => 'active']);
        }

        return response()->json(['success' => true, 'message' => 'Claim status updated successfully']);
    }

    /**
     * Show manage returns page
     */
    public function manageReturns(): View
    {
        $returns = ReturnItem::with(['item.category', 'user'])
            ->latest('created_at')
            ->get();

        // Count returns by status
        $allReturnsCount = $returns->count();
        $pendingCount = $returns->where('status', 'pending')->count();
        $approvedCount = $returns->where('status', 'approved')->count();
        $rejectedCount = $returns->where('status', 'rejected')->count();

        return view('admin.manage_returns', [
            'returns' => $returns,
            'allReturnsCount' => $allReturnsCount,
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount
        ]);
    }

    /**
     * Update return status via API
     */
    public function updateReturnStatus(Request $request, ReturnItem $id)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,approved,rejected'
        ]);

        $return = ReturnItem::find($id->id);
        
        if (!$return) {
            return response()->json(['error' => 'Return not found'], 404);
        }

        $return->update(['status' => $validated['status']]);

        return response()->json(['success' => true, 'message' => 'Return status updated successfully']);
    }

    /**
     * Get return details via API
     */
    public function getReturnDetails(ReturnItem $return)
    {
        $return = $return->load(['item.category', 'user']);
        return response()->json($return);
    }

    /**
     * Show reports page
     */
    public function reports(): View
    {
        // Placeholder for reports
        return view('admin.reports', []);
    }
}
