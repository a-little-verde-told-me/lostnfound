<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\User;
use App\Models\Category;
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
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('name', 'LIKE', "%{$search}%")
                  ->orWhere('location', 'LIKE', "%{$search}%");
        }

        // Sort by latest date reported
        $items = $query->latest('date_reported')->paginate(10);

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
}
