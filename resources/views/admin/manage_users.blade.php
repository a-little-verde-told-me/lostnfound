<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users - Findit Admin</title>
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
            text-decoration: none;
            display: inline-block;
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
        .user-name {
            font-weight: 500;
            color: #1f2937;
        }
        .user-email {
            color: #6b7280;
        }
        .phone-number {
            color: #1f2937;
        }
        .action-buttons {
            display: flex;
            gap: 8px;
        }
        .edit-button {
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
        .edit-button:hover {
            background-color: #1d4ed8;
        }
        .delete-button {
            padding: 8px 16px;
            background-color: #ef4444;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .delete-button:hover {
            background-color: #dc2626;
        }
        .empty-state {
            text-align: center;
            padding: 48px 24px;
            color: #6b7280;
        }
        .pagination {
            display: flex;
            justify-content: center;
            gap: 4px;
            flex-wrap: wrap;
            margin-top: 24px;
            align-items: center;
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
            line-height: 1.5;
        }
        .pagination a:hover:not(.disabled) {
            background-color: #2563eb;
            border-color: #2563eb;
            color: white;
        }
        .pagination .active span {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }
        .pagination .disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }
        .pagination .disabled a {
            pointer-events: none;
            opacity: 0.5;
        }
        .pagination .disabled span {
            color: #9ca3af;
            cursor: not-allowed;
        }
        .pagination span:not(.pagination-separator) {
            padding: 0;
        }
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
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
        }
        .modal-header {
            font-size: 24px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            transition: border-color 0.2s;
            box-sizing: border-box;
        }
        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .modal-footer {
            display: flex;
            gap: 12px;
            justify-content: flex-end;
            margin-top: 24px;
        }
        .modal-button {
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .modal-button-primary {
            background-color: #2563eb;
            color: white;
        }
        .modal-button-primary:hover {
            background-color: #1d4ed8;
        }
        .modal-button-secondary {
            background-color: #e5e7eb;
            color: #1f2937;
        }
        .modal-button-secondary:hover {
            background-color: #d1d5db;
        }
        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 24px;
            font-size: 14px;
        }
        .alert-success {
            background-color: #d1fae5;
            color: #065f46;
            border: 1px solid #a7f3d0;
        }
        .alert-error {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
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
            <a href="{{ route('admin.returns') }}" class="sidebar-link">Manage Submissions</a>
            <a href="{{ route('admin.items') }}" class="sidebar-link">Manage All Items</a>
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
        <h1 class="page-title">Manage Users</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-error">
                {{ session('error') }}
            </div>
        @endif

        <!-- Controls -->
        <div class="controls-container">
            <div class="search-box">
                <form id="searchForm" method="GET" action="{{ route('admin.users') }}" style="display: flex; flex: 1;">
                    <input type="text" id="searchInput" name="search" placeholder="Search user by name or email" value="{{ request('search') }}">
                </form>
            </div>
        </div>

        <!-- Table -->
        <div class="table-container">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th class="table-header-cell">Name</th>
                        <th class="table-header-cell">Email</th>
                        <th class="table-header-cell">Phone Number</th>
                        <th class="table-header-cell">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr class="table-body-row">
                            <td class="table-body-cell">
                                <span class="user-name">{{ $user->name }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="user-email">{{ $user->email }}</span>
                            </td>
                            <td class="table-body-cell">
                                <span class="phone-number">{{ $user->phone_number }}</span>
                            </td>
                            <td class="table-body-cell">
                                <div class="action-buttons">
                                    <button class="edit-button" onclick="openEditModal({{ $user->id }}, '{{ $user->name }}', '{{ $user->email }}', '{{ $user->phone_number }}')">Edit</button>
                                    <button class="delete-button" onclick="deleteUser({{ $user->id }})">Delete</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr class="table-body-row">
                            <td colspan="4" class="empty-state">
                                No users found
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            {{ $users->links() }}
        </div>
    </div>

    <!-- Edit Modal -->
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">Edit User</div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT')
                
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" id="editName" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" id="editEmail" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" id="editPhone" name="phone_number" class="form-input" required>
                </div>

                <div class="modal-footer">
                    <button type="button" class="modal-button modal-button-secondary" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="modal-button modal-button-primary">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Delete Modal -->
    <div id="deleteModal" class="modal">
        <div class="modal-content" style="max-width: 400px;">
            <div class="modal-header">Delete User</div>
            <p style="color: #6b7280; margin-bottom: 24px;">Are you sure you want to delete this user? This action cannot be undone.</p>
            <div class="modal-footer">
                <button type="button" class="modal-button modal-button-secondary" onclick="closeDeleteModal()">Cancel</button>
                <button type="button" class="modal-button" style="background-color: #ef4444; color: white;" onclick="confirmDelete()">Delete</button>
            </div>
        </div>
    </div>

    <!-- Delete Form (hidden) -->
    <form id="deleteForm" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        // Auto-submit search form on input change
        const searchInput = document.getElementById('searchInput');
        const searchForm = document.getElementById('searchForm');
        let searchTimeout;

        if (searchInput) {
            searchInput.focus();

            const val = searchInput.value;
            searchInput.value = '';
            searchInput.value = val;

            searchInput.addEventListener('input', function() {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(function() {
                    searchForm.submit();
                }, 500);
            });
        }

        // Edit Modal Functions
        function openEditModal(userId, name, email, phone) {
            document.getElementById('editName').value = name;
            document.getElementById('editEmail').value = email;
            document.getElementById('editPhone').value = phone;
            
            const form = document.getElementById('editForm');
            form.action = `/admin/users/${userId}`;
            
            document.getElementById('editModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('active');
        }

        // Delete Modal Functions
        let deleteUserId = null;

        function deleteUser(userId) {
            deleteUserId = userId;
            document.getElementById('deleteModal').classList.add('active');
        }

        function closeDeleteModal() {
            document.getElementById('deleteModal').classList.remove('active');
            deleteUserId = null;
        }

        function confirmDelete() {
            if (deleteUserId) {
                const form = document.getElementById('deleteForm');
                form.action = `/admin/users/${deleteUserId}`;
                form.submit();
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const editModal = document.getElementById('editModal');
            const deleteModal = document.getElementById('deleteModal');
            
            if (event.target === editModal) {
                closeEditModal();
            }
            if (event.target === deleteModal) {
                closeDeleteModal();
            }
        }
    </script>
</body>
</html>