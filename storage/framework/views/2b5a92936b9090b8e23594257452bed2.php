<?php if (isset($component)) { $__componentOriginale0f1cdd055772eb1d4a99981c240763e = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginale0f1cdd055772eb1d4a99981c240763e = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.admin-layout','data' => ['title' => 'Manage Claims']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('admin-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('Manage Claims')]); ?>
    <style>
        .page-title {
            font-size: 28px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 24px;
        }
        .controls-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            gap: 16px;
        }
        .search-box {
            flex: 1;
            position: relative;
            max-width: 600px;
        }
        .search-box input {
            width: 100%;
            padding: 12px 16px 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            background-color: white;
            transition: border-color 0.2s;
        }
        .search-box input::placeholder {
            color: #9ca3af;
        }
        .search-box input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .search-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #6b7280;
            font-size: 16px;
        }
        .sort-dropdown {
            padding: 10px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            background-color: white;
            font-size: 14px;
            cursor: pointer;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: border-color 0.2s;
        }
        .sort-dropdown:hover {
            border-color: #2563eb;
        }
        .sort-icon {
            font-size: 16px;
        }
        .tabs-container {
            display: flex;
            gap: 12px;
            margin-bottom: 24px;
            border-bottom: 1px solid #e5e7eb;
        }
        .tab-button {
            padding: 12px 16px;
            background: none;
            border: none;
            border-bottom: 3px solid transparent;
            color: #6b7280;
            font-size: 14px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s;
        }
        .tab-button:hover {
            color: #1f2937;
        }
        .tab-button.active {
            color: #2563eb;
            border-bottom-color: #2563eb;
        }
        .table-container {
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }
        .table {
            width: 100%;
            border-collapse: collapse;
        }
        .table-header {
            background-color: #f9fafb;
            border-bottom: 1px solid #e5e7eb;
        }
        .table-header th {
            padding: 16px;
            text-align: left;
            font-weight: 600;
            color: #374151;
            font-size: 12px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .table tbody tr {
            border-bottom: 1px solid #e5e7eb;
            transition: background-color 0.2s;
        }
        .table tbody tr:hover {
            background-color: #f9fafb;
        }
        .table tbody td {
            padding: 16px;
            color: #374151;
            font-size: 14px;
        }
        .status-badge {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: 600;
            text-transform: capitalize;
        }
        .status-pending {
            background-color: #fef08a;
            color: #854d0e;
        }
        .status-approved {
            background-color: #d1fae5;
            color: #065f46;
        }
        .status-rejected {
            background-color: #fee2e2;
            color: #991b1b;
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
        }
        .view-button:hover {
            background-color: #1d4ed8;
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
        }
        .modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .modal-content {
            background-color: white;
            padding: 32px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.3);
            max-width: 1000px;
            width: 95%;
            max-height: 85vh;
            overflow-y: auto;
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
            font-weight: bold;
            color: #1f2937;
        }
        .modal-close {
            background: none;
            border: none;
            font-size: 28px;
            color: #6b7280;
            cursor: pointer;
            transition: color 0.2s;
        }
        .modal-close:hover {
            color: #1f2937;
        }
        .detail-row {
            display: flex;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #f3f4f6;
        }
        .detail-row:last-child {
            border-bottom: none;
        }
        .detail-label {
            font-weight: 600;
            color: #1f2937;
            min-width: 140px;
        }
        .detail-value {
            color: #4b5563;
            flex: 1;
        }
        .modal-body-columns {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px;
            margin-bottom: 24px;
        }
        .modal-column {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        .column-header {
            font-size: 16px;
            font-weight: 700;
            color: #2563eb;
            padding-bottom: 12px;
            border-bottom: 2px solid #2563eb;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        .section-title {
            font-size: 13px;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-top: 12px;
            margin-bottom: 8px;
        }
        .image-container {
            border-radius: 8px;
            overflow: hidden;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 200px;
            margin-bottom: 12px;
        }
        .image-container img {
            max-width: 100%;
            max-height: 300px;
            object-fit: cover;
            border-radius: 8px;
        }
        .no-image {
            color: #9ca3af;
            font-size: 14px;
        }
        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 24px;
            justify-content: flex-end;
        }
        .action-button {
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
        }
        .approve-button {
            background-color: #10b981;
            color: white;
        }
        .approve-button:hover {
            background-color: #059669;
        }
        .reject-button {
            background-color: #ef4444;
            color: white;
        }
        .reject-button:hover {
            background-color: #dc2626;
        }
        .close-button {
            background-color: #d1d5db;
            color: #1f2937;
        }
        .close-button:hover {
            background-color: #9ca3af;
        }

        .no-data {
            text-align: center;
            padding: 48px 16px;
            color: #6b7280;
        }

        @media (max-width: 1024px) {
            .modal-body-columns {
                grid-template-columns: 1fr;
                gap: 16px;
            }
            .modal-content {
                max-width: 800px;
            }
        }

        @media (max-width: 768px) {
            .modal-content {
                max-width: 95vw;
                padding: 20px;
            }
            .modal-header {
                margin-bottom: 16px;
                padding-bottom: 12px;
            }
            .modal-title {
                font-size: 18px;
            }
            .action-button {
                padding: 8px 16px;
                font-size: 13px;
            }
        }

        @media (max-width: 768px) {
            body {
                flex-direction: column;
            }
            .sidebar {
                width: 100%;
                padding: 16px;
            }
            .main-content {
                padding: 16px;
            }
            .page-title {
                font-size: 20px;
            }
            .controls-container {
                flex-direction: column;
            }
            .search-box {
                max-width: 100%;
            }
            .table {
                font-size: 12px;
            }
            .table-header th,
            .table tbody td {
                padding: 12px 8px;
            }
        }
    </style>
        <h1 class="page-title">Manage Claims</h1>

        <div class="controls-container">
            <div class="search-box">
                <input 
                    type="text" 
                    id="searchInput" 
                    placeholder="Search claims" 
                    onkeyup="filterClaims()"
                >
            </div>
            <select class="sort-dropdown" id="sortSelect" onchange="sortClaims()">
                <option value="latest">Sort: Latest</option>
                <option value="oldest">Sort: Oldest</option>
                <option value="name">Sort: Name A-Z</option>
            </select>
        </div>

        <div class="tabs-container">
            <button class="tab-button active" onclick="filterByStatus('all')">All claims (<?php echo e($allClaimsCount); ?>)</button>
            <button class="tab-button" onclick="filterByStatus('pending')">Pending (<?php echo e($pendingCount); ?>)</button>
            <button class="tab-button" onclick="filterByStatus('approved')">Approved (<?php echo e($approvedCount); ?>)</button>
            <button class="tab-button" onclick="filterByStatus('rejected')">Rejected (<?php echo e($rejectedCount); ?>)</button>
        </div>

        <div class="table-container">
            <table class="table">
                <thead class="table-header">
                    <tr>
                        <th>ITEM NAME</th>
                        <th>REPORTED BY</th>
                        <th>CLAIMED BY</th>
                        <th>EMAIL</th>
                        <th>DATE</th>
                        <th>STATUS</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody id="claimsTableBody">
                    <?php $__empty_1 = true; $__currentLoopData = $claims; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $claim): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <tr class="claim-row" data-status="<?php echo e($claim->status); ?>" data-search="<?php echo e(strtolower($claim->item->name . ' ' . $claim->user->name)); ?>">
                            <td><?php echo e($claim->item->name); ?></td>
                            <td><?php echo e($claim->item->user->name); ?></td>
                            <td><?php echo e($claim->user->name); ?></td>
                            <td><?php echo e($claim->user->email); ?></td>
                            <td><?php echo e($claim->date_claimed->format('M d, Y')); ?></td>
                            <td>
                                <span class="status-badge status-<?php echo e($claim->status); ?>">
                                    <?php echo e(ucfirst($claim->status)); ?>

                                </span>
                            </td>
                            <td>
                                <button class="view-button" onclick="openClaimModal(<?php echo e($claim->id); ?>)">View</button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <tr>
                            <td colspan="7" class="no-data">No claims found</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div id="claimModal" class="modal">
        <div class="modal-content">
            <div class="modal-header">
                <h2 class="modal-title">Claim Details</h2>
                <button class="modal-close" onclick="closeClaimModal()">&times;</button>
            </div>

            <div id="modalBody">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>

    <script>
        let currentFilter = 'all';
        let allClaimsData = <?php echo json_encode($claims, 15, 512) ?>;

        function filterByStatus(status) {
            currentFilter = status;
            
            // Update active tab
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
                // Find the button for this status and make it active
                if (status === 'all' && btn.textContent.includes('All claims')) {
                    btn.classList.add('active');
                } else if (status === 'pending' && btn.textContent.includes('Pending')) {
                    btn.classList.add('active');
                } else if (status === 'approved' && btn.textContent.includes('Approved')) {
                    btn.classList.add('active');
                } else if (status === 'rejected' && btn.textContent.includes('Rejected')) {
                    btn.classList.add('active');
                }
            });

            // Filter rows
            const rows = document.querySelectorAll('.claim-row');
            rows.forEach(row => {
                if (status === 'all') {
                    row.style.display = '';
                } else if (row.getAttribute('data-status') === status) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });

            // Apply search on filtered results
            filterClaims();
        }

        function filterClaims() {
            const searchValue = document.getElementById('searchInput').value.toLowerCase();
            const rows = document.querySelectorAll('.claim-row');
            
            rows.forEach(row => {
                // Skip if already hidden by status filter
                if (row.style.display === 'none' && currentFilter !== 'all') {
                    return;
                }

                const searchData = row.getAttribute('data-search');
                if (searchData.includes(searchValue)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }

        function sortClaims() {
            const sortValue = document.getElementById('sortSelect').value;
            const tbody = document.getElementById('claimsTableBody');
            const rows = Array.from(tbody.querySelectorAll('.claim-row'));

            rows.sort((a, b) => {
                const dateA = new Date(a.querySelectorAll('td')[3].textContent);
                const dateB = new Date(b.querySelectorAll('td')[3].textContent);
                const nameA = a.querySelectorAll('td')[0].textContent;
                const nameB = b.querySelectorAll('td')[0].textContent;

                if (sortValue === 'latest') {
                    return dateB - dateA;
                } else if (sortValue === 'oldest') {
                    return dateA - dateB;
                } else if (sortValue === 'name') {
                    return nameA.localeCompare(nameB);
                }
            });

            rows.forEach(row => tbody.appendChild(row));
        }

        function openClaimModal(claimId) {
            // Fetch claim details via AJAX
            fetch(`/api/claims/${claimId}`)
                .then(response => response.json())
                .then(data => {
                    const modalBody = document.getElementById('modalBody');
                    const itemImageUrl = data.item.image ? data.item.image : null;
                    const proofImageUrl = data.image ? data.image : null;
                    
                    modalBody.innerHTML = `
                        <div class="modal-body-columns">
                            <!-- LEFT COLUMN: Item/Report Details -->
                            <div class="modal-column">
                                <div class="column-header">Item Found Report</div>
                                
                                <div class="image-container">
                                    ${itemImageUrl ? `
                                        <img src="${itemImageUrl}" alt="${data.item.name}" />
                                    ` : `
                                        <div class="no-image">No image available</div>
                                    `}
                                </div>
                                
                                <div>
                                    <div class="section-title">Item Details</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Item Name:</div>
                                        <div class="detail-value"><strong>${data.item.name}</strong></div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Type:</div>
                                        <div class="detail-value">${data.item.type === 'found' ? 'Found' : 'Lost'}</div>
                                    </div>
                                    ${data.item.category ? `
                                    <div class="detail-row">
                                        <div class="detail-label">Category:</div>
                                        <div class="detail-value">${data.item.category}</div>
                                    </div>
                                    ` : ''}
                                </div>
                                
                                <div>
                                    <div class="section-title">Description</div>
                                    <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px;">
                                        ${data.item.description || 'No description provided'}
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Location & Date</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Location:</div>
                                        <div class="detail-value">${data.item.found_location || 'Not specified'}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Date Found:</div>
                                        <div class="detail-value">${new Date(data.item.created_at).toLocaleDateString('en-US', {year: 'numeric', month: 'short', day: 'numeric'})}</div>
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Reporter Information</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Name:</div>
                                        <div class="detail-value"><strong>${data.item.user.name}</strong></div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Email:</div>
                                        <div class="detail-value">${data.item.user.email}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Phone:</div>
                                        <div class="detail-value">${data.item.user.phone_number || 'N/A'}</div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- RIGHT COLUMN: Claim Details -->
                            <div class="modal-column">
                                <div class="column-header">Claim Details</div>
                                
                                <div class="image-container">
                                    ${proofImageUrl ? `
                                        <img src="/storage/${proofImageUrl}" alt="Proof of ownership" />
                                    ` : `
                                        <div class="no-image">No proof file uploaded</div>
                                    `}
                                </div>
                                
                                <div>
                                    <div class="section-title">Proof of Ownership Description</div>
                                    <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px; font-size: 13px;">
                                        ${data.proof_description || 'No description provided'}
                                    </div>
                                </div>
                                
                                <div>
                                    <div class="section-title">Claim Status</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Status:</div>
                                        <div class="detail-value">
                                            <span class="status-badge status-${data.status}">
                                                ${data.status.charAt(0).toUpperCase() + data.status.slice(1)}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                <div>
                                    <div class="section-title">Claimant Information</div>
                                    <div class="detail-row">
                                        <div class="detail-label">Name:</div>
                                        <div class="detail-value"><strong>${data.user.name}</strong></div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Email:</div>
                                        <div class="detail-value">${data.user.email}</div>
                                    </div>
                                    <div class="detail-row">
                                        <div class="detail-label">Phone:</div>
                                        <div class="detail-value">${data.contact_number || 'N/A'}</div>
                                    </div>
                                </div>

                                ${data.additional_details ? `
                                <div>
                                    <div class="section-title">Additional Details</div>
                                    <div class="detail-value" style="padding: 8px; background-color: #f9fafb; border-radius: 6px; font-size: 13px;">
                                        ${data.additional_details}
                                    </div>
                                </div>
                                ` : ''}
                            </div>
                        </div>
                        
                        <div class="modal-actions">
                            ${data.status === 'pending' ? `
                                <button class="action-button approve-button" onclick="updateClaimStatus(${data.id}, 'approved')">Approve Claim</button>
                                <button class="action-button reject-button" onclick="updateClaimStatus(${data.id}, 'rejected')">Reject Claim</button>
                            ` : ''}
                            <button class="action-button close-button" onclick="closeClaimModal()">Close</button>
                        </div>
                    `;
                    
                    document.getElementById('claimModal').classList.add('active');
                })
                .catch(error => console.error('Error:', error));
        }

        function updateClaimStatus(claimId, status) {
            fetch(`/api/claims/${claimId}/status`, {
                method: 'PATCH',
                credentials: 'same-origin',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                },
                body: JSON.stringify({ status: status })
            })
            .then(response => {
                return response.json().then(body => ({ ok: response.ok, status: response.status, body }));
            })
            .then(({ ok, status, body }) => {
                if (ok && body.success) {
                    closeClaimModal();
                    location.reload();
                } else {
                    console.error('Update failed', status, body);
                    alert(body.message || body.error || 'Failed to update claim status');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert(error.message || 'Failed to update claim status');
            });
        }

        function closeClaimModal() {
            document.getElementById('claimModal').classList.remove('active');
        }

        // Close modal when clicking outside
        document.getElementById('claimModal').addEventListener('click', (e) => {
            if (e.target.id === 'claimModal') {
                closeClaimModal();
            }
        });
    </script>
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/admin/manage_claims.blade.php ENDPATH**/ ?>