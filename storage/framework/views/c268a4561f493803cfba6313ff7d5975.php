<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Admin Dashboard']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Admin Dashboard')]); ?> 
    <style>
.dashboard-title {
    font-size: 32px;
    font-weight: bold;
    color: #2563eb;
    margin-bottom: 32px;
}
.stats-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 24px;
    margin-bottom: 32px;
}
.stat-card {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
    text-align: center;
    transition: all 0.3s ease;
}

.stat-card:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
}

.stat-number {
    font-size: 48px;
    font-weight: bold;
    color: #1f2937;
    margin-bottom: 8px;
}
.stat-label {
    font-size: 14px;
    color: #6b7280;
    font-weight: 500;
}
.content-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 24px;
    margin-bottom: 24px;
}

@media(max-width: 1024px) {
    .content-grid {
        grid-template-columns: 1fr;
    }
}

.content-card {
    background: white;
    border-radius: 12px;
    padding: 24px;
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
}
.card-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
    padding-bottom: 16px;
    border-bottom: 1px solid #e5e7eb;
}
.card-title {
    font-size: 16px;
    font-weight: 600;
    color: #1f2937;
}
.view-all-link {
    color: #2563eb;
    text-decoration: none;
    font-size: 14px;
    cursor: pointer;
    transition: color 0.2s;
    font-weight: 600;
}
.view-all-link:hover {
    color: #1d4ed8;
}
.claim-item {
    padding: 12px 0;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    justify-content: space-between;
    align-items: center;
    transition: background-color 0.2s;
}

.claim-item:hover {
    background-color: #f9fafb;
}

.claim-item:last-child {
    border-bottom: none;
}
.claim-info {
    flex: 1;
}
.claim-name {
    font-size: 14px;
    font-weight: 500;
    color: #1f2937;
    margin-bottom: 4px;
}
.claim-meta {
    font-size: 12px;
    color: #6b7280;
}
.claim-status {
    font-size: 11px;
    font-weight: 600;
    padding: 4px 12px;
    border-radius: 4px;
    text-transform: uppercase;
    white-space: nowrap;
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
.activity-item {
    padding: 12px 0;
    border-bottom: 1px solid #e5e7eb;
    display: flex;
    gap: 12px;
    transition: background-color 0.2s;
}

.activity-item:hover {
    background-color: #f9fafb;
}

.activity-item:last-child {
    border-bottom: none;
}
.activity-avatar {
    width: 40px;
    height: 40px;
    background-color: #dbeafe;
    border-radius: 50%;
    flex-shrink: 0;
}
.activity-content {
    flex: 1;
}
.activity-title {
    font-size: 13px;
    font-weight: 500;
    color: #1f2937;
    margin-bottom: 2px;
}
.activity-meta {
    font-size: 12px;
    color: #6b7280;
}
.activity-time {
    font-size: 11px;
    color: #9ca3af;
    white-space: nowrap;
}
.empty-state {
    text-align: center;
    padding: 24px;
    color: #9ca3af;
}
</style>
    <h1 class="dashboard-title">Admin Dashboard</h1>

    <!-- Stats Grid -->
    <div class="stats-grid">
        <div class="stat-card">
            <div class="stat-number"><?php echo e($activeFoundReports); ?></div>
            <div class="stat-label">Active Found Reports</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo e($activeLostReports); ?></div>
            <div class="stat-label">Active Lost Reports</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo e($claimPending); ?></div>
            <div class="stat-label">Claim Pending</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo e($returnPending); ?></div>
            <div class="stat-label">Return Pending</div>
        </div>
        <div class="stat-card">
            <div class="stat-number"><?php echo e($resolved); ?></div>
            <div class="stat-label">Resolved</div>
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Recent Claims -->
        <div class="content-card">
            <div class="card-header">
                <div class="card-title">Recent claims to review</div>
                <a href="<?php echo e(route('admin.claims')); ?>?status=pending" class="view-all-link">View all</a>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $pendingClaims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name"><?php echo e($claim->item->name ?? 'Item'); ?></div>
                        <div class="claim-meta">by <?php echo e($claim->user->name); ?> - <?php echo e($claim->date_claimed->format('M d')); ?></div>
                    </div>
                    <div class="claim-status status-pending"><?php echo e(ucfirst($claim->status)); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-state">
                    <p>No pending claims</p>
                </div>
            <?php endif; ?>
        </div>

        <!-- Recent Returns -->
        <div class="content-card">
            <div class="card-header">
                <div class="card-title">Recent returns to review</div>
                <a href="<?php echo e(route('admin.returns')); ?>?status=pending" class="view-all-link">View all</a>
            </div>

            <?php $__empty_1 = true; $__currentLoopData = $pendingReturns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $return): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="claim-item">
                    <div class="claim-info">
                        <div class="claim-name"><?php echo e($return->item->name ?? 'Item'); ?></div>
                        <div class="claim-meta">by <?php echo e($return->user->name); ?> - <?php echo e($return->created_at->format('M d')); ?></div>
                    </div>
                    <div class="claim-status status-pending"><?php echo e(ucfirst($return->status)); ?></div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="empty-state">
                    <p>No pending returns</p>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="content-card">
        <div class="card-header">
            <div class="card-title">Recent activity</div>
            <a href="<?php echo e(route('admin.items')); ?>" class="view-all-link">View all</a>
        </div>

        <?php $__empty_1 = true; $__currentLoopData = $recentItems; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="activity-item">
                <div class="activity-content">
                    <div class="activity-title">
                        <?php echo e(ucfirst($item->type)); ?>: <?php echo e($item->name); ?>

                    </div>
                    <div class="activity-meta">Reported by <?php echo e($item->user->name); ?> — <?php echo e($item->type === 'Found' ? $item->found_location : $item->lost_location); ?></div>
                </div>
                <div class="activity-time"><?php echo e($item->created_at->diffForHumans()); ?></div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <div class="empty-state">
                <p>No recent activity</p>
            </div>
        <?php endif; ?>
    </div>

 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $attributes = $__attributesOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__attributesOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php if (isset($__componentOriginale0f1cdd055772eb1d4a99981c240763e)): ?>
<?php $component = $__componentOriginale0f1cdd055772eb1d4a99981c240763e; ?>
<?php unset($__componentOriginale0f1cdd055772eb1d4a99981c240763e); ?>
<?php endif; ?>
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/admin/dashboard.blade.php ENDPATH**/ ?>