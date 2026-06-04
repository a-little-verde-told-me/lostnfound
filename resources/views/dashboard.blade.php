<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Findit</title>
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
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></div>
        <div class="navbar-right">
            <div class="user-info">
                Welcome, <span class="user-name">{{ Auth::user()->name }}</span>
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
            <h1>Welcome to Findit Dashboard!</h1>
            <p>You are successfully logged in. This is your dashboard where you can manage lost and found items.</p>
        </div>
    </div>
</body>
</html>
