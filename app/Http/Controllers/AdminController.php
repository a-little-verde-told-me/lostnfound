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
     * Show admin dashboard
     */
    public function dashboard(): View
    {
        // Stats counts
        $activeLostReports = Item::where('type', 'lost')->where('status', 'active')->count();
        $activeFoundReports = Item::where('type', 'found')->where('status', 'active')->count();
        $claimPending = Claim::where('status', 'pending')->count();
        $returnPending = ReturnItem::where('status', 'pending')->count();
        $resolved = Claim::where('status', 'approved')->count() + ReturnItem::where('status', 'approved')->count();

        // Recent claims to review (pending claims - max 5)
        $pendingClaims = Claim::where('status', 'pending')
            ->with(['item', 'user'])
            ->latest('date_claimed')
            ->take(5)
            ->get();

        // Recent returns to review (pending returns - max 5)
        $pendingReturns = ReturnItem::where('status', 'pending')
            ->with(['item', 'user'])
            ->latest('created_at')
            ->take(5)
            ->get();

        // Recent activity (latest items - max 5)
        $recentItems = Item::with('user')
            ->latest('date_reported')
            ->take(5)
            ->get();

        return view('admin.dashboard', [
            'activeLostReports' => $activeLostReports,
            'activeFoundReports' => $activeFoundReports,
            'claimPending' => $claimPending,
            'returnPending' => $returnPending,
            'resolved' => $resolved,
            'pendingClaims' => $pendingClaims,
            'pendingReturns' => $pendingReturns,
            'recentItems' => $recentItems,
        ]);
    }

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
    /**
     * Show manage claims page
     */
    public function manageClaims(Request $request): View
    {
        $query = Claim::with(['item', 'user']);

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $claims = $query->latest('date_claimed')->get();

        $allClaimsCount = Claim::count();
        $pendingCount = Claim::where('status', 'pending')->count();
        $approvedCount = Claim::where('status', 'approved')->count();
        $rejectedCount = Claim::where('status', 'rejected')->count();

        return view('admin.manage_claims', [
            'claims' => $claims,
            'allClaimsCount' => $allClaimsCount,
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount,
            'currentStatus' => $request->input('status', 'all')
        ]);
    }

    /**
     * Get claim details via API
     */
    public function getClaimDetails(Claim $id)
    {
        $claim = Claim::with(['item.user', 'item.category', 'user'])->find($id->id);
        
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
    public function manageReturns(Request $request): View
    {
        $query = ReturnItem::with(['item.category', 'user']);

        // Filter by status if provided
        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        $returns = $query->latest('created_at')->get();

        // Count returns by status
        $allReturnsCount = ReturnItem::count();
        $pendingCount = ReturnItem::where('status', 'pending')->count();
        $approvedCount = ReturnItem::where('status', 'approved')->count();
        $rejectedCount = ReturnItem::where('status', 'rejected')->count();

        return view('admin.manage_returns', [
            'returns' => $returns,
            'allReturnsCount' => $allReturnsCount,
            'pendingCount' => $pendingCount,
            'approvedCount' => $approvedCount,
            'rejectedCount' => $rejectedCount,
            'currentStatus' => $request->input('status', 'all')
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

        // Update item status based on return status
        if ($validated['status'] === 'approved') {
            // Mark item as returned when return is approved
            Item::where('id', $return->item_id)->update(['status' => 'returned']);
        } elseif ($validated['status'] === 'rejected') {
            // Restore item to claimed when return is rejected
            Item::where('id', $return->item_id)->update(['status' => 'claimed']);
        }

        return response()->json(['success' => true, 'message' => 'Return status updated successfully']);
    }

    /**
     * Get return details via API
     */
    public function getReturnDetails(ReturnItem $return)
    {
        $return = $return->load(['item.category', 'item.user', 'user']);
        return response()->json($return);
    }

    /**
     * Show reports page
     */
    public function reports(): View
    {
        return view('admin.reports', []);
    }

    /**
     * Get items statistics
     */
    public function getItemsStats(Request $request)
    {
        $query = Item::query();

        // Apply filters
        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', ucfirst($request->type));
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('date_reported', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('date_reported', '<=', $request->to_date);
        }

        $total = $query->count();

        return response()->json([
            'total' => $total,
            'active' => (clone $query)->where('status', 'active')->count(),
            'claimed' => (clone $query)->where('status', 'claimed')->count(),
            'returned' => (clone $query)->where('status', 'returned')->count(),
        ]);
    }

    /**
     * Get claims statistics
     */
    public function getClaimsStats(Request $request)
    {
        $query = Claim::query();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('date_claimed', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('date_claimed', '<=', $request->to_date);
        }

        $total = $query->count();

        return response()->json([
            'total' => $total,
            'pending' => (clone $query)->where('status', 'pending')->count(),
            'approved' => (clone $query)->where('status', 'approved')->count(),
            'rejected' => (clone $query)->where('status', 'rejected')->count(),
        ]);
    }

    /**
     * Get returns statistics
     */
    public function getReturnsStats(Request $request)
    {
        $query = ReturnItem::query();

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $total = $query->count();

        return response()->json([
            'total' => $total,
            'pending' => (clone $query)->where('status', 'pending')->count(),
            'approved' => (clone $query)->where('status', 'approved')->count(),
            'rejected' => (clone $query)->where('status', 'rejected')->count(),
        ]);
    }

    /**
     * Get users statistics
     */
    public function getUsersStats(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        $total = $query->count();

        return response()->json([
            'total' => $total,
            'active' => $total, // All users are considered active
        ]);
    }

    /**
     * Export report in various formats
     */
    public function exportReport(Request $request, $reportType)
    {
        $format = $request->get('format', 'json');
        $fileName = "{$reportType}_report_" . now()->format('Y-m-d');

        if ($reportType === 'items') {
            $data = $this->getItemsReportData($request);
            return $this->sendExport($data, $fileName, $format, 'Items Report');
        } elseif ($reportType === 'claims') {
            $data = $this->getClaimsReportData($request);
            return $this->sendExport($data, $fileName, $format, 'Claims Report');
        } elseif ($reportType === 'returns') {
            $data = $this->getReturnsReportData($request);
            return $this->sendExport($data, $fileName, $format, 'Returns Report');
        } elseif ($reportType === 'users') {
            $data = $this->getUsersReportData($request);
            return $this->sendExport($data, $fileName, $format, 'Users Report');
        }

        return response()->json(['error' => 'Invalid report type'], 400);
    }

    /**
     * Get items report data
     */
    private function getItemsReportData(Request $request)
    {
        $query = Item::with('category', 'user');

        if ($request->has('type') && $request->type !== 'all') {
            $query->where('type', ucfirst($request->type));
        }

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('date_reported', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('date_reported', '<=', $request->to_date);
        }

        return $query->get()->map(function($item) {
            return [
                'ID' => $item->id,
                'Item Name' => $item->name,
                'Category' => $item->category->name ?? 'N/A',
                'Type' => $item->type,
                'Status' => ucfirst($item->status),
                'Location Found/Lost' => $item->location,
                'Reporter' => $item->user->name ?? 'Unknown',
                'Date Found/Lost' => $item->date_reported->format('Y-m-d H:i:s'),
                'Created At' => $item->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    /**
     * Get claims report data
     */
    private function getClaimsReportData(Request $request)
    {
        $query = Claim::with('item', 'user');

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('date_claimed', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('date_claimed', '<=', $request->to_date);
        }

        return $query->get()->map(function($claim) {
            return [
                'ID' => $claim->id,
                'Item' => $claim->item->name ?? 'Unknown',
                'Claimant' => $claim->user->name,
                'Email' => $claim->contact_email,
                'Phone' => $claim->contact_number,
                'Status' => ucfirst($claim->status),
                'Date Claimed' => $claim->date_claimed->format('Y-m-d H:i:s'),
                'Created At' => $claim->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    /**
     * Get returns report data
     */
    private function getReturnsReportData(Request $request)
    {
        $query = ReturnItem::with('item', 'user');

        if ($request->has('status') && $request->status !== 'all') {
            $query->where('status', $request->status);
        }

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        return $query->get()->map(function($return) {
            return [
                'ID' => $return->id,
                'Item' => $return->item->name ?? 'Unknown',
                'Returner' => $return->user->name,
                'Email' => $return->email,
                'Phone' => $return->phone_number,
                'Status' => ucfirst($return->status),
                'Created At' => $return->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    /**
     * Get users report data
     */
    private function getUsersReportData(Request $request)
    {
        $query = User::where('role', 'user');

        if ($request->has('from_date') && $request->from_date) {
            $query->whereDate('created_at', '>=', $request->from_date);
        }

        if ($request->has('to_date') && $request->to_date) {
            $query->whereDate('created_at', '<=', $request->to_date);
        }

        return $query->get()->map(function($user) {
            $claims = Claim::where('user_id', $user->id)->count();
            $returns = ReturnItem::where('user_id', $user->id)->count();

            return [
                'ID' => $user->id,
                'Name' => $user->name,
                'Email' => $user->email,
                'Phone' => $user->phone_number ?? 'N/A',
                'Claims' => $claims,
                'Returns' => $returns,
                'Joined' => $user->created_at->format('Y-m-d H:i:s'),
            ];
        });
    }

    /**
     * Send export response based on format
     */
    private function sendExport($data, $fileName, $format, $reportTitle)
    {
        $mimeType = $format === 'json' ? 'application/json' : ($format === 'xlsx' ? 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' : 'text/csv');
        $extension = $format === 'xlsx' ? 'xlsx' : ($format === 'json' ? 'json' : 'csv');
        
        if ($format === 'json') {
            return response()->json($data->toArray(), 200, [], JSON_PRETTY_PRINT)
                ->header('Content-Disposition', "attachment; filename=\"{$fileName}.{$extension}\"");
        } elseif ($format === 'csv' || $format === 'xlsx') {
            return response()->streamDownload(function() use ($data) {
                $file = fopen('php://output', 'w');
                
                if ($data->count() > 0) {
                    // Write headers
                    $headers = array_keys($data[0]);
                    fputcsv($file, $headers);
                    
                    // Write rows
                    foreach ($data as $row) {
                        fputcsv($file, array_values($row));
                    }
                }
                
                fclose($file);
            }, "{$fileName}.{$extension}", [
                'Content-Type' => $mimeType,
                'Content-Disposition' => "attachment; filename=\"{$fileName}.{$extension}\"",
            ]);
        } elseif ($format === 'pdf') {
            // For PDF, generate HTML that can be printed as PDF
            $html = $this->generatePdfHtml($data, $reportTitle);
            return response($html, 200, [
                'Content-Type' => 'text/html; charset=utf-8',
                'Content-Disposition' => "inline; filename=\"{$fileName}.html\"",
            ]);
        }

        return response()->json(['error' => 'Invalid format'], 400);
    }

    /**
     * Generate HTML for PDF (can be printed to PDF from browser)
     */
    private function generatePdfHtml($data, $reportTitle)
    {
        $html = '<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>' . $reportTitle . '</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            color: #2563eb;
            border-bottom: 2px solid #2563eb;
            padding-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th {
            background-color: #2563eb;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: 600;
        }
        td {
            padding: 10px 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        tr:nth-child(even) {
            background-color: #f9fafb;
        }
        .footer {
            margin-top: 30px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
            color: #6b7280;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>' . $reportTitle . '</h1>
    <p>Generated on: ' . now()->format('Y-m-d H:i:s') . '</p>
    <table>
        <thead>
            <tr>';

        if ($data->count() > 0) {
            $headers = array_keys($data[0]);
            foreach ($headers as $header) {
                $html .= '<th>' . htmlspecialchars($header) . '</th>';
            }
        }

        $html .= '</tr>
        </thead>
        <tbody>';

        foreach ($data as $row) {
            $html .= '<tr>';
            foreach ($row as $value) {
                $html .= '<td>' . htmlspecialchars($value) . '</td>';
            }
            $html .= '</tr>';
        }

        $html .= '</tbody>
    </table>
    <div class="footer">
        <p>This is an auto-generated report from Lost & Found System</p>
    </div>
</body>
</html>';

        return $html;
    }
}
