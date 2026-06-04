<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Findit - Find Your Lost Items']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Findit - Find Your Lost Items']); ?>
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

    <!-- Browse Section -->
    <div class="browse-section" id="browse">
        <div class="container">
            <h2 class="section-title">Browse Items</h2>
            
            <div class="search-filter-row">
                <input type="text" id="searchInput" class="search-box" placeholder="Search for lost item by names, or category...">
                <div class="filter-button-wrapper">
                    <button class="filter-button" id="filterToggle">Filter</button>
                    <!-- Filter Panel -->
                    <div class="filter-panel" id="filterPanel">
                        <div class="filter-header">
                            <h3>Filter</h3>
                            <button class="filter-close" id="filterClose">&times;</button>
                        </div>

                        <form id="filterForm">
                            <!-- Status Filter -->
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

                            <!-- Category Filter -->
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


                            <!-- Filter Actions -->
                            <div class="filter-actions">
                                <button type="button" class="btn-apply-filter" id="applyFilter">Apply Filter</button>
                                <button type="button" class="btn-clear-filter" id="clearFilter">Clear Filter</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="sort-button-wrapper">
                    <button class="sort-button" id="sortToggle">Sort: Latest</button>
                    <!-- Sort Panel -->
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
                                <img src="<?php echo e(asset('storage/' . $item->image)); ?>" alt="<?php echo e($item->name); ?>" style="width: 100%; height: 100%; object-fit: cover;" />
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
                                <?php echo e($item->location); ?>

                            </div>
                            <div class="item-date">
                                <i class="fas fa-calendar" style="color: #2563eb;"></i>
                                <?php echo e($item->date_reported->format('m/d/Y')); ?>

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

            <!-- Pagination Info -->
            <?php if($items->total() > 0): ?>
                <div class="pagination-info">
                    Showing <?php echo e($items->firstItem()); ?> to <?php echo e($items->lastItem()); ?> of <?php echo e($items->total()); ?> results
                </div>
            <?php endif; ?>

            <!-- Pagination -->
            <?php if($items->hasPages()): ?>
                <div style="display: flex; justify-content: center; margin-bottom: 32px;">
                    <?php echo e($items->links()); ?>

                </div>
            <?php endif; ?>
        </div>

        <!-- Details Modal -->
        <div id="detailsModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Item Details</h2>
                    <button class="modal-close" onclick="closeDetailsModal()">&times;</button>
                </div>
                <div id="modalBody">
                    <!-- Content will be loaded here -->
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
        let currentSort = 'latest';
        let searchTimeout;

        // Function to view item details
        function viewItemDetails(itemId) {
            // Fetch item details from the items data
            const item = allItems.find(item => item.id === itemId);
            
            if (item) {
                const modal = document.getElementById('detailsModal');
                const modalBody = document.getElementById('modalBody');
                
                const imageUrl = item.image ? `<?php echo e(asset('storage')); ?>/${item.image}` : null;
                
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
                            <div class="detail-value">${item.type.charAt(0).toUpperCase() + item.type.slice(1)}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Description:</div>
                            <div class="detail-value">${item.description || 'No description'}</div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Location:</div>
                            <div class="detail-value">
                                <div class="icon-text">
                                    ${item.location}
                                </div>
                            </div>
                        </div>
                        <div class="detail-row">
                            <div class="detail-label">Date Reported:</div>
                            <div class="detail-value">
                                <div class="icon-text">
                                    ${new Date(item.date_reported).toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' })}
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    ${reporterHtml}
                `;
                
                modal.classList.add('active');
            }
        }

        function closeDetailsModal() {
            const modal = document.getElementById('detailsModal');
            modal.classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('detailsModal').addEventListener('click', function(event) {
            if (event.target === this) {
                closeDetailsModal();
            }
        });

        // Filter Panel Toggle
        filterToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            filterPanel.classList.toggle('active');
            sortPanel.classList.remove('active');
        });

        filterClose.addEventListener('click', (e) => {
            e.preventDefault();
            filterPanel.classList.remove('active');
        });

        // Close filter panel when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.filter-button-wrapper')) {
                filterPanel.classList.remove('active');
            }
        });

        // Sort Panel Toggle
        sortToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            sortPanel.classList.toggle('active');
            filterPanel.classList.remove('active');
        });

        // Close sort panel when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.sort-button-wrapper')) {
                sortPanel.classList.remove('active');
            }
        });

        // Status "All" checkbox logic
        const statusCheckboxes = document.querySelectorAll('input[name="status"]');
        const statusAll = document.getElementById('status_all');
        const statusFound = document.getElementById('status_found');
        const statusLost = document.getElementById('status_lost');

        statusAll.addEventListener('change', () => {
            if (statusAll.checked) {
                statusFound.checked = false;
                statusLost.checked = false;
            }
        });

        statusFound.addEventListener('change', () => {
            if (statusFound.checked) {
                statusAll.checked = false;
            }
        });

        statusLost.addEventListener('change', () => {
            if (statusLost.checked) {
                statusAll.checked = false;
            }
        });

        function sortItems(items, sortType) {
            const sorted = [...items];
            
            switch(sortType) {
                case 'latest':
                    sorted.sort((a, b) => new Date(b.date_reported) - new Date(a.date_reported));
                    break;
                case 'oldest':
                    sorted.sort((a, b) => new Date(a.date_reported) - new Date(b.date_reported));
                    break;
                case 'name_az':
                    sorted.sort((a, b) => a.name.localeCompare(b.name));
                    break;
                case 'name_za':
                    sorted.sort((a, b) => b.name.localeCompare(a.name));
                    break;
                case 'found_first':
                    sorted.sort((a, b) => {
                        if (a.type.toLowerCase() === 'found' && b.type.toLowerCase() !== 'found') return -1;
                        if (a.type.toLowerCase() !== 'found' && b.type.toLowerCase() === 'found') return 1;
                        return new Date(b.date_reported) - new Date(a.date_reported);
                    });
                    break;
                case 'lost_first':
                    sorted.sort((a, b) => {
                        if (a.type.toLowerCase() === 'lost' && b.type.toLowerCase() !== 'lost') return -1;
                        if (a.type.toLowerCase() !== 'lost' && b.type.toLowerCase() === 'lost') return 1;
                        return new Date(b.date_reported) - new Date(a.date_reported);
                    });
                    break;
            }
            
            return sorted;
        }

        function renderItems(items) {
            const sortedItems = sortItems(items, currentSort);
            
            if (sortedItems.length === 0) {
                itemsContainer.innerHTML = '<div style="grid-column: 1 / -1; text-align: center; padding: 48px 16px; color: #6b7280;"><p style="font-size: 16px;">No items found</p></div>';
                return;
            }

            itemsContainer.innerHTML = sortedItems.map(item => `
                <div class="item-card">
                    <div class="item-image">
                        ${item.image 
                            ? `<img src="/storage/${item.image}" alt="${item.name}" />` 
                            : `<div style="width: 100%; height: 100%; background: linear-gradient(135deg, #f3f4f6, #e5e7eb); display: flex; align-items: center; justify-content: center;">
                                <span style="color: #9ca3af; font-size: 14px;">No image</span>
                              </div>`
                        }
                        <span class="item-badge ${item.type.toLowerCase() === 'found' ? 'badge-found' : 'badge-lost'}">${item.type.charAt(0).toUpperCase() + item.type.slice(1)}</span>
                    </div>
                    <div class="item-info">
                        <div class="item-name">${item.name}</div>
                        <div class="item-location">
                            <i class="fas fa-map-marker-alt" style="color: #2563eb;"></i>
                            ${item.location}
                        </div>
                        <div class="item-date">
                            <i class="fas fa-calendar" style="color: #2563eb;"></i>
                            ${new Date(item.date_reported).toLocaleDateString('en-US', { year: 'numeric', month: '2-digit', day: '2-digit' })}
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

        function handleSearch(query) {
            if (query.trim().length === 0) {
                renderItems(allItems);
                return;
            }

            clearTimeout(searchTimeout);
            searchTimeout = setTimeout(() => {
                fetch(`/api/search?q=${encodeURIComponent(query)}`)
                    .then(response => response.json())
                    .then(data => {
                        renderItems(data);
                    })
                    .catch(error => {
                        console.error('Search error:', error);
                        renderItems(allItems);
                    });
            }, 300);
        }

        // Sort Radio Button Handler
        sortRadios.forEach(radio => {
            radio.addEventListener('change', (e) => {
                currentSort = e.target.value;
                
                // Update button text
                const sortLabels = {
                    'latest': 'Sort: Latest',
                    'oldest': 'Sort: Oldest',
                    'name_az': 'Sort: Name A-Z',
                    'name_za': 'Sort: Name Z-A',
                };
                
                sortToggle.textContent = sortLabels[currentSort];
                sortPanel.classList.remove('active');
                renderItems(allItems);
            });
        });

        // Apply Filter
        applyFilter.addEventListener('click', () => {
            const statuses = [];
            const categories = [];
            const locations = [];

            // Get selected statuses
            if (statusAll.checked) {
                statuses.push('all');
            } else {
                if (statusFound.checked) statuses.push('found');
                if (statusLost.checked) statuses.push('lost');
            }

            // Get selected categories
            document.querySelectorAll('input[name="category"]:checked').forEach(checkbox => {
                categories.push(checkbox.value);
            });

            // Build query parameters
            const params = new URLSearchParams();
            if (statuses.length > 0) params.append('status', statuses.join(','));
            if (categories.length > 0) params.append('category', categories.join(','));
            if (locations.length > 0) params.append('location', locations.join(','));

            // Fetch filtered items
            fetch(`/api/filter?${params.toString()}`)
                .then(response => response.json())
                .then(data => {
                    renderItems(data);
                    filterPanel.classList.remove('active');
                })
                .catch(error => {
                    console.error('Filter error:', error);
                });
        });

        // Clear Filter
        clearFilter.addEventListener('click', () => {
            statusAll.checked = true;
            statusFound.checked = false;
            statusLost.checked = false;
            
            document.querySelectorAll('input[name="category"]').forEach(checkbox => {
                checkbox.checked = false;
            });

            renderItems(allItems);
            filterPanel.classList.remove('active');
        });

        // Reset Button
        resetButton.addEventListener('click', () => {
            // Clear search input
            searchInput.value = '';
            
            // Reset all filters
            statusAll.checked = true;
            statusFound.checked = false;
            statusLost.checked = false;
            
            document.querySelectorAll('input[name="category"]').forEach(checkbox => {
                checkbox.checked = false;
            });
            
            // Reset sort to latest
            currentSort = 'latest';
            document.getElementById('sort_latest').checked = true;
            sortToggle.textContent = 'Sort: Latest';
            
            // Close any open panels
            filterPanel.classList.remove('active');
            sortPanel.classList.remove('active');
            
            // Render all items with default sort
            renderItems(allItems);
        });

        searchInput.addEventListener('input', (e) => {
            handleSearch(e.target.value);
        });

        // Initial render
        renderItems(allItems);
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/user/home.blade.php ENDPATH**/ ?>