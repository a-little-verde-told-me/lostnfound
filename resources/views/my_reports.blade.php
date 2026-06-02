<x-layout title="My Reports">
    <style>
        .reports-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 16px;
        }

        .reports-title {
            font-size: 32px;
            font-weight: 700;
            color: #2563eb;
            text-align: center;
            margin-bottom: 40px;
        }

        .report-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #e5e7eb;
        }

        .report-card.lost {
            border-left-color: #f59e0b;
        }

        .report-card.found {
            border-left-color: #10b981;
        }

        .report-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 16px;
        }

        .report-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin: 0;
        }

        .report-status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 6px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
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
            color: #7f1d1d;
        }

        .report-date {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 16px;
        }

        .report-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
            margin-bottom: 16px;
        }

        .info-item {
            padding: 12px;
            background: #f9fafb;
            border-radius: 6px;
        }

        .info-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 4px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .info-label i {
            color: #2563eb;
            width: 14px;
            text-align: center;
        }

        .info-value {
            font-size: 14px;
            color: #1f2937;
            font-weight: 500;
        }

        .report-description {
            padding: 12px;
            background: #f9fafb;
            border-radius: 6px;
            margin-bottom: 16px;
            border-left: 3px solid #2563eb;
        }

        .report-description-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 8px;
        }

        .report-description-text {
            font-size: 14px;
            color: #1f2937;
            line-height: 1.5;
        }

        .admin-feedback {
            padding: 12px;
            background: #eff6ff;
            border-left: 3px solid #2563eb;
            border-radius: 6px;
            margin: 16px 0;
        }

        .admin-feedback-label {
            font-size: 12px;
            font-weight: 600;
            color: #1e40af;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .admin-feedback-label i {
            width: 14px;
            text-align: center;
        }

        .admin-feedback-text {
            font-size: 13px;
            color: #1e3a8a;
            line-height: 1.5;
        }

        .admin-action {
            padding: 12px;
            background: #fef2f2;
            border-left: 3px solid #dc2626;
            border-radius: 6px;
            margin: 16px 0;
        }

        .admin-action-label {
            font-size: 12px;
            font-weight: 600;
            color: #991b1b;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .admin-action-label i {
            width: 14px;
            text-align: center;
        }

        .admin-action-text {
            font-size: 13px;
            color: #7f1d1d;
            line-height: 1.5;
        }

        .admin-approval {
            padding: 12px;
            background: #f0fdf4;
            border-left: 3px solid #16a34a;
            border-radius: 6px;
            margin: 16px 0;
        }

        .admin-approval-label {
            font-size: 12px;
            font-weight: 600;
            color: #166534;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            gap: 6px;
        }

        .admin-approval-label i {
            width: 14px;
            text-align: center;
        }

        .admin-approval-text {
            font-size: 13px;
            color: #15803d;
            line-height: 1.5;
        }

        .report-actions {
            display: flex;
            gap: 12px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            padding: 10px 16px;
            border-radius: 6px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-primary {
            background: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background: #1d4ed8;
        }

        .btn-secondary {
            background: #e5e7eb;
            color: #374151;
        }

        .btn-secondary:hover {
            background: #d1d5db;
        }

        .empty-state {
            text-align: center;
            padding: 60px 20px;
        }

        .empty-icon {
            font-size: 48px;
            margin-bottom: 16px;
            color: #2563eb;
        }

        .empty-icon i {
            color: #2563eb;
        }

        .empty-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .empty-text {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        .empty-action {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .report-image {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-top: 12px;
        }

        @media (max-width: 768px) {
            .report-info {
                grid-template-columns: 1fr;
            }

            .report-header {
                flex-direction: column;
                gap: 12px;
            }

            .report-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }
    </style>

    <div class="reports-container">
        <h1 class="reports-title">My Reports</h1>

        @if ($reports->isEmpty())
            <div class="empty-state">
                <div class="empty-icon"><i class="fa fa-file-text"></i></div>
                <h2 class="empty-title">No Reports Yet</h2>
                <p class="empty-text">You haven't submitted any reports yet. Start by reporting a lost or found item.</p>
                <div class="empty-action">
                    <a href="{{ route('report.lost') }}" class="btn btn-primary">Report Lost Item</a>
                    <a href="{{ route('report.found') }}" class="btn btn-secondary">Report Found Item</a>
                </div>
            </div>
        @else
            @foreach ($reports as $report)
                <div class="report-card {{ $report->type }}">
                    <!-- Header with Title and Status -->
                    <div class="report-header">
                        <h2 class="report-title">{{ $report->name }}</h2>
                        <span class="report-status status-{{ strtolower($report->status) }}">
                            {{ ucfirst($report->status) }}
                        </span>
                    </div>

                    <!-- Date Submitted -->
                    <div class="report-date">
                        Submitted {{ $report->date_reported->format('M d, Y') }} at {{ $report->date_reported->format('h:i A') }}
                    </div>

                    <!-- Report Information -->
                    <div class="report-info">
                        <div class="info-item">
                            <div class="info-label"><i class="fa fa-map-marker"></i> Location</div>
                            <div class="info-value">{{ $report->location }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label"><i class="fa fa-tag"></i> Category</div>
                            <div class="info-value">{{ $report->category->name ?? 'N/A' }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label"><i class="fa fa-file"></i> Type</div>
                            <div class="info-value">{{ ucfirst($report->type) }}</div>
                        </div>
                        <div class="info-item">
                            <div class="info-label"><i class="fa fa-info-circle"></i> Status</div>
                            <div class="info-value">{{ ucfirst($report->status) }}</div>
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="report-description">
                        <div class="report-description-label">Description</div>
                        <div class="report-description-text">{{ $report->description }}</div>
                        @if ($report->image)
                            <img src="{{ asset('storage/' . $report->image) }}" alt="{{ $report->name }}" class="report-image">
                        @endif
                    </div>

                    <!-- Admin Feedback/Messages -->
                    @if ($report->status === 'Approved')
                        <div class="admin-approval">
                            <div class="admin-approval-label"><i class="fa fa-check-circle"></i> Claim approved by Admin</div>
                            <div class="admin-approval-text">Your report has been approved and verified.</div>
                        </div>
                    @elseif ($report->status === 'Rejected')
                        <div class="admin-action">
                            <div class="admin-action-label"><i class="fa fa-times-circle"></i> Report rejected by Admin</div>
                            <div class="admin-action-text">Your report does not meet the requirements. Please review and resubmit with better details or proof.</div>
                        </div>
                    @else
                        <div class="admin-feedback">
                            <div class="admin-feedback-label"><i class="fa fa-spinner"></i> Admin is reviewing your report</div>
                            <div class="admin-feedback-text">Your report is under review. Please wait for admin feedback.</div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="report-actions">
                        @if ($report->status === 'Rejected')
                            <button class="btn btn-primary">Re-submit with better proof</button>
                        @endif
                        <a href="{{ route('home') }}" class="btn btn-secondary">Back to Home</a>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>
