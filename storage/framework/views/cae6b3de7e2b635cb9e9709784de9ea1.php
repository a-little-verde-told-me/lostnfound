<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'My History']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'My History']); ?>
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
            display: none;
            align-items: center;
            gap: 16px;
            margin-left: 32px;
            border-left: 1px solid #e5e7eb;
            padding-left: 32px;
        }

        @media (min-width: 768px) {
            .navbar-right {
                display: flex;
            }
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
            display: flex;
            align-items: center;
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

        .view-button {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 13px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-left: auto;
        }

        .view-button:hover {
            background-color: #1d4ed8;
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
            display: none;
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
                flex-direction: column;
                align-items: flex-start;
            }

            .view-button {
                margin-left: 0;
                width: 100%;
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

        /* Button for reporter info */
        .btn-view-reporter {
            display: none;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 2000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.2s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        .modal.show {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .modal-content {
            background: white;
            padding: 32px;
            border-radius: 12px;
            width: 90%;
            max-width: 500px;
            max-height: 85vh;
            overflow-y: auto;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.3s;
        }

        @keyframes slideUp {
            from {
                transform: translateY(20px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-title {
            font-size: 20px;
            font-weight: 700;
            color: #1f2937;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 24px;
            color: #6b7280;
            cursor: pointer;
            padding: 0;
            width: 32px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #1f2937;
        }

        .modal-body {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }

        .modal-info-item {
            display: flex;
            flex-direction: column;
        }

        .modal-info-label {
            font-size: 12px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 8px;
            letter-spacing: 0.5px;
        }

        .modal-info-value {
            font-size: 15px;
            font-weight: 500;
            color: #1f2937;
        }

        .modal-info-value a {
            color: #2563eb;
            text-decoration: none;
            transition: color 0.2s;
        }

        .modal-info-value a:hover {
            color: #1d4ed8;
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1><strong>My History</strong></h1>
            <p>View all your claims and item returns</p>
        </div>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <?php if(session('error')): ?>
            <div class="alert alert-error">
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        <!-- Filter Section -->
        <div class="filter-section">
            <a href="<?php echo e(route('history.index', ['filter' => 'all'])); ?>" class="filter-button <?php echo e($filter === 'all' ? 'active' : ''); ?>">
                All (<?php echo e($history->count()); ?>)
            </a>
            <a href="<?php echo e(route('history.index', ['filter' => 'claims'])); ?>" class="filter-button <?php echo e($filter === 'claims' ? 'active' : ''); ?>">
                Claims (<?php echo e($claims->count()); ?>)
            </a>
            <a href="<?php echo e(route('history.index', ['filter' => 'returns'])); ?>" class="filter-button <?php echo e($filter === 'returns' ? 'active' : ''); ?>">
                Returns (<?php echo e($returns->count()); ?>)
            </a>
        </div>

        <?php if($history->isEmpty()): ?>
            <div class="empty-state">
                <div class="empty-state-icon">
                    <i class="fa fa-history"></i>
                </div>
                <h2>No history yet</h2>
                <p>You haven't submitted any claims or returns yet.</p>
                <a href="<?php echo e(route('home')); ?>#browse" class="btn btn-primary">Browse items</a>
            </div>
        <?php else: ?>
            <div class="history-list">
                <?php $__currentLoopData = $history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($item->type === 'claim'): ?>
                        <div class="history-card claim-card">
                            <div class="history-header">
                                <div>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <div class="history-title"><?php echo e($item->item?->name ?? 'Item'); ?></div>
                                        <span class="type-badge type-claim">Claim</span>
                                    </div>
                                    <div class="history-date">Submitted <?php echo e($item->date->format('M d, Y \a\t g:i A')); ?></div>
                                </div>
                                <span class="claim-status status-<?php echo e(strtolower($item->status)); ?>">
                                    <?php echo e(ucfirst($item->status)); ?>

                                </span>
                            </div>

                            <div class="history-info">
                                <button class="view-button" onclick="openDetailModal(<?php echo e($item->id); ?>, 'claim')">View Details</button>
                            </div>
                            
                            <?php if($item->status === 'approved'): ?>
                                <div class="claim-feedback approved">
                                    <div class="claim-feedback-label">Claim approved by Admin</div>
                                    <div class="claim-feedback-text">
                                        Pick up your item at: <?php echo e($item->item?->surrender_location ?? 'Guard post, main entrance'); ?>

                                    </div>
                                </div>
                            <?php elseif($item->status === 'rejected'): ?>
                                <div class="claim-feedback">
                                    <div class="claim-feedback-label">Claim rejected by Admin</div>
                                    <div class="claim-feedback-text">
                                        Reason: <?php echo e($item->admin_feedback ?? 'Insufficient proof of ownership. Please provide more details.'); ?>

                                    </div>
                                </div>
                                <div class="history-actions" style="display: flex;">
                                    <a href="<?php echo e(route('claim.edit', $item->id)); ?>" class="btn-small primary">Re-submit with better proof</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>
                        <div class="history-card return-card">
                            <div class="history-header">
                                <div>
                                    <div style="display: flex; gap: 8px; align-items: center;">
                                        <div class="history-title"><?php echo e($item->item?->name ?? 'Item'); ?></div>
                                        <span class="type-badge type-return">Return</span>
                                    </div>
                                    <div class="history-date">Submitted <?php echo e($item->date->format('M d, Y \a\t g:i A')); ?></div>
                                </div>
                                <span class="claim-status status-<?php echo e(strtolower($item->status)); ?>">
                                    <?php echo e(ucfirst($item->status)); ?>

                                </span>
                            </div>

                            <div class="history-info">
                                <button class="view-button" onclick="openDetailModal(<?php echo e($item->id); ?>, 'return')">View Details</button>
                            </div>
                            
                            <?php if($item->status === 'approved'): ?>
                                <div class="claim-feedback approved">
                                    <div class="claim-feedback-label">✓ Return approved by Admin</div>
                                    <div class="claim-feedback-text">
                                        Your return has been approved and processed.
                                    </div>
                                </div>
                            <?php elseif($item->status === 'rejected'): ?>
                                <div class="claim-feedback">
                                    <div class="claim-feedback-label">✗ Return rejected by Admin</div>
                                    <div class="claim-feedback-text">
                                        Your return submission could not be processed. Please contact support for more information.
                                    </div>
                                </div>
                                <div class="history-actions" style="display: flex;">
                                    <a href="<?php echo e(route('return.edit', $item->id)); ?>" class="btn-small primary">Re-submit Return</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title" id="modalTitle">Claim Details</h2>
                <button class="modal-close" onclick="closeDetailModal()">×</button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        let historyData = <?php echo json_encode($history, 15, 512) ?>;

        function openDetailModal(itemId, type) {
            // Find the item in history
            const item = historyData.find(h => h.id == itemId);
            
            if (!item) {
                console.error('Item not found');
                return;
            }

            const modal = document.getElementById('detailModal');
            const modalTitle = document.getElementById('modalTitle');
            const modalBody = document.getElementById('modalBody');
            
            const itemType = type === 'claim' ? 'Claim' : 'Return';
            modalTitle.textContent = `${itemType} Details`;
            
            // Build the modal content
            let content = `
                <div class="modal-info-item">
                    <div class="modal-info-label">Item Name</div>
                    <div class="modal-info-value">${item.item?.name || 'N/A'}</div>
                </div>
                <div class="modal-info-item">
                    <div class="modal-info-label">Item Type</div>
                    <div class="modal-info-value">${item.item?.type ? item.item.type.charAt(0).toUpperCase() + item.item.type.slice(1) : 'N/A'}</div>
                </div>
                <div class="modal-info-item">
                    <div class="modal-info-label">Status</div>
                    <div class="modal-info-value">${item.status.charAt(0).toUpperCase() + item.status.slice(1)}</div>
                </div>
                <div class="modal-info-item">
                    <div class="modal-info-label">Submitted Date</div>
                    <div class="modal-info-value">${new Date(item.date).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric', hour: '2-digit', minute: '2-digit'})}</div>
                </div>
                </div>
            `;

            // Only show reporter information if the claim/return is approved
            if (item.status === 'approved' && item.item?.user) {
                content += `
                    <div style="border-top: 1px solid #e5e7eb; margin: 16px 0;"></div>
                    
                    <div class="modal-info-item">
                        <div class="modal-info-label">Reporter Name</div>
                        <div class="modal-info-value">${item.item.user.name}</div>
                    </div>
                    <div class="modal-info-item">
                        <div class="modal-info-label">Reporter Email</div>
                        <div class="modal-info-value">
                            <a href="mailto:${item.item.user.email}">${item.item.user.email}</a>
                        </div>
                    </div>
                    <div class="modal-info-item">
                        <div class="modal-info-label">Reporter Phone</div>
                        <div class="modal-info-value">
                            <a href="tel:${item.item.user.phone_number}">${item.item.user.phone_number}</a>
                        </div>
                    </div>
                    <div class="modal-info-item">
                        <div class="modal-info-label">Item Location</div>
                        <div class="modal-info-value">${item.item?.type === 'Found' ? (item.item?.found_location || 'Not specified') : (item.item?.lost_location || 'Not specified')}</div>
                    </div>
                `;
            }

            modalBody.innerHTML = content;
            modal.classList.add('show');
            document.body.style.overflow = 'hidden';
        }

        function closeDetailModal() {
            const modal = document.getElementById('detailModal');
            modal.classList.remove('show');
            document.body.style.overflow = 'auto';
        }

        // Close modal when clicking outside of it
        window.addEventListener('click', function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target === modal) {
                closeDetailModal();
            }
        });

        // Close modal with Escape key
        window.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeDetailModal();
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/my_history.blade.php ENDPATH**/ ?>