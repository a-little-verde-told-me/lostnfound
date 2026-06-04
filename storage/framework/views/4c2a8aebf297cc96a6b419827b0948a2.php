<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'My Profile']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'My Profile']); ?>
    <style>
        .profile-container {
            max-width: 600px;
            margin: 40px auto;
            background: white;
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin: 100px auto;
        }
        .profile-header {
            text-align: center;
            margin-bottom: 40px;
        }
        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: #2563eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: white;
            font-size: 32px;
            margin: 0 auto 20px;
        }
        .profile-name {
            font-size: 28px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .profile-role {
            font-size: 14px;
            color: #6b7280;
            text-transform: capitalize;
        }
        .profile-section {
            margin-bottom: 30px;
        }
        .profile-section-title {
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 16px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }
        .profile-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #f3f4f6;
        }
        .profile-item:last-child {
            border-bottom: none;
        }
        .profile-label {
            font-size: 14px;
            font-weight: 500;
            color: #6b7280;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .profile-label i {
            color: #2563eb;
            width: 16px;
            text-align: center;
        }

        .form-label i {
            color: #2563eb;
            margin-right: 4px;
            width: 14px;
            text-align: center;
        }
        .profile-value {
            font-size: 14px;
            color: #1f2937;
            font-weight: 500;
        }
        .profile-actions {
            display: flex;
            gap: 12px;
            margin-top: 30px;
            padding-top: 30px;
            border-top: 1px solid #e5e7eb;
        }
        .btn {
            flex: 1;
            padding: 12px 20px;
            border-radius: 8px;
            border: none;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            text-align: center;
            display: inline-block;
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
        .icon {
            display: inline-block;
            width: 16px;
            height: 16px;
        }

        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            backdrop-filter: blur(4px);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-box {
            background: white;
            border-radius: 12px;
            padding: 32px;
            max-width: 450px;
            width: 90%;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            max-height: 90vh;
            overflow-y: auto;
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
            cursor: pointer;
            color: #6b7280;
            transition: color 0.2s;
        }

        .modal-close:hover {
            color: #1f2937;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 600;
            color: #374151;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: border-color 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-input:disabled {
            background-color: #f3f4f6;
            color: #6b7280;
            cursor: not-allowed;
        }

        .modal-actions {
            display: flex;
            gap: 12px;
            margin-top: 28px;
            padding-top: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .modal-actions .btn {
            flex: 1;
        }

        .btn-centered {
            flex: none !important;
            margin: 0 auto !important;
            width: auto;
            padding: 12px 40px;
        }

        .profile-actions {
            justify-content: center;
        }
    </style>

    <div class="profile-container">
        <!-- Success Message -->
        <?php if(session('success')): ?>
            <div style="background-color: #d1fae5; border: 1px solid #6ee7b7; border-radius: 8px; padding: 12px 16px; margin-bottom: 24px; color: #047857; font-size: 14px;">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">
                <?php echo e(strtoupper(substr(Auth::user()->name ?? 'U', 0, 1))); ?>

            </div>
            <div class="profile-name"><?php echo e(Auth::user()->name); ?></div>
            <!-- <div class="profile-role"><?php echo e(Auth::user()->role ?? 'User'); ?></div> -->
        </div>

        <!-- Personal Information Section -->
        <div class="profile-section">
            <div class="profile-section-title">Personal Information</div>
            
            <div class="profile-item">
                <span class="profile-label">
                    <i class="fa fa-user"></i> Name
                </span>
                <span class="profile-value"><?php echo e(Auth::user()->name); ?></span>
            </div>

            <div class="profile-item">
                <span class="profile-label">
                    <i class="fa fa-phone"></i> Phone Number
                </span>
                <span class="profile-value"><?php echo e(Auth::user()->phone_number ?? 'Not provided'); ?></span>
            </div>

            <div class="profile-item">
                <span class="profile-label">
                    <i class="fa fa-envelope"></i> Email
                </span>
                <span class="profile-value"><?php echo e(Auth::user()->email); ?></span>
            </div>

        </div>

        <!-- History Section -->
        <div class="profile-section">
            <div class="profile-section-title">History</div>
            
            <div class="profile-item">
                <span class="profile-label">
                    <i class="fa fa-file-text"></i> My Reports
                </span>
                <span class="profile-value">
                    <a href="<?php echo e(route('reports.index')); ?>" style="color: #2563eb; text-decoration: none;">View Reports</a>
                </span>
            </div>
            
            <div class="profile-item">
                <span class="profile-label">
                    <i class="fa fa-history"></i> My History
                </span>
                <span class="profile-value">
                    <a href="<?php echo e(route('history.index')); ?>" style="color: #2563eb; text-decoration: none;">View History</a>
                </span>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="profile-actions">
            <button type="button" class="btn btn-primary btn-centered" id="editProfileBtn">Edit Profile</button>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal-overlay" id="editProfileModal">
        <div class="modal-box">
            <div class="modal-header">
                <h2 class="modal-title">Edit Profile</h2>
                <button type="button" class="modal-close" id="closeModalBtn">&times;</button>
            </div>

            <form method="POST" action="<?php echo e(route('profile.update')); ?>" id="editProfileForm">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                <!-- Name Field -->
                <div class="form-group">
                    <label class="form-label"><i class="fa fa-user"></i> Name</label>
                    <input type="text" name="name" class="form-input" value="<?php echo e(Auth::user()->name); ?>" required>
                </div>

                <!-- Phone Number Field -->
                <div class="form-group">
                    <label class="form-label"><i class="fa fa-phone"></i> Phone Number</label>
                    <input type="tel" name="phone_number" class="form-input" value="<?php echo e(Auth::user()->phone_number ?? ''); ?>" placeholder="Enter your phone number">
                </div>

                <div class="form-group">
                    <label class="form-label"><i class="fa fa-envelope"></i> Email</label>
                    <input type="email" name="email" class="form-input" value="<?php echo e(Auth::user()->email); ?>" required>
                </div>


                <!-- Modal Actions -->
                <div class="modal-actions">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" id="cancelModalBtn">Cancel</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        const editProfileBtn = document.getElementById('editProfileBtn');
        const editProfileModal = document.getElementById('editProfileModal');
        const closeModalBtn = document.getElementById('closeModalBtn');
        const cancelModalBtn = document.getElementById('cancelModalBtn');

        // Open modal
        editProfileBtn.addEventListener('click', function() {
            editProfileModal.classList.add('active');
        });

        // Close modal
        function closeModal() {
            editProfileModal.classList.remove('active');
        }

        closeModalBtn.addEventListener('click', closeModal);
        cancelModalBtn.addEventListener('click', closeModal);

        // Close modal when clicking outside the box
        editProfileModal.addEventListener('click', function(event) {
            if (event.target === editProfileModal) {
                closeModal();
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/user_profile.blade.php ENDPATH**/ ?>