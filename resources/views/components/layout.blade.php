<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Findit' }} - Findit</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }
        .navbar {
            display: flex;
            align-items: center;
            padding: 0 32px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 60px;
        }
        .navbar-logo {
            font-size: 24px;
            font-weight: 900;
            color: #1f2937;
            min-width: fit-content;
            flex-shrink: 0;
        }
        .navbar-logo-highlight {
            color: #2563eb;
        }
        .navbar-links {
            display: flex;
            gap: 32px;
            align-items: center;
            flex: 1;
            justify-content: center;
        }
        .navbar-right {
            display: flex;
            gap: 16px;
            align-items: center;
            margin-left: auto;
            border-left: 1px solid #e5e7eb;
            padding-left: 32px;
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
            background: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .user-avatar:hover {
            background: #1d4ed8;
        }
        .navbar-logout {
            color: #2563eb;
            font-size: 14px;
            font-weight: 500;
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
        
        @auth
            <!-- Logged-in user navigation -->
            <div class="navbar-links">
                <x-nav-link href="/">Home</x-nav-link>
                <x-nav-link href="#">Browse</x-nav-link>
                <x-nav-link href="{{ route('report.found') }}">Report Found</x-nav-link>
                <x-nav-link href="{{ route('report.lost') }}">Report Lost</x-nav-link>
                <x-nav-link href="{{ route('history.index') }}">My History</x-nav-link>
            </div>
            
            <!-- User avatar and logout -->
            <div class="navbar-right" style="margin-left: auto;">
                <a href="{{ route('profile') }}" style="text-decoration: none;">
                    <div class="user-avatar">
                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                    </div>
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="navbar-link navbar-logout" style="background: none; border: none; cursor: pointer; padding: 0;">Logout</button>
                </form>
            </div>
        @else
            <!-- Guest user navigation -->
            <div class="navbar-links">
                <x-nav-link href="/">Home</x-nav-link>
                <x-nav-link href="#">Browse</x-nav-link>
                <x-nav-link href="/about">About</x-nav-link>
                <x-nav-link href="/contact">Contact</x-nav-link>
            </div>
            
            <!-- Login button -->
            <div class="navbar-right" style="margin-left: auto;">
                <a href="/login" class="navbar-link login" style="padding: 8px 16px; background-color: #2563eb; color: white; border-radius: 6px;">Login</a>
            </div>
        @endauth
    </div>

    <!-- Main Content -->
    {{ $slot }}
</body>
</html>
