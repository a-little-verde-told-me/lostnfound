<x-admin-layout :title="'Reports'">
    <style>
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 32px;
        }

        .reports-container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .report-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .report-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }

        .report-header {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 16px;
        }

        .report-icon {
            font-size: 32px;
            color: #2563eb;
            width: 48px;
            height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eff6ff;
            border-radius: 8px;
        }

        .report-info {
            flex: 1;
        }

        .report-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .report-description {
            font-size: 14px;
            color: #6b7280;
        }

        .report-filters {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 16px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 16px;
        }

        .filter-group {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .filter-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
        }

        .filter-input,
        .filter-select {
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
            color: #1f2937;
        }

        .filter-input:focus,
        .filter-select:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .export-buttons {
            display: flex;
            gap: 12px;
            flex-wrap: wrap;
        }

        .export-btn {
            padding: 10px 16px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .export-btn-pdf {
            background-color: #ef4444;
            color: white;
        }

        .export-btn-pdf:hover {
            background-color: #dc2626;
        }

        .export-btn-xlsx {
            background-color: #10b981;
            color: white;
        }

        .export-btn-xlsx:hover {
            background-color: #059669;
        }

        .export-btn-csv {
            background-color: #f59e0b;
            color: white;
        }

        .export-btn-csv:hover {
            background-color: #d97706;
        }

        .export-btn-json {
            background-color: #8b5cf6;
            color: white;
        }

        .export-btn-json:hover {
            background-color: #7c3aed;
        }

        .report-stats {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 16px;
            margin-top: 16px;
            padding-top: 16px;
            border-top: 1px solid #e5e7eb;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 24px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 12px;
            color: #6b7280;
            font-weight: 500;
        }

        .loading-message {
            text-align: center;
            padding: 16px;
            color: #6b7280;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .report-filters {
                grid-template-columns: 1fr;
            }

            .export-buttons {
                flex-direction: column;
            }

            .export-btn {
                width: 100%;
                justify-content: center;
            }
        }
    </style>

    <h1 class="page-title">Reports & Analytics</h1>

    <div class="reports-container">
        <!-- Lost & Found Items Report -->
        <div class="report-card">
            <div class="report-header">
                <div class="report-info">
                    <div class="report-title">Lost & Found Items Report</div>
                    <div class="report-description">Summary of all lost and found items with status breakdown</div>
                </div>
            </div>

            <div class="report-filters">
                <div class="filter-group">
                    <label class="filter-label">Report Type</label>
                    <select id="itemsReportType" class="filter-select">
                        <option value="all">All Items</option>
                        <option value="lost">Lost Items Only</option>
                        <option value="found">Found Items Only</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select id="itemsStatus" class="filter-select">
                        <option value="all">All Status</option>
                        <option value="active">Active</option>
                        <option value="claimed">Claimed</option>
                        <option value="returned">Returned</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">From Date</label>
                    <input type="date" id="itemsFromDate" class="filter-input">
                </div>
                <div class="filter-group">
                    <label class="filter-label">To Date</label>
                    <input type="date" id="itemsToDate" class="filter-input">
                </div>
            </div>

            <div class="export-buttons">
                <button class="export-btn export-btn-pdf" onclick="exportReport('items', 'pdf')">
                    <i class="fa fa-file-pdf"></i> Export PDF
                </button>
                <button class="export-btn export-btn-xlsx" onclick="exportReport('items', 'xlsx')">
                    <i class="fa fa-file-excel"></i> Export XLSX
                </button>
                <button class="export-btn export-btn-csv" onclick="exportReport('items', 'csv')">
                    <i class="fa fa-file-csv"></i> Export CSV
                </button>
                <button class="export-btn export-btn-json" onclick="exportReport('items', 'json')">
                    <i class="fa fa-code"></i> Export JSON
                </button>
            </div>

            <div class="report-stats" id="itemsStats">
                <div class="stat-item">
                    <div class="stat-value" id="totalItems">-</div>
                    <div class="stat-label">Total Items</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="activeItems">-</div>
                    <div class="stat-label">Active</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="claimedItems">-</div>
                    <div class="stat-label">Claimed</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="returnedItems">-</div>
                    <div class="stat-label">Returned</div>
                </div>
            </div>
        </div>

        <!-- Claims Report -->
        <div class="report-card">
            <div class="report-header">
                <div class="report-info">
                    <div class="report-title">Claims Report</div>
                    <div class="report-description">Detailed report of all claims with status and claimant information</div>
                </div>
            </div>

            <div class="report-filters">
                <div class="filter-group">
                    <label class="filter-label">Claim Status</label>
                    <select id="claimsStatus" class="filter-select">
                        <option value="all">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">From Date</label>
                    <input type="date" id="claimsFromDate" class="filter-input">
                </div>
                <div class="filter-group">
                    <label class="filter-label">To Date</label>
                    <input type="date" id="claimsToDate" class="filter-input">
                </div>
            </div>

            <div class="export-buttons">
                <button class="export-btn export-btn-pdf" onclick="exportReport('claims', 'pdf')">
                    <i class="fa fa-file-pdf"></i> Export PDF
                </button>
                <button class="export-btn export-btn-xlsx" onclick="exportReport('claims', 'xlsx')">
                    <i class="fa fa-file-excel"></i> Export XLSX
                </button>
                <button class="export-btn export-btn-csv" onclick="exportReport('claims', 'csv')">
                    <i class="fa fa-file-csv"></i> Export CSV
                </button>
                <button class="export-btn export-btn-json" onclick="exportReport('claims', 'json')">
                    <i class="fa fa-code"></i> Export JSON
                </button>
            </div>

            <div class="report-stats" id="claimsStats">
                <div class="stat-item">
                    <div class="stat-value" id="totalClaims">-</div>
                    <div class="stat-label">Total Claims</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="pendingClaims">-</div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="approvedClaims">-</div>
                    <div class="stat-label">Approved</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="rejectedClaims">-</div>
                    <div class="stat-label">Rejected</div>
                </div>
            </div>
        </div>

        <!-- Returns Report -->
        <div class="report-card">
            <div class="report-header">
                <div class="report-info">
                    <div class="report-title">Returns Report</div>
                    <div class="report-description">Comprehensive report of all item returns with status tracking</div>
                </div>
            </div>

            <div class="report-filters">
                <div class="filter-group">
                    <label class="filter-label">Return Status</label>
                    <select id="returnsStatus" class="filter-select">
                        <option value="all">All Status</option>
                        <option value="pending">Pending</option>
                        <option value="approved">Approved</option>
                        <option value="rejected">Rejected</option>
                    </select>
                </div>
                <div class="filter-group">
                    <label class="filter-label">From Date</label>
                    <input type="date" id="returnsFromDate" class="filter-input">
                </div>
                <div class="filter-group">
                    <label class="filter-label">To Date</label>
                    <input type="date" id="returnsToDate" class="filter-input">
                </div>
            </div>

            <div class="export-buttons">
                <button class="export-btn export-btn-pdf" onclick="exportReport('returns', 'pdf')">
                    <i class="fa fa-file-pdf"></i> Export PDF
                </button>
                <button class="export-btn export-btn-xlsx" onclick="exportReport('returns', 'xlsx')">
                    <i class="fa fa-file-excel"></i> Export XLSX
                </button>
                <button class="export-btn export-btn-csv" onclick="exportReport('returns', 'csv')">
                    <i class="fa fa-file-csv"></i> Export CSV
                </button>
                <button class="export-btn export-btn-json" onclick="exportReport('returns', 'json')">
                    <i class="fa fa-code"></i> Export JSON
                </button>
            </div>

            <div class="report-stats" id="returnsStats">
                <div class="stat-item">
                    <div class="stat-value" id="totalReturns">-</div>
                    <div class="stat-label">Total Returns</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="pendingReturns">-</div>
                    <div class="stat-label">Pending</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="approvedReturns">-</div>
                    <div class="stat-label">Approved</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="rejectedReturns">-</div>
                    <div class="stat-label">Rejected</div>
                </div>
            </div>
        </div>

        <!-- Users & Activity Report -->
        <div class="report-card">
            <div class="report-header">
                <div class="report-info">
                    <div class="report-title">Users & Activity Report</div>
                    <div class="report-description">User statistics and activity metrics</div>
                </div>
            </div>

            <div class="report-filters">
                <div class="filter-group">
                    <label class="filter-label">From Date</label>
                    <input type="date" id="usersFromDate" class="filter-input">
                </div>
                <div class="filter-group">
                    <label class="filter-label">To Date</label>
                    <input type="date" id="usersToDate" class="filter-input">
                </div>
            </div>

            <div class="export-buttons">
                <button class="export-btn export-btn-pdf" onclick="exportReport('users', 'pdf')">
                    <i class="fa fa-file-pdf"></i> Export PDF
                </button>
                <button class="export-btn export-btn-xlsx" onclick="exportReport('users', 'xlsx')">
                    <i class="fa fa-file-excel"></i> Export XLSX
                </button>
                <button class="export-btn export-btn-csv" onclick="exportReport('users', 'csv')">
                    <i class="fa fa-file-csv"></i> Export CSV
                </button>
                <button class="export-btn export-btn-json" onclick="exportReport('users', 'json')">
                    <i class="fa fa-code"></i> Export JSON
                </button>
            </div>

            <div class="report-stats" id="usersStats">
                <div class="stat-item">
                    <div class="stat-value" id="totalUsers">-</div>
                    <div class="stat-label">Total Users</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value" id="activeUsers">-</div>
                    <div class="stat-label">Active Users</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Load statistics on page load
        document.addEventListener('DOMContentLoaded', function() {
            loadStatistics();
        });

        function loadStatistics() {
            // Load items stats
            fetch('/api/reports/items-stats')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalItems').textContent = data.total;
                    document.getElementById('activeItems').textContent = data.active;
                    document.getElementById('claimedItems').textContent = data.claimed;
                    document.getElementById('returnedItems').textContent = data.returned;
                })
                .catch(error => console.error('Error loading items stats:', error));

            // Load claims stats
            fetch('/api/reports/claims-stats')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalClaims').textContent = data.total;
                    document.getElementById('pendingClaims').textContent = data.pending;
                    document.getElementById('approvedClaims').textContent = data.approved;
                    document.getElementById('rejectedClaims').textContent = data.rejected;
                })
                .catch(error => console.error('Error loading claims stats:', error));

            // Load returns stats
            fetch('/api/reports/returns-stats')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalReturns').textContent = data.total;
                    document.getElementById('pendingReturns').textContent = data.pending;
                    document.getElementById('approvedReturns').textContent = data.approved;
                    document.getElementById('rejectedReturns').textContent = data.rejected;
                })
                .catch(error => console.error('Error loading returns stats:', error));

            // Load users stats
            fetch('/api/reports/users-stats')
                .then(response => response.json())
                .then(data => {
                    document.getElementById('totalUsers').textContent = data.total;
                    document.getElementById('activeUsers').textContent = data.active;
                })
                .catch(error => console.error('Error loading users stats:', error));
        }

        function exportReport(reportType, format) {
            const params = new URLSearchParams();
            
            // Add report-specific filters
            if (reportType === 'items') {
                params.append('type', document.getElementById('itemsReportType').value);
                params.append('status', document.getElementById('itemsStatus').value);
                params.append('from_date', document.getElementById('itemsFromDate').value);
                params.append('to_date', document.getElementById('itemsToDate').value);
            } else if (reportType === 'claims') {
                params.append('status', document.getElementById('claimsStatus').value);
                params.append('from_date', document.getElementById('claimsFromDate').value);
                params.append('to_date', document.getElementById('claimsToDate').value);
            } else if (reportType === 'returns') {
                params.append('status', document.getElementById('returnsStatus').value);
                params.append('from_date', document.getElementById('returnsFromDate').value);
                params.append('to_date', document.getElementById('returnsToDate').value);
            } else if (reportType === 'users') {
                params.append('from_date', document.getElementById('usersFromDate').value);
                params.append('to_date', document.getElementById('usersToDate').value);
            }

            params.append('format', format);

            // Create download URL
            const url = `/api/reports/${reportType}/export?${params.toString()}`;
            
            // Fetch and download the file
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        return response.text().then(text => {
                            throw new Error(`HTTP ${response.status}: ${text}`);
                        });
                    }
                    return response.blob();
                })
                .then(blob => {
                    // Create a temporary blob URL and download
                    const blobUrl = window.URL.createObjectURL(blob);
                    const link = document.createElement('a');
                    link.href = blobUrl;
                    link.download = `${reportType}_report_${new Date().toISOString().split('T')[0]}.${format === 'xlsx' ? 'xlsx' : (format === 'json' ? 'json' : (format === 'csv' ? 'csv' : 'html'))}`;
                    document.body.appendChild(link);
                    link.click();
                    document.body.removeChild(link);
                    window.URL.revokeObjectURL(blobUrl);
                })
                .catch(error => {
                    console.error('Error downloading report:', error);
                    alert(`Failed to download report:\n${error.message}`);
                });
        }
    </script>
</x-admin-layout>
