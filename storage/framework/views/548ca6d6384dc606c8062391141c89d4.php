<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'My Reports']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'My Reports']); ?>
    <style>
        .reports-container {
            max-width: 900px;
            margin: 40px auto;
            padding: 0 16px;
            margin: 100px auto;
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
            margin-bottom: 12px;
            gap: 16px;
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
            margin-top: 4px;
        }

        .report-info {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            gap: 12px;
            margin-top: 12px;
        }

        .info-item {
            font-size: 13px;
        }

        .info-label {
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 2px;
        }

        .info-value {
            color: #1f2937;
            font-size: 14px;
        }

        .report-description {
            display: none;
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
            margin-top: 12px;
        }

        .btn {
            padding: 8px 16px;
            border-radius: 6px;
            border: none;
            font-size: 13px;
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

        .btn-danger {
            background: #ef4444;
            color: white;
        }

        .btn-danger:hover {
            background: #dc2626;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            align-items: center;
            justify-content: center;
            overflow-y: auto;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 12px;
            max-width: 600px;
            width: 90%;
            max-height: 90vh;
            overflow-y: auto;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            margin: 20px auto;
        }

        .modal-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .modal-header h2 {
            font-size: 20px;
            font-weight: 600;
            color: #1f2937;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #6b7280;
            cursor: pointer;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #1f2937;
        }

        .modal-body {
            padding: 20px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 6px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .modal-footer {
            padding: 16px 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 12px;
            justify-content: flex-end;
        }

        .btn-cancel {
            padding: 10px 16px;
            background-color: #f3f4f6;
            color: #1f2937;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-cancel:hover {
            background-color: #e5e7eb;
        }

        .btn-save {
            padding: 10px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-save:hover {
            background-color: #1d4ed8;
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

        .filter-section {
            display: flex;
            gap: 12px;
            margin-bottom: 30px;
            flex-wrap: wrap;
        }

        .filter-button {
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background: white;
            color: #374151;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }

        .filter-button:hover {
            background: #f3f4f6;
            border-color: #9ca3af;
        }

        .filter-button.active {
            background: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        @media (max-width: 768px) {
            .filter-section {
                flex-direction: row;
                gap: 8px;
            }

            .filter-button {
                padding: 8px 12px;
                font-size: 12px;
            }

            .report-info {
                flex-direction: column;
                align-items: flex-start;
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

        <?php if(session('success')): ?>
            <div style="background-color: #d1fae5; color: #065f46; padding: 16px; border-radius: 6px; margin-bottom: 20px; border-left: 4px solid #10b981;">
                <div style="display: flex; align-items: center; gap: 8px;">
                    <i class="fa fa-check-circle" style="color: #10b981;"></i>
                    <span><?php echo e(session('success')); ?></span>
                </div>
            </div>
        <?php endif; ?>

        <?php if(!$reports->isEmpty()): ?>
            <!-- Filter Section -->
            <div class="filter-section">
                <button class="filter-button active" onclick="filterReports('all')">All (<?php echo e($reports->count()); ?>)</button>
                <button class="filter-button" onclick="filterReports('Found')">Found (<?php echo e($reports->where('type', 'Found')->count()); ?>)</button>
                <button class="filter-button" onclick="filterReports('Lost')">Lost (<?php echo e($reports->where('type', 'Lost')->count()); ?>)</button>
            </div>
        <?php endif; ?>

        <?php if($reports->isEmpty()): ?>
            <div class="empty-state">
                <div class="empty-icon"><i class="fa fa-file-text"></i></div>
                <h2 class="empty-title">No Reports Yet</h2>
                <p class="empty-text">You haven't submitted any reports yet. Start by reporting a lost or found item.</p>
                <div class="empty-action">
                    <a href="<?php echo e(route('report.lost')); ?>" class="btn btn-primary">Report Lost Item</a>
                    <a href="<?php echo e(route('report.found')); ?>" class="btn btn-secondary">Report Found Item</a>
                </div>
            </div>
        <?php else: ?>
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="report-card <?php echo e(strtolower($report->type)); ?>" data-report-type="<?php echo e($report->type); ?>">
                    <!-- Header with Title and Status -->
                    <div class="report-header">
                        <div>
                            <h2 class="report-title"><?php echo e($report->name); ?></h2>
                            <div class="report-date">Submitted <?php echo e($report->created_at->format('M d, Y \a\t g:i A')); ?></div>
                        </div>
                        <?php
                            $displayStatus = $report->getDisplayStatus();
                            $statusClass = $report->isResolved() ? 'approved' : strtolower($displayStatus);
                        ?>
                        <span class="report-status status-<?php echo e($statusClass); ?>">
                            <?php echo e(ucfirst($displayStatus)); ?>

                        </span>
                    </div>

                    <!-- Approval Message Card -->
                    <?php if($report->getApprovedReturn()): ?>
                        <div class="admin-approval">
                            <div class="admin-approval-label">
                                <i class="fa fa-check"></i> Item Returned
                            </div>
                            <div class="admin-approval-text">
                                Someone returned this item, and the admin has approved the return.
                            </div>
                        </div>
                    <?php elseif($report->getApprovedClaim()): ?>
                        <div class="admin-approval">
                            <div class="admin-approval-label">
                                <i class="fa fa-check"></i> Item Claimed
                            </div>
                            <div class="admin-approval-text">
                                Someone claimed this item, and the admin has approved the claim.
                            </div>
                        </div>
                    <?php endif; ?>

                    <!-- Report Information - Minimal -->
                    <div class="report-info">
                        <button class="btn btn-primary" onclick="openReportDetailModal(<?php echo e($report->id); ?>)">View Details</button>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </div>

    <!-- Report Detail Modal -->
    <div id="reportDetailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 id="detailModalTitle">Report Details</h2>
                <button class="modal-close" onclick="closeReportDetailModal()">×</button>
            </div>
            <div class="modal-body" id="detailModalBody">
                <!-- Content will be loaded here -->
            </div>
            <div class="modal-footer" id="detailModalFooter">
                <!-- Footer buttons will be dynamically added here -->
            </div>
        </div>
    </div>
    <div id="editModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Report</h2>
                <button class="modal-close" onclick="closeEditModal()">×</button>
            </div>
            <form id="editForm" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Item Name</label>
                        <input type="text" id="editName" name="name" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category</label>
                        <select id="editCategory" name="category_id" class="form-select" required>
                            <option value="">Select a category</option>
                            <?php $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>"><?php echo e($category->name); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Found Location</label>
                        <input type="text" id="editLocation" name="location" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Surrender Location</label>
                        <input type="text" id="editSurrenderLocation" name="surrender_location" class="form-input">
                    </div>
                    <div class="form-group">
                        <label class="form-label">Description</label>
                        <textarea id="editDescription" name="description" class="form-textarea" required></textarea>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Photo (optional)</label>
                        <input type="file" id="editPhoto" name="photo" class="form-input" accept="image/*">
                        <small style="color: #6b7280; margin-top: 4px; display: block;">Leave empty to keep current image</small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-cancel" onclick="closeEditModal()">Cancel</button>
                    <button type="submit" class="btn-save">Save Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Get categories for the modal
        const categoriesData = {
            <?php $__currentLoopData = $categories ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($category->id); ?>: "<?php echo e($category->name); ?>",
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        };

        // Track the current detail modal report ID
        let currentDetailReportId = null;

        // Get reports data for the modal
        const reportsData = {
            <?php $__currentLoopData = $reports; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $report): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($report->id); ?>: {
                    name: "<?php echo e($report->name); ?>",
                    category_id: <?php echo e($report->category_id); ?>,
                    category_name: "<?php echo e($report->category->name ?? 'N/A'); ?>",
                    location: "<?php echo e($report->type === 'Found' ? $report->found_location : $report->lost_location); ?>",
                    surrender_location: "<?php echo e($report->surrender_location ?? ''); ?>",
                    description: "<?php echo e(addslashes($report->description)); ?>",
                    type: "<?php echo e($report->type); ?>",
                    status: "<?php echo e($report->status); ?>",
                    image: "<?php echo e($report->image ? asset('storage/' . $report->image) : ''); ?>",
                    created_at: "<?php echo e($report->created_at->format('M d, Y \\a\\t g:i A')); ?>",
                    date_reported: "<?php echo e($report->created_at->format('M d, Y \\a\\t g:i A')); ?>",
                    date_found: "<?php echo e($report->date_found ? $report->date_found->format('M d, Y') : ''); ?>",
                    date_lost: "<?php echo e($report->date_lost ? $report->date_lost->format('M d, Y') : ''); ?>",
                    approved_claim: <?php echo json_encode($report->getApprovedClaim() ? ['user_name' => $report->getApprovedClaim()->user->name, 'email' => $report->getApprovedClaim()->contact_email, 'phone' => $report->getApprovedClaim()->contact_number] : null); ?>,
                    approved_return: <?php echo json_encode($report->getApprovedReturn() ? ['user_name' => $report->getApprovedReturn()->user->name, 'email' => $report->getApprovedReturn()->email, 'phone' => $report->getApprovedReturn()->phone_number] : null); ?>

                },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        };

        function openEditModal(reportId) {
            const report = reportsData[reportId];
            if (!report) {
                console.error('Report not found:', reportId);
                return;
            }

            // Populate form with report data
            document.getElementById('editName').value = report.name;
            document.getElementById('editCategory').value = report.category_id;
            document.getElementById('editLocation').value = report.location;
            document.getElementById('editSurrenderLocation').value = report.surrender_location;
            document.getElementById('editDescription').value = report.description;

            // Update form action
            const form = document.getElementById('editForm');
            form.action = "<?php echo e(url('/reports')); ?>/" + reportId;

            // Show modal
            document.getElementById('editModal').classList.add('active');
        }

        function closeEditModal() {
            document.getElementById('editModal').classList.remove('active');
        }

        function confirmDelete(reportId) {
            if (confirm('Are you sure you want to delete this report? This action cannot be undone.')) {
                deleteReport(reportId);
            }
        }

        function deleteReport(reportId) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = "<?php echo e(url('/reports')); ?>/" + reportId;

            const csrfToken = document.querySelector('meta[name="csrf-token"]');
            if (csrfToken) {
                const input = document.createElement('input');
                input.type = 'hidden';
                input.name = '_token';
                input.value = csrfToken.getAttribute('content');
                form.appendChild(input);
            }

            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'DELETE';
            form.appendChild(methodInput);

            document.body.appendChild(form);
            form.submit();
        }

        function openReportDetailModal(reportId) {
            currentDetailReportId = reportId;
            const report = reportsData[reportId];
            if (!report) {
                console.error('Report not found:', reportId);
                return;
            }

            const modal = document.getElementById('reportDetailModal');
            const modalTitle = document.getElementById('detailModalTitle');
            const modalBody = document.getElementById('detailModalBody');
            const modalFooter = document.getElementById('detailModalFooter');

            modalTitle.textContent = `${report.name} - Report Details`;

            let content = `
                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Item Name</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.name}</div>
                </div>

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Report Type</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.type.charAt(0).toUpperCase() + report.type.slice(1)}</div>
                </div>

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Status</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.approved_return ? 'Returned' : (report.approved_claim ? 'Claimed' : report.status.charAt(0).toUpperCase() + report.status.slice(1))}</div>
                </div>

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">${report.type === 'Lost' ? 'Date Lost' : 'Date Found'}</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.type === 'Lost' ? report.date_lost : report.date_found}</div>
                </div>

                <div style="border-top: 1px solid #e5e7eb; margin: 16px 0;"></div>

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Category</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.category_name}</div>
                </div>

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">${report.type === 'Lost' ? 'Last Seen Location' : 'Found Location'}</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.location}</div>
                </div>

                ${report.type === 'Found' ? `
                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Surrender Location</div>
                    <div style="color: #1f2937; font-size: 14px; font-weight: 500;">${report.surrender_location || 'Not specified'}</div>
                </div>
                ` : ''}

                <div style="margin-bottom: 16px;">
                    <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 4px; font-size: 12px;">Description</div>
                    <div style="color: #1f2937; font-size: 14px; line-height: 1.5; padding: 12px; background-color: #f9fafb; border-radius: 6px;">${report.description}</div>
                </div>
            `;

            // Show claimant/returner information if available
            if (report.approved_return) {
                content += `
                    <div style="border-top: 1px solid #e5e7eb; margin: 16px 0;"></div>
                    <div style="padding: 12px; background-color: #f0fdf4; border-left: 3px solid #16a34a; border-radius: 6px; margin-bottom: 16px;">
                        <div style="font-weight: 600; color: #166534; margin-bottom: 12px; font-size: 12px;">RETURNER INFORMATION</div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Name</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_return.user_name}</div>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Email</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_return.email}</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Phone Number</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_return.phone}</div>
                        </div>
                    </div>
                `;
            } else if (report.approved_claim) {
                content += `
                    <div style="border-top: 1px solid #e5e7eb; margin: 16px 0;"></div>
                    <div style="padding: 12px; background-color: #f0fdf4; border-left: 3px solid #16a34a; border-radius: 6px; margin-bottom: 16px;">
                        <div style="font-weight: 600; color: #166534; margin-bottom: 12px; font-size: 12px;">CLAIMANT INFORMATION</div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Name</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_claim.user_name}</div>
                        </div>
                        <div style="margin-bottom: 10px;">
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Email</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_claim.email}</div>
                        </div>
                        <div>
                            <div style="font-weight: 600; color: #6b7280; font-size: 11px;">Phone Number</div>
                            <div style="color: #1f2937; font-size: 14px;">${report.approved_claim.phone}</div>
                        </div>
                    </div>
                `;
            }

            if (report.image) {
                content += `
                    <div style="margin-bottom: 16px;">
                        <div style="font-weight: 600; color: #6b7280; text-transform: uppercase; margin-bottom: 8px; font-size: 12px;">Photo</div>
                        <img src="${report.image}" alt="${report.name}" style="max-width: 100%; height: auto; border-radius: 6px;">
                    </div>
                `;
            }

            modalBody.innerHTML = content;

            // Build footer based on report status
            const isResolved = report.approved_claim || report.approved_return;
            let footerHTML = `<button type="button" class="btn-cancel" onclick="closeReportDetailModal()">Close</button>`;
            
            if (!isResolved) {
                footerHTML += `<button type="button" class="btn btn-primary" onclick="openEditFromDetail()">Edit</button>`;
                footerHTML += `<button type="button" class="btn btn-danger" onclick="deleteFromDetail()">Delete</button>`;
            }
            
            modalFooter.innerHTML = footerHTML;
            modal.classList.add('active');
        }

        function closeReportDetailModal() {
            document.getElementById('reportDetailModal').classList.remove('active');
        }

        function openEditFromDetail() {
            if (currentDetailReportId) {
                openEditModal(currentDetailReportId);
            }
        }

        function deleteFromDetail() {
            if (currentDetailReportId) {
                confirmDelete(currentDetailReportId);
            }
        }

        function filterReports(type) {
            // Update active button
            const buttons = document.querySelectorAll('.filter-button');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            // Filter reports
            const cards = document.querySelectorAll('.report-card');
            cards.forEach(card => {
                if (type === 'all') {
                    card.style.display = 'block';
                } else {
                    const reportType = card.getAttribute('data-report-type');
                    card.style.display = reportType.toLowerCase() === type.toLowerCase() ? 'block' : 'none';
                }
            });
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('editModal');
            if (event.target === modal) {
                closeEditModal();
            }
        });
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $attributes = $__attributesOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__attributesOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal23a33f287873b564aaf305a1526eada4)): ?>
<?php $component = $__componentOriginal23a33f287873b564aaf305a1526eada4; ?>
<?php unset($__componentOriginal23a33f287873b564aaf305a1526eada4); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/my_reports.blade.php ENDPATH**/ ?>