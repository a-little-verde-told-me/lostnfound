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
        .dashboard-title {
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 32px;
        }
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 24px;
            margin-bottom: 32px;
        }
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .stat-number {
            font-size: 48px;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .stat-label {
            font-size: 14px;
            color: #6b7280;
        }
        .content-grid {
            display: grid;
            grid-template-columns: 1.5fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
        }
        .view-all-link {
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            transition: color 0.2s;
        }
        .view-all-link:hover {
            color: #1d4ed8;
        }
        .claim-item {
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .claim-item:last-child {
            border-bottom: none;
        }
        .claim-info {
            flex: 1;
        }
        .claim-name {
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 4px;
        }
        .claim-meta {
            font-size: 12px;
            color: #6b7280;
        }
        .claim-status {
            font-size: 12px;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 4px;
        }
        .status-active {
            background-color: #fef3c7;
            color: #92400e;
        }
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
        }
        .activity-item {
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            gap: 12px;
        }
        .activity-item:last-child {
            border-bottom: none;
        }
        .activity-avatar {
            width: 40px;
            height: 40px;
            background-color: #e5e7eb;
            border-radius: 50%;
            flex-shrink: 0;
        }
        .activity-content {
            flex: 1;
        }
        .activity-title {
            font-size: 13px;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 2px;
        }
        .activity-meta {
            font-size: 12px;
            color: #6b7280;
        }
        .activity-time {
            font-size: 12px;
            color: #9ca3af;
        }
        .button-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-top: 24px;
        }
        .primary-button {
            padding: 12px 24px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .primary-button:hover {
            background-color: #1d4ed8;
        }
        .secondary-button {
            padding: 12px 24px;
            background-color: white;
            color: #1f2937;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
        }
        .secondary-button:hover {
            background-color: #f9fafb;
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
            <a href="#" class="sidebar-link active">Admin Dashboard</a>
        </div>

        <div class="sidebar-section">
            <div class="sidebar-section-title">MANAGEMENT</div>
            <a href="{{ route('admin.claims') }}" class="sidebar-link">Manage Claims</a>
            <a href="{{ route('admin.returns') }}" class="sidebar-link">Manage Returns</a>
            <a href="{{ route('admin.items') }}" class="sidebar-link">Manage User Reports</a>
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
        <h1 class="dashboard-title">Admin dashboard</h1>

        <!-- Stats Grid -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-number">1</div>
                <div class="stat-label">Lost Report</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">3</div>
                <div class="stat-label">Found Report</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">2</div>
                <div class="stat-label">Active</div>
            </div>
            <div class="stat-card">
                <div class="stat-number">10</div>
                <div class="stat-label">Resolved</div>
            </div>
        </div>

        <!-- Content Grid -->
        <div class="content-grid">
            <!-- Recent Claims -->
            <div class="content-card">
                <div class="card-header">
                    <div class="card-title">Recent claims to review</div>
                    <a href="#" class="view-all-link">View all</a>
                </div>

                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name">Wireless earphone</div>
                        <div class="claim-meta">by Yasmien De Guzman - May 29</div>
                    </div>
                    <div class="claim-status status-active">Active</div>
                </div>

                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name">School ID card</div>
                        <div class="claim-meta">by Jasmine Santos - May 27</div>
                    </div>
                    <div class="claim-status status-active">Active</div>
                </div>

                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name">Android phone</div>
                        <div class="claim-meta">by Ian Derilo - May 24</div>
                    </div>
                    <div class="claim-status status-approved">Approved</div>
                </div>

                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name">Blue backpack</div>
                        <div class="claim-meta">by Ana Reyes - May 23</div>
                    </div>
                    <div class="claim-status status-rejected">Rejected</div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="content-card">
                <div class="card-title" style="margin-bottom: 20px;">Recent activity</div>

                <div class="activity-item">
                    <div class="activity-avatar"></div>
                    <div class="activity-content">
                        <div class="activity-title">Found: Wireless earphones</div>
                        <div class="activity-meta">Reported by Maria R. — Library</div>
                    </div>
                    <div class="activity-time">2h ago</div>
                </div>

                <div class="activity-item">
                    <div class="activity-avatar"></div>
                    <div class="activity-content">
                        <div class="activity-title">Lost: Black backpack</div>
                        <div class="activity-meta">by Jasmine Santos - May 27</div>
                    </div>
                    <div class="activity-time">4h ago</div>
                </div>

                <div class="activity-item">
                    <div class="activity-avatar"></div>
                    <div class="activity-content">
                        <div class="activity-title">Android phone</div>
                        <div class="activity-meta">Reported by Juan D. — Bldg A</div>
                    </div>
                    <div class="activity-time">2h ago</div>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="button-group">
            <button class="primary-button">Review Active Claims (5)</button>
            <button class="secondary-button">Generate Report</button>
        </div>
    </div>
</body>
</html>
