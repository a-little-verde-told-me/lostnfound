<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Claims - Findit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f9fafb;
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

        .navbar-nav a.active {
            color: #2563eb;
            font-weight: 600;
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

        /* Main Container */
        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 16px;
        }

        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 32px;
            color: #2563eb;
            margin-bottom: 8px;
        }

        .page-header p {
            color: #6b7280;
            font-size: 16px;
        }

        /* Alert Styles */
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

        /* Empty State */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            background: white;
            border-radius: 8px;
            border: 1px solid #e5e7eb;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 16px;
        }

        .empty-state h2 {
            color: #1f2937;
            font-size: 20px;
            margin-bottom: 8px;
        }

        .empty-state p {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .empty-state-icon {
            font-size: 48px;
            margin-bottom: 16px;
            color: #2563eb;
        }

        .btn {
            padding: 12px 32px;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        /* Claims List */
        .claims-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .claim-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .claim-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-color: #d1d5db;
        }

        .claim-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
        }

        .claim-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .claim-date {
            font-size: 13px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .claim-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-pending {
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

        .claim-proof {
            margin: 16px 0;
            padding: 12px;
            background-color: #f3f4f6;
            border-left: 4px solid #2563eb;
            border-radius: 4px;
        }

        .claim-proof-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .claim-proof-text {
            font-size: 14px;
            color: #1f2937;
            line-height: 1.5;
        }

        .claim-feedback {
            margin-top: 12px;
            padding: 12px;
            background-color: #fee2e2;
            border-left: 4px solid #ef4444;
            border-radius: 4px;
        }

        .claim-feedback-label {
            font-size: 12px;
            font-weight: 600;
            color: #991b1b;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .claim-feedback-text {
            font-size: 14px;
            color: #991b1b;
            line-height: 1.5;
        }

        .claim-feedback.approved {
            background-color: #d1fae5;
            border-left-color: #10b981;
        }

        .claim-feedback.approved .claim-feedback-label {
            color: #065f46;
        }

        .claim-feedback.approved .claim-feedback-text {
            color: #065f46;
        }

        .claim-actions {
            display: flex;
            gap: 12px;
            margin-top: 16px;
        }

        .btn-small {
            padding: 8px 16px;
            font-size: 13px;
            border: 1px solid #d1d5db;
            background: white;
            color: #1f2937;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .btn-small:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }

        .btn-small.primary {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .btn-small.primary:hover {
            background-color: #1d4ed8;
        }

        @media (max-width: 640px) {
            .navbar {
                padding: 12px 16px;
            }

            .navbar-nav {
                gap: 16px;
            }

            .navbar-nav a {
                font-size: 14px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .claim-card {
                padding: 16px;
            }

            .claim-header {
                flex-direction: column;
            }

            .claim-actions {
                flex-direction: column;
            }

            .btn-small {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('home') }}#browse">Browse</a></li>
            <li><a href="{{ route('report.found') }}">Report Found</a></li>
            <li><a href="{{ route('report.lost') }}">Report Lost</a></li>
            @if(Auth::check())
                <li><a href="{{ route('claims.index') }}" class="active">My Claims</a></li>
            @endif
        </ul>
        <div class="navbar-right">
            @if(Auth::check())
                <span style="color: #6b7280; font-size: 14px;">{{ Auth::user()->name ?? 'User' }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-weight: 500; font-size: 14px;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link-login">Login</a>
            @endif
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>My claims</h1>
        </div>

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

        @if($claims->isEmpty())
            <div class="empty-state">

                <div class="empty-state-icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>

                <h2>No claims yet</h2>
                <p>You haven't submitted any claims. Browse found items and claim them if they belong to you.</p>
                <a href="{{ route('home') }}#browse" class="btn btn-primary">Browse items</a>
            </div>
        @else
            <div class="claims-list">
                @foreach($claims as $claim)
                    <div class="claim-card">
                        <div class="claim-header">
                            <div>
                                <div class="claim-title">{{ $claim->foundReport->name ?? 'Item' }}</div>
                                <div class="claim-date">Submitted {{ $claim->date_claimed->format('M d, Y \a\t g:i A') }}</div>
                            </div>
                            <span class="claim-status status-{{ strtolower($claim->status) }}">
                                {{ ucfirst($claim->status) }}
                            </span>
                        </div>

                        <div class="claim-proof">
                            <div class="claim-proof-label">Your proof</div>
                            <div class="claim-proof-text">{{ $claim->proof_description }}</div>
                        </div>

                        @if($claim->status === 'approved')
                            <div class="claim-feedback approved">
                                <div class="claim-feedback-label">✓ Claim approved by Admin</div>
                                <div class="claim-feedback-text">
                                    Pick up your item at: {{ $claim->foundReport->location ?? 'Guard post, main entrance' }}
                                </div>
                            </div>
                        @elseif($claim->status === 'rejected')
                            <div class="claim-feedback">
                                <div class="claim-feedback-label">Claim rejected by Admin</div>
                                <div class="claim-feedback-text">
                                    Reason: {{ $claim->admin_feedback ?? 'Insufficient proof of ownership. Please provide more details.' }}
                                </div>
                            </div>
                            <div class="claim-actions">
                                <button class="btn-small primary">Re-submit with better proof</button>
                            </div>
                        @elseif($claim->status === 'pending')
                            <div style="margin-top: 12px; padding: 12px; background-color: #fef3c7; border-left: 4px solid #d97706; border-radius: 4px;">
                                <div style="font-size: 12px; font-weight: 600; color: #92400e; text-transform: uppercase; margin-bottom: 4px;">Admin is reviewing your claim</div>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
