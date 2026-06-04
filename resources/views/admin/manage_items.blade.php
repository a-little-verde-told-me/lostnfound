<x-admin-layout :title="'Manage User Reports'">
    <style>
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
        .reported-by {
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

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-width: 900px;
            width: 95%;
            max-height: 85vh;
            overflow-y: auto;
        }
        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
        }
        .modal-title {
            font-size: 24px;
            font-weight: bold;
            color: #1f2937;
        }
        .modal-close {
            background: none;
            border: none;
            font-size: 28px;
            color: #6b7280;
            cursor: pointer;
            transition: color 0.2s;
        }
        .modal-close:hover {
            color: #1f2937;
        }
        .detail-row {
            display: flex;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f3f4f6;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #1f2937;
            min-width: 140px;
        }
        .detail-value {
            color: #4b5563;
            flex: 1;
        }
        .modal-body-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }
        .modal-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .column-header {
            font-size: 16px;
            font-weight: 700;
            color: #2563eb;
            padding-bottom: 12px;
            border-bottom: 2px solid #2563eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 12px;
            margin-bottom: 8px;
        }
        .image-container {
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            background-color: #f9fafb;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
            margin-bottom: 12px;
        }
        .image-container img {
            max-width: 100%;
            max-height: 300px;
            object-fit: cover;
        }
        .no-image {
            color: #9ca3af;
            font-size: 14px;
        }

        @media (max-width: 1024px) {
            .modal-body-columns {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .modal-content {
                max-width: 800px;
            }
        }

        @media (max-width: 768px) {
            .modal-content {
                max-width: 95vw;
                padding: 20px;
            }
            .modal-header {
                margin-bottom: 16px;
                padding-bottom: 12px;
            }
            .modal-title {
                font-size: 18px;
            }
        }
    </style>
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
                    placeholder="Search reports"
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
                        <th class="table-header-cell">Reported By</th>
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
                                <span class="reported-by">{{ $item->user?->name ?? 'Unknown' }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="type-badge {{ strtolower($item->type) === 'lost' ? 'type-lost' : 'type-found' }}">
                                    {{ ucfirst($item->type) }}
                                </span>
                            </td>
                            <td class="table-body-cell">
                                <span class="date">{{ $item->created_at->format('M d, Y') }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="status-badge {{ strtolower($item->status) === 'active' ? 'status-active' : (strtolower($item->status) === 'claimed' ? 'status-claimed' : 'status-returned') }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </td>
                            <td class="table-body-cell">
                                <button class="view-button" onclick="openItemModal({{ $item->id }})">View</button>
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

        <!-- Modal -->
        <div id="itemModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Item Report Details</h2>
                    <button class="modal-close" onclick="closeItemModal()">&times;</button>
                </div>

                <div id="modalBody">
                    <!-- Content will be loaded here -->
                </div>
            </div>
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

    function openItemModal(itemId) {
        // Fetch item details via AJAX
        fetch(`/api/items/${itemId}`)
            .then(response => response.json())
            .then(response => {
                if (!response.success) {
                    alert('Failed to load item details');
                    return;
                }
                
                const data = response.data;
                const modalBody = document.getElementById('modalBody');
                const imageUrl = data.image ? `/storage/${data.image}` : null;
                
                modalBody.innerHTML = `
                    <div class="modal-body-columns">
                        <!-- LEFT COLUMN: Item Image & Basic Info -->
                        <div class="modal-column">
                            <div class="column-header">Item Information</div>
                            
                            <div class="image-container">
                                ${imageUrl ? `
                                    <img src="${imageUrl}" alt="${data.name}" />
                                ` : `
                                    <div class="no-image">No image available</div>
                                `}
                            </div>
                            
                            <div>
                                <div class="section-title">Basic Details</div>
                                <div class="detail-row">
                                    <div class="detail-label">Item Name:</div>
                                    <div class="detail-value"><strong>${data.name}</strong></div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Type:</div>
                                    <div class="detail-value">${data.type === 'Found' ? 'Found' : 'Lost'}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Category:</div>
                                    <div class="detail-value">${data.category?.name || 'N/A'}</div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="section-title">Description</div>
                                <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px;">
                                    ${data.description || 'No description provided'}
                                </div>
                            </div>
                        </div>
                        
                        <!-- RIGHT COLUMN: Reporter & Location Info -->
                        <div class="modal-column">
                            <div class="column-header">Report Details</div>
                            
                            <div>
                                <div class="section-title">Reporter Information</div>
                                <div class="detail-row">
                                    <div class="detail-label">Name:</div>
                                    <div class="detail-value"><strong>${data.user?.name || 'Unknown'}</strong></div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Email:</div>
                                    <div class="detail-value">${data.user?.email || 'N/A'}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Phone:</div>
                                    <div class="detail-value">${data.user?.phone_number || 'N/A'}</div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="section-title">Location & Timeline</div>
                                <div class="detail-row">
                                    <div class="detail-label">${data.type === 'Found' ? 'Found Location:' : 'Last Seen:'}</div>
                                    <div class="detail-value">${data.type === 'Found' ? data.found_location : data.lost_location}</div>
                                </div>
                                ${data.type === 'Found' ? `
                                <div class="detail-row">
                                    <div class="detail-label">Current Location:</div>
                                    <div class="detail-value">${data.surrender_location || 'N/A'}</div>
                                </div>
                                ` : ''}
                                <div class="detail-row">
                                    <div class="detail-label">${data.type === 'Found' ? 'Date Found:' : 'Date Lost:'}</div>
                                    <div class="detail-value">${data.date_found ? new Date(data.date_found).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'}) : (data.date_lost ? new Date(data.date_lost).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'}) : 'N/A')}</div>
                                </div>
                                <div class="detail-row">
                                    <div class="detail-label">Report Created:</div>
                                    <div class="detail-value">${new Date(data.created_at).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'})}</div>
                                </div>
                            </div>
                            
                            <div>
                                <div class="section-title">Current Status</div>
                                <div class="detail-row">
                                    <div class="detail-label">Status:</div>
                                    <div class="detail-value">
                                        <span class="status-badge ${data.status === 'active' ? 'status-active' : (data.status === 'claimed' ? 'status-claimed' : 'status-returned')}">
                                            ${data.status.charAt(0).toUpperCase() + data.status.slice(1)}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
                
                document.getElementById('itemModal').classList.add('active');
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Failed to load item details');
            });
    }

    function closeItemModal() {
        document.getElementById('itemModal').classList.remove('active');
    }

    // Close modal when clicking outside
    document.getElementById('itemModal').addEventListener('click', (e) => {
        if (e.target.id === 'itemModal') {
            closeItemModal();
        }
    });

</script>
</x-admin-layout>