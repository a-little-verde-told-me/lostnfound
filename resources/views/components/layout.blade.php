<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Findit' }} - Findit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
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
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }
        .navbar-logo {
            font-size: 24px;
            font-weight: 900;
            color: #1f2937;
            min-width: fit-content;
        }
        .navbar-logo-highlight {
            color: #2563eb;
        }
        .navbar-links {
            display: flex;
            gap: 40px;
            align-items: center;
            margin-left: auto;
        }
        .navbar-link {
            color: #1f2937;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }
        .navbar-link:hover {
            color: #6b7280;
        }
        .navbar-link.login {
            color: #2563eb;
            text-decoration: none;
        }
        .navbar-link.login:hover {
            color: #1d4ed8;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #d1d5db;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6b7280;
            font-size: 12px;
        }
        .navbar-logout {
            color: #2563eb;
        }
        .navbar-logout:hover {
            color: #1d4ed8;
        }
        body {
            margin-top: 60px;
        }
        {{ $styles ?? '' }}
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <div class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></div>
        <div class="navbar-links">
            <x-nav-link href="/">Home</x-nav-link>
            <x-nav-link href="#">Browse</x-nav-link>
            
            @auth
                <!-- Logged-in user navigation -->
                <x-nav-link href="{{ route('report.found') }}">Report Found</x-nav-link>
                <x-nav-link href="{{ route('report.lost') }}">Report Lost</x-nav-link>
                <x-nav-link href="{{ route('claims.index') }}">My Claims</x-nav-link>
                
                <!-- User avatar and logout -->
                <div style="display: flex; gap: 12px; align-items: center; margin-left: 20px; border-left: 1px solid #e5e7eb; padding-left: 20px;">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                        @csrf
                        <button type="submit" class="navbar-link navbar-logout" style="background: none; border: none; cursor: pointer; padding: 0;">Logout</button>
                    </form>
                </div>
            @else
                <!-- Guest user navigation -->
                <x-nav-link href="/about">About</x-nav-link>
                <x-nav-link href="/contact">Contact</x-nav-link>
                <x-nav-link href="/login">Login</x-nav-link>
            @endauth
        </div>
    </div>

    <!-- Main Content -->
    {{ $slot }}
</body>
</html>
