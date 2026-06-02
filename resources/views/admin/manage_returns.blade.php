<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Manage Returns - Findit Admin</title>
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
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }
        .table-header th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s;
        }
        .table tbody tr:hover {
            background-color: #f9fafb;
        }
        .table tbody td {
            padding: 16px;
            color: #374151;
            font-size: 14px;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .status-pending {
            background-color: #fef08a;
            color: #854d0e;
        }
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .view-button {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .view-button:hover {
            background-color: #1d4ed8;
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
            max-width: 1000px;
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
        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            justify-content: flex-end;
        }
        .action-button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .approve-button {
            background-color: #10b981;
            color: white;
        }
        .approve-button:hover {
            background-color: #059669;
        }
        .reject-button {
            background-color: #ef4444;
            color: white;
        }
        .reject-button:hover {
            background-color: #dc2626;
        }
        .close-button {
            background-color: #d1d5db;
            color: #1f2937;
        }
        .close-button:hover {
            background-color: #9ca3af;
        }

        .no-data {
            text-align: center;
            padding: 48px 16px;
            color: #6b7280;
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
            .action-button {
                padding: 8px 16px;
                font-size: 13px;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                padding: 16px;
            }
            .main-content {
                padding: 16px;
            }
            .page-title {
                font-size: 20px;
            }
            .controls-container {
                flex-direction: column;
            }
            .search-box {
                max-width: 100%;
            }
            .table {
                font-size: 12px;
            }
            .table-header th,
            .table tbody td {
                padding: 12px 8px;
            }
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
            <a href="{{ route('admin.returns') }}" class="sidebar-link active">Manage Returns</a>
            <a href="{{ route('admin.items') }}" class="sidebar-link">Manage All Items</a>
            <a href="{{ route('admin.categories') }}" class="sidebar-link">Manage Category</a>
            <a href="{{ route('admin.users') }}" class="sidebar-link">Manage Users</a>
            <a href="{{ route('admin.reports') }}" class="sidebar-link">Reports</a>
        </div>

        <div class="sidebar-spacer"></div>

        <div class="sidebar-logout">
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="page-title">Manage Returns</h1>

        <div class="controls-container">
            <div class="search-box">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search returns" 
                    onkeyup="filterReturns()"
                >
            </div>
            <select class="sort-dropdown" id="sortSelect" onchange="sortReturns()">
                <option value="latest">Sort: Latest</option>
                <option value="oldest">Sort: Oldest</option>
                <option value="name">Sort: Name A-Z</option>
            </select>
        </div>

        <div class="tabs-container">
            <button class="tab-button active" onclick="filterByStatus('all')">All submissions ({{ $allReturnsCount }})</button>
            <button class="tab-button" onclick="filterByStatus('pending')">Pending ({{ $pendingCount }})</button>
            <button class="tab-button" onclick="filterByStatus('approved')">Approved ({{ $approvedCount }})</button>
            <button class="tab-button" onclick="filterByStatus('rejected')">Rejected ({{ $rejectedCount }})</button>
        </div>

        <div class="table-container">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th>ITEM NAME</th>
                        <th>POSTED BY</th>
                        <th>RETURNED BY</th>
                        <th>EMAIL</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="returnsTableBody">
                    @forelse($returns as $return)
                        <tr class="return-row" data-status="{{ $return->status }}" data-search="{{ strtolower($return->item->name . ' ' . $return->user->name) }}">
                            <td>{{ $return->item->name }}</td>
                            <td>{{ $return->item->user->name }}</td>
                            <td>{{ $return->user->name }}</td>
                            <td>{{ $return->contact_email }}</td>
                            <td>{{ $return->created_at->format('M d, Y') }}</td>
                            <td>
                                <span class="status-badge status-{{ $return->status }}">
                                    {{ ucfirst($return->status) }}
                                </span>
                            </td>
                            <td>
                                <button class="view-button" onclick="openReturnModal({{ $return->id }})">View</button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="no-data">No returns found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="returnModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Return Details</h2>
                <button class="modal-close" onclick="closeReturnModal()">&times;</button>
            </div>

            <div id="modalBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'all';
        let allReturnsData = @json($returns);

        function filterByStatus(status) {
            currentFilter = status;
            
            // Update active tab
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');
            
            // Filter rows
            filterReturns();
        }

        function filterReturns() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.return-row');
            
            rows.forEach(row => {
                const status = row.getAttribute('data-status');
                const search = row.getAttribute('data-search');
                
                const statusMatch = (currentFilter === 'all') || (status === currentFilter);
                const searchMatch = search.includes(searchTerm);
                
                row.style.display = (statusMatch && searchMatch) ? '' : 'none';
            });
        }

        function sortReturns() {
            const sortValue = document.getElementById('sortSelect').value;
            const tbody = document.getElementById('returnsTableBody');
            const rows = Array.from(tbody.querySelectorAll('.return-row'));
            
            rows.sort((a, b) => {
                let aVal, bVal;
                
                if (sortValue === 'latest') {
                    // Sort by date descending (latest first)
                    aVal = new Date(a.cells[4].textContent);
                    bVal = new Date(b.cells[4].textContent);
                    return bVal - aVal;
                } else if (sortValue === 'oldest') {
                    // Sort by date ascending (oldest first)
                    aVal = new Date(a.cells[4].textContent);
                    bVal = new Date(b.cells[4].textContent);
                    return aVal - bVal;
                } else if (sortValue === 'name') {
                    // Sort by item name A-Z
                    aVal = a.cells[0].textContent.toLowerCase();
                    bVal = b.cells[0].textContent.toLowerCase();
                    return aVal.localeCompare(bVal);
                }
            });
            
            rows.forEach(row => tbody.appendChild(row));
        }

        function openReturnModal(returnId) {
            fetch(`/api/returns/${returnId}`)
                .then(response => response.json())
                .then(data => {
                    const modalBody = document.getElementById('modalBody');
                    const itemImageUrl = data.item.image ? `/storage/${data.item.image}` : null;
                    const proofImageUrl = data.image ? `/storage/${data.image}` : null;
                    
                    modalBody.innerHTML = `
                        <div class="modal-body-columns">
                            <!-- LEFT COLUMN: Item/Report Details -->
                            <div class="modal-column">
                                <div class="column-header">Item Lost Report</div>
                                
                                <div class="image-container">
                                    ${itemImageUrl ? `
                                        <img src="${itemImageUrl}" alt="${data.item.name}" />
                                    ` : `
                                        <div class="no-image">No image available</div>
                                    `}
                                </div>
                                
                                <div>
                                    <div class="section-title">Item Details</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Item Name:</div>
                                        <div class="detail-value"><strong>${data.item.name}</strong></div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Type:</div>
                                        <div class="detail-value">${data.item.type === 'found' ? 'Found' : 'Lost'}</div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Description</div>
                                    <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px;">
                                        ${data.item.description || 'No description provided'}
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Location & Date</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Location:</div>
                                        <div class="detail-value">${data.item.location}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Date Found:</div>
                                        <div class="detail-value">${new Date(data.item.date_reported).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'})}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- RIGHT COLUMN: Return Details -->
                            <div class="modal-column">
                                <div class="column-header">Return Details</div>
                                
                                <div class="image-container">
                                    ${proofImageUrl ? `
                                        <img src="${proofImageUrl}" alt="Return proof" />
                                    ` : `
                                        <div class="no-image">No proof file uploaded</div>
                                    `}
                                </div>
                                
                                <div>
                                    <div class="section-title">Returner Information</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Name:</div>
                                        <div class="detail-value"><strong>${data.user.name}</strong></div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Email:</div>
                                        <div class="detail-value">${data.contact_email}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Phone:</div>
                                        <div class="detail-value">${data.contact_number || 'N/A'}</div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Return Status</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Status:</div>
                                        <div class="detail-value">
                                            <span class="status-badge status-${data.status}">
                                                ${data.status.charAt(0).toUpperCase() + data.status.slice(1)}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Date Returned:</div>
                                        <div class="detail-value">${new Date(data.created_at).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'})}</div>
                                    </div>
                                </div>
                                
                                ${data.additional_details ? `
                                <div>
                                    <div class="section-title">Additional Details</div>
                                    <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px; font-size: 13px;">
                                        ${data.additional_details}
                                    </div>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                        
                        <div class="modal-actions">
                            ${data.status === 'pending' ? `
                                <button class="action-button approve-button" onclick="updateReturnStatus(${returnId}, 'approved')">✓ Approve Return</button>
                                <button class="action-button reject-button" onclick="updateReturnStatus(${returnId}, 'rejected')">✗ Reject Return</button>
                            ` : ''}
                            <button class="action-button close-button" onclick="closeReturnModal()">Close</button>
                        </div>
                    `;
                    
                    document.getElementById('returnModal').classList.add('active');
                });
        }

        function closeReturnModal() {
            document.getElementById('returnModal').classList.remove('active');
        }

        function updateReturnStatus(returnId, status) {
            fetch(`/api/returns/${returnId}/status`, {
                method: 'PATCH',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Error updating return status');
                }
            });
        }

        // Close modal when clicking outside
        document.getElementById('returnModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeReturnModal();
            }
        });
    </script>
</body>
</html>
