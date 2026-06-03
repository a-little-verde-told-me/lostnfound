<x-layout title="My History">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f9fafb;
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            margin-top: 60px;
        }

        /* Navbar Styles */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 32px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            height: 60px;
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
            font-size: 14px;
            font-weight: 500;
            transition: color 0.2s;
        }

        .navbar-nav a:hover {
            color: #6b7280;
        }

        .navbar-nav a.active {
            color: #2563eb;
            font-weight: 600;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-left: 32px;
            border-left: 1px solid #e5e7eb;
            padding-left: 32px;
        }

        .user-menu {
            position: relative;
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

        .nav-link-logout {
            color: #2563eb;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            background: none;
            border: none;
            cursor: pointer;
            transition: color 0.2s;
        }

        .nav-link-logout:hover {
            color: #1d4ed8;
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

        /* Filter Section */
        .filter-section {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }

        .filter-button {
            padding: 8px 16px;
            border: 1px solid #d1d5db;
            background: white;
            color: #1f2937;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.2s;
            font-size: 14px;
            font-weight: 500;
            text-decoration: none;
            display: inline-block;
        }

        .filter-button:hover {
            background-color: #f3f4f6;
            border-color: #9ca3af;
        }

        .filter-button.active {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
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
            color: #2563eb;
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

        /* History List */
        .history-list {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .history-card {
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.2s;
        }

        .history-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            border-color: #d1d5db;
        }

        .history-card.claim-card {
            border-left: 4px solid #2563eb;
        }

        .history-card.return-card {
            border-left: 4px solid #10b981;
        }

        .history-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 12px;
        }

        .history-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
        }

        .history-date {
            font-size: 13px;
            color: #9ca3af;
            margin-top: 4px;
        }

        .type-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 12px;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
        }

        .type-claim {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .type-return {
            background-color: #dcfce7;
            color: #166534;
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

        .status-submitted {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .history-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .info-item {
            font-size: 13px;
        }

        .info-label {
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 4px;
        }

        .info-value {
            color: #1f2937;
            font-size: 14px;
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

        .history-actions {
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

            .history-card {
                padding: 16px;
            }

            .history-header {
                flex-direction: column;
            }

            .history-info {
                grid-template-columns: 1fr;
            }

            .history-actions {
                flex-direction: column;
            }

            .btn-small {
                width: 100%;
            }

            .filter-section {
                justify-content: center;
            }
        }
    </style>

    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1><strong>My History</strong></h1>
            <p>View all your claims and item returns</p>
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

        <!-- Filter Section -->
        <div class="filter-section">
            <a href="{{ route('history.index', ['filter' => 'all']) }}" class="filter-button {{ $filter === 'all' ? 'active' : '' }}">
                All ({{ $history->count() }})
            </a>
            <a href="{{ route('history.index', ['filter' => 'claims']) }}" class="filter-button {{ $filter === 'claims' ? 'active' : '' }}">
                Claims ({{ $claims->count() }})
            </a>
            <a href="{{ route('history.index', ['filter' => 'returns']) }}" class="filter-button {{ $filter === 'returns' ? 'active' : '' }}">
                Returns ({{ $returns->count() }})
            </a>
        </div>

        @if($history->isEmpty())
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fa fa-history"></i>
                </div>
                <h2>No history yet</h2>
                <p>You haven't submitted any claims or returns yet.</p>
                <a href="{{ route('home') }}#browse" class="btn btn-primary">Browse items</a>
            </div>
        @else
            <div class="history-list">
                @foreach($history as $item)
                    @if($item->type === 'claim')
                        <div class="history-card claim-card">
                            <div class="history-header">
                                <div>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <div class="history-title">{{ $item->item?->name ?? 'Item' }}</div>
                                        <span class="type-badge type-claim">Claim</span>
                                    </div>
                                    <div class="history-date">Submitted {{ $item->date->format('M d, Y \a\t g:i A') }}</div>
                                </div>
                                <span class="claim-status status-{{ strtolower($item->status) }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </div>

                            <div class="history-info">
                                <div class="info-item">
                                    <div class="info-label">Item Category</div>
                                    <div class="info-value">{{ $item->item?->category?->name ?? '-' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Your Email</div>
                                    <div class="info-value">{{ $item->contact_email }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Your Phone</div>
                                    <div class="info-value">{{ $item->contact_number }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Item Location</div>
                                    <div class="info-value">{{ $item->item?->location ?? '-' }}</div>
                                </div>
                            </div>

                            @if($item->status === 'approved')
                                <div class="claim-feedback approved">
                                    <div class="claim-feedback-label">✓ Claim approved by Admin</div>
                                    <div class="claim-feedback-text">
                                        Pick up your item at: {{ $item->item?->location ?? 'Guard post, main entrance' }}
                                    </div>
                                </div>
                            @elseif($item->status === 'rejected')
                                <div class="claim-feedback">
                                    <div class="claim-feedback-label">Claim rejected by Admin</div>
                                    <div class="claim-feedback-text">
                                        Reason: {{ $item->admin_feedback ?? 'Insufficient proof of ownership. Please provide more details.' }}
                                    </div>
                                </div>
                                <div class="history-actions">
                                    <a href="{{ route('claim.edit', $item->id) }}" class="btn-small primary">Re-submit with better proof</a>
                                </div>
                            @elseif($item->status === 'pending')
                                <div style="margin-top: 12px; padding: 12px; background-color: #fef3c7; border-left: 4px solid #d97706; border-radius: 4px;">
                                    <div style="font-size: 12px; font-weight: 600; color: #92400e; text-transform: uppercase;">Admin is reviewing your claim</div>
                                </div>
                            @endif
                        </div>
                    @else
                        <div class="history-card return-card">
                            <div class="history-header">
                                <div>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <div class="history-title">{{ $item->item?->name ?? 'Item' }}</div>
                                        <span class="type-badge type-return">Return</span>
                                    </div>
                                    <div class="history-date">Submitted {{ $item->date->format('M d, Y \a\t g:i A') }}</div>
                                </div>
                                <span class="claim-status status-{{ strtolower($item->status) }}">
                                    {{ ucfirst($item->status) }}
                                </span>
                            </div>

                            <div class="history-info">
                                <div class="info-item">
                                    <div class="info-label">Item Category</div>
                                    <div class="info-value">{{ $item->item?->category?->name ?? '-' }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Your Email</div>
                                    <div class="info-value">{{ $item->contact_email }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Your Phone</div>
                                    <div class="info-value">{{ $item->contact_number }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Item Found Location</div>
                                    <div class="info-value">{{ $item->item?->location ?? '-' }}</div>
                                </div>
                            </div>

                            @if($item->status === 'approved')
                                <div class="claim-feedback approved">
                                    <div class="claim-feedback-label">✓ Return approved by Admin</div>
                                    <div class="claim-feedback-text">
                                        Your return has been approved and processed.
                                    </div>
                                </div>
                            @elseif($item->status === 'rejected')
                                <div class="claim-feedback">
                                    <div class="claim-feedback-label">Return rejected by Admin</div>
                                    <div class="claim-feedback-text">
                                        Your return submission could not be processed. Please contact support for more information.
                                    </div>
                                </div>
                                <div class="history-actions">
                                    <a href="{{ route('return.edit', $item->id) }}" class="btn-small primary">Re-submit Return</a>
                                </div>
                            @elseif($item->status === 'pending')
                                <div style="margin-top: 12px; padding: 12px; background-color: #fef3c7; border-left: 4px solid #d97706; border-radius: 4px;">
                                    <div style="font-size: 12px; font-weight: 600; color: #92400e; text-transform: uppercase;">Admin is reviewing your return</div>
                                </div>
                            @endif
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
</x-layout>
