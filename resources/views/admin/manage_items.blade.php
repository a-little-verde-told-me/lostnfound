<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage All Items - Findit Admin</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f0f4f8;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            display: flex;
            height: 100vh;
        }
        .sidebar {
            width: 210px;
            background-color: #2563eb;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 24px 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .sidebar-header {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 0 20px;
            margin-bottom: 32px;
        }
        .sidebar-avatar {
            width: 50px;
            height: 50px;
            background-color: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            font-weight: bold;
        }
        .sidebar-title {
            font-size: 14px;
            font-weight: 600;
        }
        .sidebar-section {
            padding: 16px 0;
        }
        .sidebar-section-title {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 1px;
            padding: 0 20px;
            margin-bottom: 12px;
            color: rgba(255, 255, 255, 0.7);
        }
        .sidebar-link {
            padding: 12px 20px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            font-size: 14px;
            transition: background-color 0.2s;
            cursor: pointer;
            display: block;
        }
        .sidebar-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-link.active {
            background-color: rgba(255, 255, 255, 0.15);
            border-left: 4px solid white;
            padding-left: 16px;
        }
        .sidebar-spacer {
            flex: 1;
        }
        .sidebar-logout {
            padding: 0 20px;
        }
        .logout-button {
            width: 100%;
            padding: 12px 16px;
            background-color: rgba(0, 0, 0, 0.2);
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .logout-button:hover {
            background-color: rgba(0, 0, 0, 0.3);
        }
        .main-content {
            flex: 1;
            overflow-y: auto;
            padding: 32px;
        }
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 24px;
        }
        .controls-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 16px;
        }
        .search-box {
            flex: 1;
            position: relative;
            max-width: 600px;
        }
        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
            transition: border-color 0.2s;
        }
        .search-box input::placeholder {
            color: #9ca3af;
        }
        .search-box input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 16px;
        }
        .sort-dropdown {
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            cursor: pointer;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: border-color 0.2s;
        }
        .sort-dropdown:hover {
            border-color: #2563eb;
        }
        .sort-icon {
            font-size: 16px;
        }
        .tabs-container {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }
        .tab-button {
            padding: 12px 16px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .tab-button:hover {
            color: #1f2937;
        }
        .tab-button.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }
        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-header {
            background-color: #f3f4f6;
            border-bottom: 1px solid #e5e7eb;
        }
        .table-header-cell {
            padding: 12px 16px;
            text-align: left;
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }
        .table-body-row {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s;
        }
        .table-body-row:hover {
            background-color: #f9fafb;
        }
        .table-body-row:last-child {
            border-bottom: none;
        }
        .table-body-cell {
            padding: 16px;
            font-size: 14px;
            color: #1f2937;
        }
        .item-name {
            font-weight: 500;
            color: #1f2937;
        }
        .posted-by {
            color: #6b7280;
        }
        .type-badge {
            font-weight: 500;
        }
        .type-lost {
            color: #dc2626;
        }
        .type-found {
            color: #059669;
        }
        .date {
            color: #6b7280;
        }
        .status-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
        }
        .status-active {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-claimed {
            background-color: #dcfce7;
            color: #166534;
        }
        .status-returned {
            background-color: #dbeafe;
            color: #0c4a6e;
        }
        .view-button {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .view-button:hover {
            background-color: #1d4ed8;
        }
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #6b7280;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }
        .pagination a,
        .pagination button,
        .pagination span {
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 13px;
            text-decoration: none;
            color: #1f2937;
            background-color: white;
            cursor: pointer;
            transition: all 0.2s;
        }
        .pagination a:hover {
            background-color: #f3f4f6;
            border-color: #2563eb;
        }
        .pagination .active span {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }
        .pagination .disabled span {
            color: #9ca3af;
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="sidebar-avatar">A</div>
            <div class="sidebar-title">Admin Panel</div>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">OVERVIEW</div>
            <a href="{{ route('admin.dashboard') }}" class="sidebar-link">Admin Dashboard</a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">MANAGEMENT</div>
            <a href="{{ route('admin.claims') }}" class="sidebar-link">Manage Claims</a>
            <a href="{{ route('admin.returns') }}" class="sidebar-link">Manage Returns</a>
            <a href="{{ route('admin.items') }}" class="sidebar-link active">Manage User Reports</a>
            <a href="{{ route('admin.categories') }}" class="sidebar-link">Manage Category</a>
            <a href="{{ route('admin.users') }}" class="sidebar-link">Manage Users</a>
            <a href="{{ route('admin.reports') }}" class="sidebar-link">Reports</a>
        </div>

        <div class="sidebar-spacer"></div>

        <div class="sidebar-logout">
            <form action="{{ route('logout') }}" method="POST" style="display: block;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Manage User Reports</h1>

        <!-- Controls -->
        <div class="controls-container">
        <div class="search-box">
            <form id="searchForm"
                method="GET"
                action="{{ route('admin.items') }}"
                style="display: flex; flex: 1;">

                <input
                    type="text"
                    id="searchInput"
                    name="search"
                    placeholder="Search items"
                    value="{{ request('search') }}">

                <input
                    type="hidden"
                    name="status"
                    value="{{ request('status', 'all') }}">
            </form>
        </div>
        <select class="sort-dropdown" id="sortSelect" onchange="sortItems()">
            <option value="latest">Sort: Latest</option>
            <option value="oldest">Sort: Oldest</option>
            <option value="name">Sort: Name A-Z</option>
        </select>
        </div>

        <!-- Tabs -->
        <div class="tabs-container">
            <a href="{{ route('admin.items', ['status' => 'all']) }}" class="tab-button {{ $currentStatus === 'all' ? 'active' : '' }}">All items ({{ $totalCount }})</a>
            <a href="{{ route('admin.items', ['status' => 'active']) }}" class="tab-button {{ $currentStatus === 'active' ? 'active' : '' }}">Active ({{ $activeCount }})</a>
            <a href="{{ route('admin.items', ['status' => 'claimed']) }}" class="tab-button {{ $currentStatus === 'claimed' ? 'active' : '' }}">Claimed ({{ $claimedCount }})</a>
            <a href="{{ route('admin.items', ['status' => 'returned']) }}" class="tab-button {{ $currentStatus === 'returned' ? 'active' : '' }}">Returned ({{ $returnedCount }})</a>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th class="table-header-cell">Item Name</th>
                        <th class="table-header-cell">Posted By</th>
                        <th class="table-header-cell">Type</th>
                        <th class="table-header-cell">Date</th>
                        <th class="table-header-cell">Status</th>
                        <th class="table-header-cell">Action</th>
                    </tr>
                </thead>
                <tbody id="itemsTableBody">
                    @forelse($items as $item)
                        <tr class="table-body-row item-row">
                            <td class="table-body-cell">
                                <span class="item-name">{{ $item->name }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="posted-by">{{ $item->user?->name ?? 'Unknown' }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="type-badge {{ strtolower($item->type) === 'lost' ? 'type-lost' : 'type-found' }}">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td class="table-body-cell">
                                <span class="date">{{ $item->date_reported->format('M d, Y') }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="status-badge {{ strtolower($item->status) === 'active' ? 'status-active' : (strtolower($item->status) === 'claimed' ? 'status-claimed' : 'status-returned') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="table-body-cell">
                                <button class="view-button">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr class="table-body-row">
                            <td colspan="6" class="empty-state">
                                No items found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div style="margin-top: 24px; display: flex; justify-content: center;">
            {{ $items->links() }}
    </div>
</body>
<script>
    const searchInput = document.getElementById('searchInput');
    const searchForm = document.getElementById('searchForm');
    let searchTimeout;

    if (searchInput) {
        searchInput.addEventListener('input', function () {
            clearTimeout(searchTimeout);

            searchTimeout = setTimeout(function () {
                searchForm.submit();
            }, 500);
        });
    }

    function sortItems() {
        const sortValue = document.getElementById('sortSelect').value;
        const tbody = document.getElementById('itemsTableBody');
        const rows = Array.from(tbody.querySelectorAll('.item-row'));

        rows.sort((a, b) => {

            const nameA = a.querySelectorAll('td')[0].textContent.trim();
            const nameB = b.querySelectorAll('td')[0].textContent.trim();

            const dateA = new Date(a.querySelectorAll('td')[3].textContent);
            const dateB = new Date(b.querySelectorAll('td')[3].textContent);

            if (sortValue === 'latest') {
                return dateB - dateA;
            }

            if (sortValue === 'oldest') {
                return dateA - dateB;
            }

            if (sortValue === 'name') {
                return nameA.localeCompare(nameB);
            }
        });

        rows.forEach(row => tbody.appendChild(row));
    }
</script>
</html>