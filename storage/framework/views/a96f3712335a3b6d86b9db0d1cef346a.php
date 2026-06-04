<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($title ?? 'Admin'); ?> - Findit Admin</title>
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
            <div class="sidebar-section-title">MAIN</div>
            <a href="<?php echo e(route('admin.dashboard')); ?>" class="sidebar-link">Dashboard</a>
        </div>
        
        <div class="sidebar-section">
            <div class="sidebar-section-title">MANAGEMENT</div>
            <a href="<?php echo e(route('admin.items')); ?>" class="sidebar-link">User Reports</a>
            <a href="<?php echo e(route('admin.claims')); ?>" class="sidebar-link">Claims</a>
            <a href="<?php echo e(route('admin.returns')); ?>" class="sidebar-link">Returns</a>
            <a href="<?php echo e(route('admin.categories')); ?>" class="sidebar-link">Categories</a>
            <a href="<?php echo e(route('admin.users')); ?>" class="sidebar-link">Users</a>
        </div>
        
        <div class="sidebar-section">
            <div class="sidebar-section-title">REPORTS</div>
            <a href="<?php echo e(route('admin.reports')); ?>" class="sidebar-link">Reports</a>
        </div>
        
        <div class="sidebar-spacer"></div>
        
        <div class="sidebar-logout">
            <form method="POST" action="<?php echo e(route('logout')); ?>">
                <?php echo csrf_field(); ?>
                <button type="submit" class="logout-button">Logout</button>
            </form>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <?php echo e($slot); ?>

    </div>
</body>
</html>
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/components/admin-layout.blade.php ENDPATH**/ ?>