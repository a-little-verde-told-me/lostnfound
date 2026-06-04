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

        .detail-section {
            margin-bottom: 24px;
        }

        .detail-section h3 {
            font-size: 14px;
            font-weight: 600;
            color: #6b7280;
            text-transform: uppercase;
            margin-bottom: 12px;
        }

        .detail-row {
            display: flex;
            margin-bottom: 10px;
        }

        .detail-label {
            font-weight: 600;
            color: #1f2937;
            min-width: 120px;
        }

        .detail-value {
            color: #4b5563;
            flex: 1;
        }

        .modal-footer {
            padding: 16px 20px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 12px;
        }

        .btn-close-modal {
            flex: 1;
            padding: 10px;
            background-color: #f3f4f6;
            color: #1f2937;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-close-modal:hover {
            background-color: #e5e7eb;
        }

        .btn-view {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
        }

        .btn-view:hover {
            background-color: #1d4ed8;
        }

        /* Lightbox Styles */
        .lightbox {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            z-index: 2000;
            align-items: center;
            justify-content: center;
        }

        .lightbox.active {
            display: flex;
        }

        .lightbox-content {
            position: relative;
            max-width: 90vw;
            max-height: 90vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .lightbox-image {
            max-width: 100%;
            max-height: 80vh;
            object-fit: contain;
        }

        .lightbox-title {
            color: white;
            font-size: 16px;
            margin-top: 16px;
        }

        .lightbox-close {
            position: absolute;
            top: 20px;
            right: 30px;
            color: white;
            font-size: 40px;
            cursor: pointer;
            background: none;
            border: none;
            transition: color 0.2s;
        }

        .lightbox-close:hover {
            color: #ccc;
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="<?php echo e(route('home')); ?>" class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></a>
        <ul class="navbar-nav">
            <li><a href="<?php echo e(route('home')); ?>">Home</a></li>
            <li><a href="<?php echo e(route('home')); ?>#browse">Browse</a></li>
            <li><a href="<?php echo e(route('report.found')); ?>">Report Found</a></li>
            <li><a href="<?php echo e(route('report.lost')); ?>">Report Lost</a></li>
            <?php if(Auth::check()): ?>
                <li><a href="<?php echo e(route('claims.index')); ?>" class="active">My Claims</a></li>
            <?php endif; ?>
        </ul>
        <div class="navbar-right">
            <?php if(Auth::check()): ?>
                <span style="color: #6b7280; font-size: 14px;"><?php echo e(Auth::user()->name ?? 'User'); ?></span>
                <form action="<?php echo e(route('logout')); ?>" method="POST" style="display: inline;">
                    <?php echo csrf_field(); ?>
                    <button type="submit" style="background: none; border: none; color: #ef4444; cursor: pointer; font-weight: 500; font-size: 14px;">Logout</button>
                </form>
            <?php else: ?>
                <a href="<?php echo e(route('login')); ?>" class="nav-link-login">Login</a>
            <?php endif; ?>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>My claims</h1>
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

        <?php if($claims->isEmpty()): ?>
            <div class="empty-state">

                <div class="empty-state-icon">
                    <i class="fa-solid fa-clipboard-list"></i>
                </div>

                <h2>No claims yet</h2>
                <p>You haven't submitted any claims. Browse found items and claim them if they belong to you.</p>
                <a href="<?php echo e(route('home')); ?>#browse" class="btn btn-primary">Browse items</a>
            </div>
        <?php else: ?>
            <div class="claims-list">
                <?php $__currentLoopData = $claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="claim-card">
                        <div class="claim-header">
                            <div>
                                <div class="claim-title"><?php echo e($claim->item?->name ?? 'Item'); ?></div>
                                <div class="claim-date">Submitted <?php echo e($claim->date_claimed->format('M d, Y \a\t g:i A')); ?></div>
                            </div>
                            <div style="display: flex; gap: 12px; align-items: center;">
                                <span class="claim-status status-<?php echo e(strtolower($claim->status)); ?>">
                                    <?php echo e(ucfirst($claim->status)); ?>

                                </span>
                                <button class="btn-view" onclick="viewClaimDetails(<?php echo e($claim->id); ?>)">
                                    View
                                </button>
                            </div>
                        </div>

                        <!-- <div class="claim-proof">
                            <div class="claim-proof-label">Your proof</div>
                            <div class="claim-proof-text"><?php echo e($claim->proof_description); ?></div>
                        </div> -->

                        <?php if($claim->status === 'approved'): ?>
                            <div class="claim-feedback approved">
                                <div class="claim-feedback-label">✓ Claim approved by Admin</div>
                                <div class="claim-feedback-text">
                                    Pick up your item at: <?php echo e($claim->item?->location ?? 'Guard post, main entrance'); ?>

                                </div>
                            </div>
                        <?php elseif($claim->status === 'rejected'): ?>
                            <div class="claim-feedback">
                                <div class="claim-feedback-label">Claim rejected by Admin</div>
                                <div class="claim-feedback-text">
                                    Reason: <?php echo e($claim->admin_feedback ?? 'Insufficient proof of ownership. Please provide more details.'); ?>

                                </div>
                            </div>
                            <div class="claim-actions">
                                <a href="<?php echo e(route('claim.edit', $claim->id)); ?>" class="btn-small primary">Re-submit with better proof</a>
                            </div>
                        <?php elseif($claim->status === 'pending'): ?>
                            <div style="margin-top: 12px; padding: 12px; background-color: #fef3c7; border-left: 4px solid #d97706; border-radius: 4px;">
                                <div style="font-size: 12px; font-weight: 600; color: #92400e; text-transform: uppercase; margin-bottom: 4px;">Admin is reviewing your claim</div>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        <?php endif; ?>
    </div>

    <!-- Claim Details Modal -->
    <div id="claimDetailsModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Claim Details</h2>
                <button class="modal-close" onclick="closeClaimDetailsModal()">×</button>
            </div>
            <div class="modal-body">
                <div class="detail-section">
                    <h3>Item Information</h3>
                    <div class="detail-row">
                        <div class="detail-label">Item Name:</div>
                        <div class="detail-value" id="modalItemName">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Description:</div>
                        <div class="detail-value" id="modalItemDescription">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Location:</div>
                        <div class="detail-value" id="modalItemLocation">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Date Found:</div>
                        <div class="detail-value" id="modalItemDate">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Category:</div>
                        <div class="detail-value" id="modalItemCategory">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Item Image:</div>
                        <div class="detail-value">
                            <img id="modalItemImage" src="" alt="Item" style="display: none; max-width: 150px; height: auto; cursor: pointer; border-radius: 6px; border: 1px solid #e5e7eb;" onclick="openImageLightbox(this.src, 'Item Image')">
                            <span id="modalItemImagePlaceholder" style="color: #9ca3af;">-</span>
                        </div>
                    </div>
                </div>

                <div class="detail-section">
                    <h3>Your Claim</h3>
                    <div class="detail-row">
                        <div class="detail-label">Status:</div>
                        <div class="detail-value" id="modalClaimStatus">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Submitted:</div>
                        <div class="detail-value" id="modalClaimDate">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Email:</div>
                        <div class="detail-value" id="modalClaimEmail">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Phone:</div>
                        <div class="detail-value" id="modalClaimPhone">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Your Proof:</div>
                        <div class="detail-value" id="modalClaimProof">-</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Proof Image:</div>
                        <div class="detail-value">
                            <img id="modalProofImage" src="" alt="Proof" style="display: none; max-width: 150px; height: auto; cursor: pointer; border-radius: 6px; border: 1px solid #e5e7eb;" onclick="openImageLightbox(this.src, 'Proof Image')">
                            <span id="modalProofImagePlaceholder" style="color: #9ca3af;">-</span>
                        </div>
                    </div>
                    <div id="modalClaimFeedbackSection" style="margin-top: 16px; display: none;">
                        <div class="detail-label">Admin Feedback:</div>
                        <div class="detail-value" id="modalClaimFeedback" style="padding: 12px; background-color: #f3f4f6; border-radius: 6px; margin-top: 8px;">-</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn-close-modal" onclick="closeClaimDetailsModal()">Close</button>
            </div>
        </div>
    </div>

    <!-- Image Lightbox -->
    <div id="imageLightbox" class="lightbox">
        <div class="lightbox-content">
            <button class="lightbox-close" onclick="closeLightbox()">×</button>
            <img id="lightboxImage" src="" alt="Full size image" class="lightbox-image">
            <div class="lightbox-title" id="lightboxTitle"></div>
        </div>
    </div>

    <script>
        // Claim data storage (will be populated dynamically)
        const claimsData = {
            <?php $__currentLoopData = $claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e($claim->id); ?>: {
                    itemName: "<?php echo e($claim->item?->name ?? 'Item'); ?>",
                    itemDescription: "<?php echo e($claim->item?->description ?? '-'); ?>",
                    itemLocation: "<?php echo e($claim->item?->location ?? '-'); ?>",
                    itemDate: "<?php echo e($claim->item?->date_reported ? $claim->item->date_reported->format('M d, Y') : '-'); ?>",
                    itemCategory: "<?php echo e($claim->item?->category?->name ?? '-'); ?>",
                    itemImage: "<?php echo e($claim->item?->image ? asset('storage/' . $claim->item->image) : ''); ?>",
                    claimStatus: "<?php echo e(ucfirst($claim->status)); ?>",
                    claimDate: "<?php echo e($claim->date_claimed->format('M d, Y \a\t g:i A')); ?>",
                    claimEmail: "<?php echo e($claim->contact_email ?? '-'); ?>",
                    claimPhone: "<?php echo e($claim->contact_number ?? '-'); ?>",
                    claimProof: "<?php echo e($claim->proof_description ?? '-'); ?>",
                    proofImage: "<?php echo e($claim->image ? asset('storage/' . $claim->image) : ''); ?>",
                    adminFeedback: "<?php echo e($claim->admin_feedback ?? ''); ?>"
                },
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        };

        function viewClaimDetails(claimId) {
            const claim = claimsData[claimId];
            
            if (!claim) {
                console.error('Claim not found:', claimId);
                return;
            }

            // Populate modal with claim data
            document.getElementById('modalItemName').textContent = claim.itemName;
            document.getElementById('modalItemDescription').textContent = claim.itemDescription;
            document.getElementById('modalItemLocation').textContent = claim.itemLocation;
            document.getElementById('modalItemDate').textContent = claim.itemDate;
            document.getElementById('modalItemCategory').textContent = claim.itemCategory;
            document.getElementById('modalClaimStatus').textContent = claim.claimStatus;
            document.getElementById('modalClaimDate').textContent = claim.claimDate;
            document.getElementById('modalClaimEmail').textContent = claim.claimEmail;
            document.getElementById('modalClaimPhone').textContent = claim.claimPhone;
            document.getElementById('modalClaimProof').textContent = claim.claimProof;

            // Handle item image
            const itemImageEl = document.getElementById('modalItemImage');
            const itemImagePlaceholder = document.getElementById('modalItemImagePlaceholder');
            if (claim.itemImage) {
                itemImageEl.src = claim.itemImage;
                itemImageEl.style.display = 'block';
                itemImagePlaceholder.style.display = 'none';
            } else {
                itemImageEl.style.display = 'none';
                itemImagePlaceholder.style.display = 'inline';
            }

            // Handle proof image
            const proofImageEl = document.getElementById('modalProofImage');
            const proofImagePlaceholder = document.getElementById('modalProofImagePlaceholder');
            if (claim.proofImage) {
                proofImageEl.src = claim.proofImage;
                proofImageEl.style.display = 'block';
                proofImagePlaceholder.style.display = 'none';
            } else {
                proofImageEl.style.display = 'none';
                proofImagePlaceholder.style.display = 'inline';
            }

            // Show feedback section if admin feedback exists
            const feedbackSection = document.getElementById('modalClaimFeedbackSection');
            if (claim.adminFeedback) {
                feedbackSection.style.display = 'block';
                document.getElementById('modalClaimFeedback').textContent = claim.adminFeedback;
            } else {
                feedbackSection.style.display = 'none';
            }

            // Show modal
            document.getElementById('claimDetailsModal').classList.add('active');
        }

        function closeClaimDetailsModal() {
            document.getElementById('claimDetailsModal').classList.remove('active');
        }

        function openImageLightbox(imageSrc, imageTitle) {
            document.getElementById('lightboxImage').src = imageSrc;
            document.getElementById('lightboxTitle').textContent = imageTitle;
            document.getElementById('imageLightbox').classList.add('active');
        }

        function closeLightbox() {
            document.getElementById('imageLightbox').classList.remove('active');
        }

        // Close modals when clicking outside of them
        document.addEventListener('click', function(event) {
            const claimModal = document.getElementById('claimDetailsModal');
            const lightbox = document.getElementById('imageLightbox');
            
            if (event.target === claimModal) {
                closeClaimDetailsModal();
            }
            if (event.target === lightbox) {
                closeLightbox();
            }
        });

        // Close lightbox on ESC key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeLightbox();
            }
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/my_claims.blade.php ENDPATH**/ ?>