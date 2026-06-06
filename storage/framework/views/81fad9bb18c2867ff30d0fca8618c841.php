<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Find Your Lost Items']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Find Your Lost Items']); ?>
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
            padding: 0 32px;
            background: white;
            border-bottom: 1px solid #e5e7eb;
            height: 60px;
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
        .sort-button,
        .reset-button {
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
        .sort-button:hover,
        .reset-button:hover {
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
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-claim {
            background-color: #2563eb;
            color: white;
            text-decoration: none;
        }

        .btn-claim:hover {
            background-color: #1d4ed8;
        }

        .btn-details {
            background-color: white;
            color: #2563eb;
            border: 1px solid #2563eb;
            text-decoration: none;
        }

        .btn-details:hover {
            background-color: #eff6ff;
        }

        .btn-claim:disabled,
        .btn-claim.disabled {
            background-color: #d1d5db;
            color: #9ca3af;
            cursor: not-allowed;
            opacity: 0.6;
        }

        .btn-claim:disabled:hover,
        .btn-claim.disabled:hover {
            background-color: #d1d5db;
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

        /* Filter Panel Styles */
        .filter-panel {
            position: absolute;
            top: 100%;
            left: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-top: 8px;
            min-width: 320px;
            max-height: 600px;
            overflow-y: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: none;
            z-index: 100;
        }

        .filter-panel.active {
            display: block;
            animation: slideDown 0.2s ease-in-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .filter-header {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: white;
            position: sticky;
            top: 0;
        }

        .filter-header h3 {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin: 0;
        }

        .filter-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .filter-close:hover {
            color: #1f2937;
        }

        .filter-section {
            padding: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .filter-section h4 {
            font-size: 12px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .filter-option {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
            cursor: pointer;
        }

        .filter-option:last-child {
            margin-bottom: 0;
        }

        .filter-option input[type="checkbox"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #2563eb;
        }

        .filter-option label {
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
            flex: 1;
            margin: 0;
        }

        .filter-actions {
            padding: 16px;
            border-top: 1px solid #e5e7eb;
            display: flex;
            gap: 12px;
            background: white;
            position: sticky;
            bottom: 0;
        }

        .filter-actions button {
            flex: 1;
            padding: 10px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }

        .btn-apply-filter {
            background-color: #2563eb;
            color: white;
            border-color: #2563eb;
        }

        .btn-apply-filter:hover {
            background-color: #1d4ed8;
        }

        .btn-clear-filter {
            background-color: white;
            color: #1f2937;
        }

        .btn-clear-filter:hover {
            background-color: #f3f4f6;
        }

        .filter-button-wrapper {
            position: relative;
            display: inline-block;
        }

        /* Sort Panel Styles */
        .sort-panel {
            position: absolute;
            top: 100%;
            right: 0;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-top: 8px;
            min-width: 240px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            display: none;
            z-index: 100;
        }

        .sort-panel.active {
            display: block;
            animation: slideDown 0.2s ease-in-out;
        }

        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .sort-option {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            cursor: pointer;
            transition: background-color 0.2s;
        }

        .sort-option:hover {
            background-color: #f3f4f6;
        }

        .sort-option:first-child {
            border-radius: 8px 8px 0 0;
        }

        .sort-option:last-child {
            border-radius: 0 0 8px 8px;
        }

        .sort-option input[type="radio"] {
            width: 18px;
            height: 18px;
            margin-right: 10px;
            cursor: pointer;
            accent-color: #2563eb;
        }

        .sort-option label {
            font-size: 14px;
            color: #4b5563;
            cursor: pointer;
            flex: 1;
            margin: 0;
        }

        .sort-button-wrapper {
            position: relative;
            display: inline-block;
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

            .filter-content {
                width: 100%;
            }
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.3s ease-in-out;
        }

        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }

        .modal-content {
            background-color: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-width: 600px;
            width: 90%;
            max-height: 85vh;
            overflow-y: auto;
            animation: slideUp 0.3s ease-in-out;
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
            border-bottom: 1px solid #e5e7eb;
            padding-bottom: 16px;
        }

        .modal-title {
            font-size: 24px;
            font-weight: 700;
            color: #1f2937;
        }

        .modal-close {
            background: none;
            border: none;
            font-size: 28px;
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #1f2937;
        }

        .modal-image {
            width: 100%;
            height: 300px;
            background-color: #f3f4f6;
            border-radius: 8px;
            overflow: hidden;
            margin-bottom: 24px;
        }

        .modal-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .modal-image.no-image {
            display: flex;
            align-items: center;
            justify-content: center;
            color: #9ca3af;
        }

        .modal-section {
            margin-bottom: 24px;
        }

        .modal-section-title {
            font-size: 14px;
            font-weight: 600;
            color: #1f2937;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 12px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .detail-row:last-child {
            border-bottom: none;
        }

        .detail-label {
            font-weight: 600;
            color: #6b7280;
        }

        .detail-value {
            color: #1f2937;
            text-align: right;
            flex: 1;
            margin-left: 12px;
        }

        .icon-text {
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .icon-text i {
            color: #2563eb;
            width: 20px;
            text-align: center;
        }

        .reporter-info {
            background-color: #f3f4f6;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 24px;
        }

        .reporter-name {
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 4px;
        }

        .reporter-email {
            font-size: 14px;
            color: #6b7280;
        }
    </style>

    <!-- Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="hero-content">
                <h1>Find What You've Lost</h1>
                <p>Find your lost items or report what you've found.</p>
                <div class="hero-buttons">
                    <?php if(Auth::check()): ?>
                        <a href="<?php echo e(route('report.lost')); ?>" class="btn btn-primary">Report Lost Item</a>
                        <a href="<?php echo e(route('report.found')); ?>" class="btn btn-dark">Report Found Item</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-primary">Report Lost Item</a>
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-dark">Report Found Item</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <div class="browse-section" id="browse">
        <div class="container">
            <h2 class="section-title">Browse Items</h2>
            
            <div class="search-filter-row">
                <input type="text" id="searchInput" class="search-box" placeholder="Search for lost item by names, or category...">
                <div class="filter-button-wrapper">
                    <button class="filter-button" id="filterToggle">Filter</button>
                    <div class="filter-panel" id="filterPanel">
                        <div class="filter-header">
                            <h3>Filter</h3>
                            <button class="filter-close" id="filterClose">&times;</button>
                        </div>

                        <form id="filterForm">
                            <div class="filter-section">
                                <h4>Status</h4>
                                <div class="filter-option">
                                    <input type="checkbox" id="status_all" name="status" value="all" checked>
                                    <label for="status_all">All</label>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" id="status_found" name="status" value="found">
                                    <label for="status_found">Found</label>
                                </div>
                                <div class="filter-option">
                                    <input type="checkbox" id="status_lost" name="status" value="lost">
                                    <label for="status_lost">Lost</label>
                                </div>
                            </div>

                            <div class="filter-section">
                                <h4>Category</h4>
                                <?php
                                    $categories = [
                                        'Electronics' => 'Electronics',
                                        'Accessories' => 'Accessories',
                                        'Clothing' => 'Clothing',
                                        'Bags' => 'Bags',
                                        'Wallets' => 'Wallets',
                                        'Jewelry' => 'Jewelry',
                                        'Books' => 'Books',
                                        'Documents' => 'Documents',
                                        'Personal Items' => 'Personal Items',
                                        'Others' => 'Others'
                                    ];
                                ?>
                                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="filter-option">
                                        <input type="checkbox" id="category_<?php echo e(strtolower($key)); ?>" name="category" value="<?php echo e(strtolower($key)); ?>">
                                        <label for="category_<?php echo e(strtolower($key)); ?>"><?php echo e($value); ?></label>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>

                            <div class="filter-actions">
                                <button type="button" class="btn-apply-filter" id="applyFilter">Apply Filter</button>
                                <button type="button" class="btn-clear-filter" id="clearFilter">Clear Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sort-button-wrapper">
                    <button class="sort-button" id="sortToggle">Sort: Latest</button>
                    <div class="sort-panel" id="sortPanel">
                        <div class="sort-option">
                            <input type="radio" id="sort_latest" name="sort" value="latest" checked>
                            <label for="sort_latest">Latest</label>
                        </div>
                        <div class="sort-option">
                            <input type="radio" id="sort_oldest" name="sort" value="oldest">
                            <label for="sort_oldest">Oldest</label>
                        </div>
                        <div class="sort-option">
                            <input type="radio" id="sort_name_az" name="sort" value="name_az">
                            <label for="sort_name_az">Name A-Z</label>
                        </div>
                        <div class="sort-option">
                            <input type="radio" id="sort_name_za" name="sort" value="name_za">
                            <label for="sort_name_za">Name Z-A</label>
                        </div>
                    </div>
                </div>
                <button class="reset-button" id="resetButton">Reset</button>
            </div>

            <div class="items-grid" id="itemsContainer">
                <?php $__empty_1 = true; $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <div class="item-card">
                        <div class="item-image">
                            <?php if($item->image): ?>
                                <img src="<?php echo e($item->image); ?>" alt="<?php echo e($item->name); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
                            <?php else: ?>
                                <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); display: flex; align-items: center; justify-content: center;">
                                    <span style="color: #9ca3af; font-size: 14px;">No image</span>
                                </div>
                            <?php endif; ?>
                            <span class="item-badge <?php echo e(strtolower($item->type) === 'found' ? 'badge-found' : 'badge-lost'); ?>"><?php echo e(ucfirst($item->type)); ?></span>
                        </div>
                        <div class="item-info">
                            <div class="item-name"><?php echo e($item->name); ?></div>
                            <div class="item-location">
                                <i class="fas fa-map-marker-alt" style="color: #2563eb;"></i>
                                <?php echo e(strtolower($item->type) === 'found' ? $item->found_location : $item->lost_location); ?>

                            </div>
                            <div class="item-date">
                                <i class="fas fa-calendar" style="color: #2563eb;"></i>
                                <?php echo e($item->created_at->format('m/d/Y')); ?>

                            </div>
                            <div class="item-actions">
                                <?php
                                    $isOwnReport = Auth::check() && Auth::id() === $item->user_id;
                                ?>
                                <?php if(strtolower($item->type) === 'found'): ?>
                                    <?php if($isOwnReport): ?>
                                        <button class="btn-small btn-claim disabled" disabled title="You cannot claim your own report">Claim Item</button>
                                    <?php else: ?>
                                        <a href="<?php echo e(Auth::check() ? route('claim.item', $item->id) : route('login')); ?>" class="btn-small btn-claim">Claim Item</a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <?php if($isOwnReport): ?>
                                        <button class="btn-small btn-claim disabled" disabled title="You cannot return your own report">Return Item</button>
                                    <?php else: ?>
                                        <a href="<?php echo e(Auth::check() ? route('return.item', $item->id) : route('login')); ?>" class="btn-small btn-claim">Return Item</a>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <button class="btn-small btn-details" onclick="viewItemDetails(<?php echo e($item->id); ?>)">Details</button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px; color: #6b7280;">
                        <p style="font-size: 16px;">No items found</p>
                    </div>
                <?php endif; ?>
            </div>

            <?php if($items->total() > 0): ?>
                <div class="pagination-info">
                    Showing <?php echo e($items->firstItem()); ?> to <?php echo e($items->lastItem()); ?> of <?php echo e($items->total()); ?> results
                </div>
            <?php endif; ?>

            <?php if($items->hasPages()): ?>
                <div style="display: flex; justify-content: center; margin-bottom: 32px;">
                    <?php echo e($items->links()); ?>

                </div>
            <?php endif; ?>
        </div>

        <div id="detailsModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Item Details</h2>
                    <button class="modal-close" onclick="closeDetailsModal()">&times;</button>
                </div>
                <div id="modalBody">
                    </div>
            </div>
        </div>
    </div>

    <script>
    const searchInput = document.getElementById('searchInput');
    const itemsContainer = document.getElementById('itemsContainer');
    const filterToggle = document.getElementById('filterToggle');
    const filterClose = document.getElementById('filterClose');
    const filterPanel = document.getElementById('filterPanel');
    const filterForm = document.getElementById('filterForm');
    const applyFilter = document.getElementById('applyFilter');
    const clearFilter = document.getElementById('clearFilter');
    const sortToggle = document.getElementById('sortToggle');
    const sortPanel = document.getElementById('sortPanel');
    const sortRadios = document.querySelectorAll('input[name="sort"]');
    const resetButton = document.getElementById('resetButton');
    
    window.currentUserId = <?php echo json_encode(Auth::id() ?? null, 15, 512) ?>;
    window.allItems = <?php echo json_encode($items->items(), 15, 512) ?>;
    
    // 💡 THE TRICK: Track what is currently active on the user's screen
    let currentItems = [...window.allItems]; 
    let currentSort = 'latest';
    let searchTimeout;

    // Function to view item details
    function viewItemDetails(itemId) {
        // Look through current items first, fall back to global pool if needed
        const item = currentItems.find(item => item.id === itemId) || window.allItems.find(item => item.id === itemId);
        
        if (item) {
            const modal = document.getElementById('detailsModal');
            const modalBody = document.getElementById('modalBody');
            const imageUrl = item.image ? item.image : null;
            
            let reporterHtml = '';
            if (item.user) {
                reporterHtml = `
                    <div class="modal-section">
                        <div class="modal-section-title">Reported by</div>
                        <div class="reporter-info">
                            <div class="reporter-name">
                                <i class="fas fa-user" style="margin-right: 8px;"></i>${item.user.name}
                            </div>
                            <div class="reporter-email">
                                <i class="fas fa-envelope" style="margin-right: 8px;"></i>${item.user.email}
                            </div>
                        </div>
                    </div>
                `;
            }
            
            modalBody.innerHTML = `
                <div class="modal-image ${!imageUrl ? 'no-image' : ''}">
                    ${imageUrl ? `<img src="${imageUrl}" alt="${item.name}" />` : '<span>No image available</span>'}
                </div>
                
                <div class="modal-section">
                    <div class="modal-section-title">Item Information</div>
                    <div class="detail-row">
                        <div class="detail-label">Name:</div>
                        <div class="detail-value"><strong>${item.name}</strong></div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Type:</div>
                        <div class="detail-value">${item.type.charAt(0).toUpperCase() + item.type.slice(1).toLowerCase()}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Description:</div>
                        <div class="detail-value">${item.description || 'No description'}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Category:</div>
                        <div class="detail-value">${item.category?.name || 'Uncategorized'}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Location:</div>
                        <div class="detail-value">${item.type.toLowerCase() === 'found' ? item.found_location : item.lost_location}</div>
                    </div>
                    <div class="detail-row">
                        <div class="detail-label">Date Reported:</div>
                        <div class="detail-value">${new Date(item.created_at).toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' })}</div>
                    </div>
                </div>
                
                ${reporterHtml}
            `;
            
            modal.classList.add('active');
        }
    }

    function closeDetailsModal() {
        document.getElementById('detailsModal').classList.remove('active');
    }

    document.getElementById('detailsModal').addEventListener('click', function(event) {
        if (event.target === this) closeDetailsModal();
    });

    // Panel Toggles
    filterToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        filterPanel.classList.toggle('active');
        sortPanel.classList.remove('active');
    });

    filterClose.addEventListener('click', (e) => {
        e.preventDefault();
        filterPanel.classList.remove('active');
    });

    sortToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        sortPanel.classList.toggle('active');
        filterPanel.classList.remove('active');
    });

    document.addEventListener('click', (e) => {
        if (!e.target.closest('.filter-button-wrapper')) filterPanel.classList.remove('active');
        if (!e.target.closest('.sort-button-wrapper')) sortPanel.classList.remove('active');
    });

    // Checkbox State Management
    const statusAll = document.getElementById('status_all');
    const statusFound = document.getElementById('status_found');
    const statusLost = document.getElementById('status_lost');

    statusAll.addEventListener('change', () => {
        if (statusAll.checked) {
            statusFound.checked = false;
            statusLost.checked = false;
        }
    });
    const toggleStatusAll = () => { if (statusFound.checked || statusLost.checked) statusAll.checked = false; };
    statusFound.addEventListener('change', toggleStatusAll);
    statusLost.addEventListener('change', toggleStatusAll);

    // Client-side Sorting Logic
    function sortItems(items, sortType) {
        const sorted = [...items];
        switch(sortType) {
            case 'latest':
                sorted.sort((a, b) => new Date(b.created_at) - new Date(a.created_at));
                break;
            case 'oldest':
                sorted.sort((a, b) => new Date(a.created_at) - new Date(b.created_at));
                break;
            case 'name_az':
                sorted.sort((a, b) => a.name.localeCompare(b.name));
                break;
            case 'name_za':
                sorted.sort((a, b) => b.name.localeCompare(a.name));
                break;
        }
        return sorted;
    }

    // Dynamic Render Engine
    function renderItems() {
        // Sort whatever dataset is currently active
        const sortedItems = sortItems(currentItems, currentSort);
        
        if (sortedItems.length === 0) {
            itemsContainer.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px; color: #6b7280;"><p style="font-size: 16px;">No items found</p></div>';
            return;
        }

        itemsContainer.innerHTML = sortedItems.map(item => `
            <div class="item-card">
                <div class="item-image">
                    ${item.image 
                        ? `<img src="${item.image}" alt="${item.name}" />` 
                        : `<div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); display: flex; align-items: center; justify-content: center;">
                            <span style="color: #9ca3af; font-size: 14px;">No image</span>
                          </div>`
                    }
                    <span class="item-badge ${item.type.toLowerCase() === 'found' ? 'badge-found' : 'badge-lost'}">${item.type.charAt(0).toUpperCase() + item.type.slice(1).toLowerCase()}</span>
                </div>
                <div class="item-info">
                    <div class="item-name">${item.name}</div>
                    <div class="item-location">
                        <i class="fas fa-map-marker-alt" style="color: #2563eb;"></i>
                        ${item.type.toLowerCase() === 'found' ? (item.found_location || 'N/A') : (item.lost_location || 'N/A')}
                    </div>
                    <div class="item-date">
                        <i class="fas fa-calendar" style="color: #2563eb;"></i>
                        ${new Date(item.created_at).toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' })}
                    </div>
                    <div class="item-actions">
                        ${item.type.toLowerCase() === 'found' 
                            ? (window.currentUserId && item.user_id === window.currentUserId 
                                ? `<button class="btn-small btn-claim disabled" disabled title="You cannot claim your own report">Claim Item</button>` 
                                : `<a href="/claim-item-view/${item.id}" class="btn-small btn-claim">Claim Item</a>`)
                            : (window.currentUserId && item.user_id === window.currentUserId 
                                ? `<button class="btn-small btn-claim disabled" disabled title="You cannot return your own report">Return Item</button>` 
     : `<a href="/return-item/${item.id}" class="btn-small btn-claim">Return Item</a>`)
                        }
                        <button class="btn-small btn-details" onclick="viewItemDetails(${item.id})">Details</button>
                    </div>
                </div>
            </div>
        `).join('');
    }

    // Live Search Engine Connection
    function handleSearch(query) {
        if (query.trim().length === 0) {
            currentItems = [...window.allItems];
            renderItems();
            return;
        }

        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            fetch(`/api/search?q=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {
                    currentItems = data; // Set search matches as current tracking state
                    renderItems();
                })
                .catch(error => {
                    console.error('Search error:', error);
                    currentItems = [...window.allItems];
                    renderItems();
                });
        }, 300);
    }

    // Sort Selection Handler
    sortRadios.forEach(radio => {
        radio.addEventListener('change', (e) => {
            currentSort = e.target.value;
            
            const sortLabels = {
                'latest': 'Sort: Latest',
                'oldest': 'Sort: Oldest',
                'name_az': 'Sort: Name A-Z',
                'name_za': 'Sort: Name Z-A',
            };
            
            sortToggle.textContent = sortLabels[currentSort];
            sortPanel.classList.remove('active');
            renderItems(); // Sorts whatever is in currentItems!
        });
    });

    // Apply Filter Endpoint Connection
    applyFilter.addEventListener('click', () => {
        const statuses = [];
        const categories = [];

        if (statusAll.checked) {
            statuses.push('all');
        } else {
            if (statusFound.checked) statuses.push('found');
            if (statusLost.checked) statuses.push('lost');
        }

        document.querySelectorAll('input[name="category"]:checked').forEach(checkbox => {
            categories.push(checkbox.value);
        });

        const params = new URLSearchParams();
        if (statuses.length > 0) params.append('status', statuses.join(','));
        if (categories.length > 0) params.append('category', categories.join(','));

        fetch(`/api/filter?${params.toString()}`)
            .then(response => response.json())
            .then(data => {
                currentItems = data; // Set filtered matches as current tracking state
                renderItems();
                filterPanel.classList.remove('active');
            })
            .catch(error => {
                console.error('Filter error:', error);
            });
    });

    // Clear Filter Layout Action
    clearFilter.addEventListener('click', () => {
        statusAll.checked = true;
        statusFound.checked = false;
        statusLost.checked = false;
        document.querySelectorAll('input[name="category"]').forEach(checkbox => checkbox.checked = false);

        currentItems = [...window.allItems];
        renderItems();
        filterPanel.classList.remove('active');
    });

    // Total Reset
    resetButton.addEventListener('click', () => {
        searchInput.value = '';
        statusAll.checked = true;
        statusFound.checked = false;
        statusLost.checked = false;
        document.querySelectorAll('input[name="category"]').forEach(checkbox => checkbox.checked = false);
        
        currentSort = 'latest';
        document.getElementById('sort_latest').checked = true;
        sortToggle.textContent = 'Sort: Latest';
        
        filterPanel.classList.remove('active');
        sortPanel.classList.remove('active');
        
        currentItems = [...window.allItems];
        renderItems();
    });

    searchInput.addEventListener('input', (e) => handleSearch(e.target.value));

    // Initial Execution Run
    renderItems();
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/home.blade.php ENDPATH**/ ?>