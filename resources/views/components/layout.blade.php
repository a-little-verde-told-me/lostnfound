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
            margin-top: 60px;
        }

        /* ===== NAVBAR STYLES ===== */
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 1rem;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            height: 60px;
        }

        .navbar-left {
            display: flex;
            align-items: center;
            flex: 0 0 auto;
            gap: 1rem;
        }

        .navbar-center {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;            
        }

        .navbar-logo {
            font-size: 24px;
            font-weight: 900;
            color: #1f2937;
            min-width: fit-content;
            flex-shrink: 0;
            text-decoration: none;
            display: flex;
            align-items: center;
        }

        .navbar-logo-highlight {
            color: #2563eb;
        }

                .navbar-logo-desktop {
            display: none;
        }

        .navbar-logo-mobile {
            display: flex;
        }

        /* Desktop Navigation - Hidden on Mobile */
        .navbar-links {
            display: none;
            gap: 1.5rem;
            align-items: center;
        }

        @media (min-width: 768px) {
            .navbar-logo-desktop {
                display: flex;
            }
            .navbar-logo-mobile {
                display: none;
            }
            .navbar {
                display: grid;
                grid-template-columns: auto 1fr auto;
                padding: 0 2rem;
            }
                        
            .navbar-left {
                grid-column: 1;
                flex: 0 0 auto;
            }
            
            .navbar-center {
                grid-column: 2;
                flex: 1;
                justify-content: center;
                gap: 0;
            }
            
            .navbar-right {
                grid-column: 3;
                justify-content: flex-end;
            }
            
            .navbar-links {
                display: flex;
                gap: 1.5rem;
            }
        }

        /* Mobile: Logo centered */
        @media (max-width: 767px) {
            .navbar-center {
                justify-content: center;
            }
        }

        .navbar-right {
            display: flex;
            gap: 1rem;
            align-items: center;
            flex: 0 0 auto;
        }

        @media (max-width: 767px) {
            .navbar-right {
                border-left: none;
                padding-left: 0;
            }
        }

        @media (max-width: 767px) {
            .navbar-right {
                border-left: none;
                padding-left: 0;
            }
        }

        @media (min-width: 768px) {
            .navbar-right {
                display: flex;
                border-left: 1px solid #e5e7eb;
                padding-left: 2rem;
                gap: 1.5rem;
            }
        }

        .navbar-link {
            color: #1f2937;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
            white-space: nowrap;
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

        .navbar-link.active-page-style {
            color: #2563eb !important;
            font-weight: 700;
        }

        .navbar-logout {
            color: #ef4444;
            font-size: 14px;
            font-weight: 500;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            transition: color 0.2s;
        }

        .navbar-logout:hover {
            color: #dc2626;
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
            text-decoration: none;
        }

        .user-avatar:hover {
            background: #1d4ed8;
        }

        /* Hamburger Menu Button - Mobile Only */
        .hamburger-btn {
            display: flex;
            flex-direction: column;
            gap: 5px;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
            margin-right: 1rem;
        }

        .hamburger-btn span {
            width: 25px;
            height: 3px;
            background: #1f2937;
            border-radius: 2px;
            transition: all 0.3s ease;
            display: block;
        }

        .hamburger-btn.active span:nth-child(1) {
            /* Keep hamburger as is, no transform */
        }

        .hamburger-btn.active span:nth-child(2) {
            /* Keep hamburger as is, no transform */
        }

        .hamburger-btn.active span:nth-child(3) {
            /* Keep hamburger as is, no transform */
        }

        @media (min-width: 768px) {
            .hamburger-btn {
                display: none;
            }
        }

        /* Mobile Menu - Hidden by default */
        .mobile-menu {
            display: none;
            position: fixed;
            top: 60px;
            left: 0;
            width: 280px;
            height: calc(100vh - 60px);
            background: white;
            border-right: 1px solid #e5e7eb;
            flex-direction: column;
            gap: 0;
            z-index: 999;
            overflow-y: auto;
            transform: translateX(-100%);
            transition: transform 0.3s ease;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .mobile-menu.active {
            display: flex;
            transform: translateX(0);
        }

        @media (min-width: 768px) {
            .mobile-menu {
                display: none !important;
                transform: translateX(-100%);
            }
        }

        .mobile-menu-item {
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            color: #1f2937;
            text-decoration: none;
            font-size: 15px;
            font-weight: 500;
            transition: background-color 0.2s, color 0.2s;
            display: block;
        }

        .mobile-menu-item:hover {
            background-color: #f0f9ff;
            color: #2563eb;
        }

        .mobile-menu-item.active {
            color: #2563eb;
            font-weight: 700;
            background-color: #f0f9ff;
            border-left: 4px solid #2563eb;
            padding-left: calc(1.5rem - 4px);
        }

        .mobile-menu-divider {
            height: 1px;
            background: #e5e7eb;
            margin: 0.5rem 0;
        }

        .mobile-menu-section {
            padding: 0.5rem 0;
        }

        .mobile-user-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 1.5rem;
            border-bottom: 1px solid #f3f4f6;
            background-color: #f9fafb;
        }

        /* Mobile Menu Backdrop */
        .mobile-menu-backdrop {
            display: none;
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.3);
            z-index: 998;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .mobile-menu-backdrop.active {
            display: block;
            opacity: 1;
        }

        @media (min-width: 768px) {
            .mobile-menu-backdrop {
                display: none !important;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        @auth
            <!-- Left: Hamburger Menu Button (Mobile) + Logo (Desktop) -->
            <div class="navbar-left">
                <button class="hamburger-btn" id="hamburgerBtn" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="/" class="navbar-logo navbar-logo-desktop">Find<span class="navbar-logo-highlight">it</span></a>
            </div>

            <!-- Center: Logo (Mobile) + Navigation Links (Desktop) -->
            <div class="navbar-center">
                <a href="/" class="navbar-logo navbar-logo-mobile">Find<span class="navbar-logo-highlight">it</span></a>
                <div class="navbar-links">
                    <x-nav-link href="/">Home</x-nav-link>
                    <x-nav-link href="/#browse">Browse</x-nav-link>
                    <x-nav-link href="{{ route('report.found') }}">Report Found</x-nav-link>
                    <x-nav-link href="{{ route('report.lost') }}">Report Lost</x-nav-link>
                    <x-nav-link href="{{ route('history.index') }}">My History</x-nav-link>
                    <x-nav-link href="{{ route('reports.index') }}">My Reports</x-nav-link>
                    <x-nav-link href="/about">About</x-nav-link>
                    <x-nav-link href="/contact">Contact</x-nav-link>
                </div>
            </div>

            <!-- Right: User Avatar and Logout -->
            <div class="navbar-right">
                <a href="{{ route('profile') }}" class="user-avatar">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </a>
                <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                    @csrf
                    <button type="submit" class="navbar-logout">Logout</button>
                </form>
            </div>
        @else
            <!-- Left: Hamburger Menu Button (Mobile) + Logo (Desktop) -->
            <div class="navbar-left">
                <button class="hamburger-btn" id="hamburgerBtn" aria-label="Toggle menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <a href="/" class="navbar-logo navbar-logo-desktop" style="display: none;">Find<span class="navbar-logo-highlight">it</span></a>
            </div>

            <!-- Center: Logo (Mobile) + Navigation Links (Desktop) -->
            <div class="navbar-center">
                <a href="/" class="navbar-logo navbar-logo-mobile">Find<span class="navbar-logo-highlight">it</span></a>
                <div class="navbar-links">
                    <x-nav-link href="/">Home</x-nav-link>
                    <x-nav-link href="/#browse">Browse</x-nav-link>
                    <x-nav-link href="/about">About</x-nav-link>
                    <x-nav-link href="/contact">Contact</x-nav-link>
                </div>
            </div>

            <!-- Right: Login -->
            <div class="navbar-right">
                <a href="/login" class="navbar-link login">Login</a>
            </div>
        @endauth
    </nav>

    <!-- Mobile Menu Backdrop -->
    <div class="mobile-menu-backdrop" id="mobileMenuBackdrop"></div>

    <!-- Mobile Menu -->
    <div class="mobile-menu" id="mobileMenu">
        @auth
            <div class="mobile-menu-section">
                <a href="/" class="mobile-menu-item">Home</a>
                <a href="/#browse" class="mobile-menu-item">Browse</a>
                <a href="{{ route('report.found') }}" class="mobile-menu-item">Report Found</a>
                <a href="{{ route('report.lost') }}" class="mobile-menu-item">Report Lost</a>
                <a href="{{ route('history.index') }}" class="mobile-menu-item">My History</a>
                <a href="{{ route('reports.index') }}" class="mobile-menu-item">My Reports</a>
                <a href="/about" class="mobile-menu-item">About</a>
                <a href="/contact" class="mobile-menu-item">Contact</a>
            </div>
            <div class="mobile-menu-divider"></div>
            <div class="mobile-user-section">
                <a href="{{ route('profile') }}" class="user-avatar" style="flex-shrink: 0;">
                    {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                </a>
                <div style="flex: 1;">
                    <div style="font-weight: 600; color: #1f2937;">{{ Auth::user()->name ?? 'User' }}</div>
                    <div style="font-size: 12px; color: #6b7280;">{{ Auth::user()->email ?? '' }}</div>
                </div>
            </div>
            <form method="POST" action="{{ route('logout') }}" style="display: block; width: 100%;">
                @csrf
                <button type="submit" class="mobile-menu-item" style="width: 100%; text-align: left; border: none; background: none; color: #ef4444;">Logout</button>
            </form>
        @else
            <div class="mobile-menu-section">
                <a href="/" class="mobile-menu-item">Home</a>
                <a href="/#browse" class="mobile-menu-item">Browse</a>
                <a href="/about" class="mobile-menu-item">About</a>
                <a href="/contact" class="mobile-menu-item">Contact</a>
            </div>
            <div class="mobile-menu-divider"></div>
            <a href="/login" class="mobile-menu-item" style="color: #2563eb; font-weight: 600;">Login</a>
        @endauth
    </div>

    <!-- Main Content -->
    <main>
        {{ $slot }}
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburgerBtn = document.getElementById('hamburgerBtn');
            const mobileMenu = document.getElementById('mobileMenu');
            const mobileMenuBackdrop = document.getElementById('mobileMenuBackdrop');

            // Function to close menu
            function closeMenu() {
                hamburgerBtn.classList.remove('active');
                mobileMenu.classList.remove('active');
                mobileMenuBackdrop.classList.remove('active');
                document.body.style.overflow = 'auto';
            }

            // Toggle mobile menu
            hamburgerBtn.addEventListener('click', function() {
                const isActive = mobileMenu.classList.contains('active');
                if (isActive) {
                    closeMenu();
                } else {
                    hamburgerBtn.classList.add('active');
                    mobileMenu.classList.add('active');
                    mobileMenuBackdrop.classList.add('active');
                    document.body.style.overflow = 'hidden';
                }
            });

            // Close menu when clicking on a link
            const menuItems = mobileMenu.querySelectorAll('a');
            menuItems.forEach(item => {
                item.addEventListener('click', function() {
                    closeMenu();
                });
            });

            // Close menu when clicking backdrop
            mobileMenuBackdrop.addEventListener('click', function() {
                closeMenu();
            });

            // Close menu when clicking outside
            document.addEventListener('click', function(event) {
                if (!event.target.closest('.navbar') && 
                    !event.target.closest('.mobile-menu') && 
                    !event.target.closest('.mobile-menu-backdrop')) {
                    if (mobileMenu.classList.contains('active')) {
                        closeMenu();
                    }
                }
            });
        });
    </script>
</body>
</html>
