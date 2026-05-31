<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Findit</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            background-color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 16px 32px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
        }
        .navbar-logo {
            font-size: 24px;
            font-weight: 900;
            color: #1f2937;
        }
        .navbar-logo-highlight {
            color: #2563eb;
        }
        .navbar-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }
        .user-info {
            font-size: 14px;
            color: #6b7280;
        }
        .user-name {
            color: #1f2937;
            font-weight: 500;
        }
        .logout-button {
            padding: 8px 16px;
            background-color: #ef4444;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .logout-button:hover {
            background-color: #dc2626;
        }
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 16px;
        }
        .welcome-message {
            background: white;
            border-radius: 8px;
            padding: 32px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .welcome-message h1 {
            font-size: 28px;
            color: #1f2937;
            margin-bottom: 12px;
        }
        .welcome-message p {
            color: #6b7280;
            font-size: 16px;
        }
        .admin-badge {
            display: inline-block;
            background-color: #fef3c7;
            color: #92400e;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            margin-top: 12px;
        }
        .dashboard-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 24px;
        }
        .dashboard-card {
            background: white;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 16px;
        }
        .card-content {
            color: #6b7280;
            font-size: 14px;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></div>
        <div class="navbar-right">
            <div class="user-info">
                Welcome, <span class="user-name">{{ Auth::user()->name }}</span> <span class="admin-badge">ADMIN</span>
            </div>
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>

    <!-- Main Container -->
    <div class="container">
        <div class="welcome-message">
            <h1>Welcome to Findit Admin Dashboard!</h1>
            <p>You are successfully logged in as administrator. This is your admin dashboard where you can manage the Lost and Found system.</p>
        </div>

        <div class="dashboard-grid">
            <div class="dashboard-card">
                <div class="card-title">📊 System Overview</div>
                <div class="card-content">
                    Manage all lost and found items, user reports, and claims in one place.
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-title">👥 User Management</div>
                <div class="card-content">
                    View and manage all user accounts, roles, and permissions in the system.
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-title">🔍 Item Management</div>
                <div class="card-content">
                    Review lost and found items, verify reports, and manage item categories.
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-title">📋 Claims Management</div>
                <div class="card-content">
                    Review and approve/reject claims made by users on found items.
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-title">📈 Analytics</div>
                <div class="card-content">
                    View statistics and insights about lost/found items and system usage.
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-title">⚙️ Settings</div>
                <div class="card-content">
                    Configure system settings, categories, and other administrative options.
                </div>
            </div>
        </div>
    </div>
</body>
</html>
