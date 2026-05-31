<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Findit - Find Your Lost Items</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #ffffff;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
        }

        /* Navbar Styles */
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
            text-decoration: none;
        }

        .navbar-logo-highlight {
            color: #2563eb;
        }

        .navbar-nav {
            display: flex;
            gap: 32px;
            align-items: center;
            margin: 0;
            list-style: none;
        }

        .navbar-nav a {
            text-decoration: none;
            color: #1f2937;
            font-size: 16px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .navbar-nav a:hover {
            color: #2563eb;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .nav-link-logout {
            color: #ef4444;
        }

        .nav-link-logout:hover {
            color: #dc2626;
        }

        .nav-link-login {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border-radius: 6px;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: background-color 0.2s;
        }

        .nav-link-login:hover {
            background-color: #1d4ed8;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #e0e7ff 0%, #dbeafe 100%);
            padding: 80px 32px;
            text-align: center;
        }

        .hero-content h1 {
            font-size: 42px;
            color: #2563eb;
            margin-bottom: 16px;
            font-weight: 700;
        }

        .hero-content p {
            font-size: 18px;
            color: #4b5563;
            margin-bottom: 32px;
        }

        .hero-buttons {
            display: flex;
            gap: 16px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 12px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-dark {
            background-color: #1f2937;
            color: white;
        }

        .btn-dark:hover {
            background-color: #111827;
        }

        /* Browse Section */
        .browse-section {
            padding: 48px 32px;
            background-color: #ffffff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .section-title {
            font-size: 32px;
            color: #2563eb;
            margin-bottom: 32px;
            font-weight: 700;
        }

        .search-filter-row {
            display: flex;
            gap: 16px;
            margin-bottom: 32px;
            flex-wrap: wrap;
        }

        .search-box {
            flex: 1;
            min-width: 250px;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            font-size: 14px;
        }

        .filter-button,
        .sort-button {
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            background-color: white;
            cursor: pointer;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
        }

        .filter-button:hover,
        .sort-button:hover {
            border-color: #2563eb;
            color: #2563eb;
        }

        .items-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .item-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .item-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transform: translateY(-2px);
        }

        .item-image {
            width: 100%;
            height: 220px;
            background-color: #f3f4f6;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .item-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .item-badge {
            position: absolute;
            top: 12px;
            right: 12px;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            color: white;
        }

        .badge-found {
            background-color: #10b981;
        }

        .badge-lost {
            background-color: #ef4444;
        }

        .item-info {
            padding: 16px;
        }

        .item-name {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .item-location {
            font-size: 14px;
            color: #6b7280;
            display: flex;
            align-items: center;
            margin-bottom: 8px;
        }

        .item-date {
            font-size: 13px;
            color: #9ca3af;
            margin-bottom: 12px;
        }

        .item-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-small {
            flex: 1;
            padding: 8px 12px;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            min-width: 80px;
        }

        .btn-claim {
            background-color: #2563eb;
            color: white;
        }

        .btn-claim:hover {
            background-color: #1d4ed8;
        }

        .btn-details {
            background-color: white;
            color: #2563eb;
            border: 1px solid #2563eb;
        }

        .btn-details:hover {
            background-color: #eff6ff;
        }

        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            margin-top: 48px;
            flex-wrap: wrap;
        }

        .pagination a,
        .pagination span {
            padding: 10px 12px;
            border: 1px solid #e5e7eb;
            background-color: white;
            color: #1f2937;
            cursor: pointer;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-width: 40px;
            height: 40px;
        }

        .pagination a:hover {
            border-color: #2563eb;
            color: #2563eb;
            background-color: #f0f9ff;
        }

        .pagination span.active {
            background-color: #2563eb;
            border-color: #2563eb;
            color: white;
            font-weight: 600;
        }

        .pagination .disabled span {
            color: #d1d5db;
            cursor: not-allowed;
            background-color: #f9fafb;
        }

        .pagination-info {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-top: 16px;
            margin-bottom: 24px;
        }

        /* User Profile Dropdown (placeholder for future) */
        .user-menu {
            position: relative;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6b7280;
        }

        @media (max-width: 768px) {
            .navbar {
                flex-wrap: wrap;
                padding: 12px 16px;
            }

            .navbar-nav {
                gap: 16px;
                font-size: 14px;
            }

            .hero-content h1 {
                font-size: 28px;
            }

            .hero-content p {
                font-size: 16px;
            }

            .hero-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .items-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
                gap: 16px;
            }

            .search-filter-row {
                flex-direction: column;
            }

            .search-box {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('home') }}" class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></a>
        
        @if (Auth::check())
            <!-- Logged In User Navigation -->
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#browse">Browse</a></li>
                <li><a href="#">Report Found</a></li>
                <li><a href="#">Report Lost</a></li>
                <li><a href="#">My Claims</a></li>
            </ul>
            <div class="navbar-right">
                <div class="user-menu">
                    <div class="user-avatar">{{ substr(Auth::user()->name, 0, 1) }}</div>
                </div>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="nav-link-logout" style="background: none; border: none; cursor: pointer; font-weight: 500;">Logout</button>
                </form>
            </div>
        @else
            <!-- Guest Navigation -->
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#browse">Browse</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('contact') }}">Contact</a></li>
            </ul>
            <div class="navbar-right">
                <a href="{{ route('login') }}" class="nav-link-login">Login</a>
            </div>
        @endif
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Find What You've Lost</h1>
                <p>Find your lost items or report what you've found.</p>
                <div class="hero-buttons">
                    @if (Auth::check())
                        <button class="btn btn-primary">Report Lost Item</button>
                        <button class="btn btn-dark">Report Found Item</button>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-primary">Report Lost Item</a>
                        <a href="{{ route('login') }}" class="btn btn-dark">Report Found Item</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Browse Section -->
    <div class="browse-section" id="browse">
        <div class="container">
            <h2 class="section-title">Browse Items</h2>
            
            <div class="search-filter-row">
                <input type="text" class="search-box" placeholder="Search for lost item by names, locations, or category...">
                <button class="filter-button">Filter</button>
                <button class="sort-button">Sort: Latest</button>
            </div>

            <div class="items-grid">
                @forelse($items as $item)
                    <div class="item-card">
                        <div class="item-image">
                            <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); display: flex; align-items: center; justify-content: center;">
                                <span style="color: #9ca3af; font-size: 14px;">{{ $item->name }}</span>
                            </div>
                            <span class="item-badge {{ $item->type === 'found' ? 'badge-found' : 'badge-lost' }}">{{ ucfirst($item->type) }}</span>
                        </div>
                        <div class="item-info">
                            <div class="item-name">{{ $item->name }}</div>
                            <div class="item-location">{{ $item->location }}</div>
                            <div class="item-date">{{ $item->date_reported->format('m/d/Y') }}</div>
                            <div class="item-actions">
                                @if($item->type === 'found')
                                    <button class="btn-small btn-claim">Claim Item</button>
                                @else
                                    <button class="btn-small btn-claim">Found Item</button>
                                @endif
                                <button class="btn-small btn-details">Details</button>
                            </div>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px; color: #6b7280;">
                        <p style="font-size: 16px;">No items found</p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination Info -->
            @if($items->total() > 0)
                <div class="pagination-info">
                    Showing {{ $items->firstItem() }} to {{ $items->lastItem() }} of {{ $items->total() }} results
                </div>
            @endif

            <!-- Pagination -->
            @if($items->hasPages())
                <div style="display: flex; justify-content: center; margin-bottom: 32px;">
                    {{ $items->links() }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>
