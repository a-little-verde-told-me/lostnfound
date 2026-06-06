<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Return an Item']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Return an Item']); ?>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background-color: #f5f5f5;
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

        .nav-link-logout {
            color: #ef4444;
            background: none;
            border: none;
            cursor: pointer;
            font-weight: 500;
            text-decoration: none;
            transition: color 0.2s;
        }

        .nav-link-logout:hover {
            color: #dc2626;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-color: #e5e7eb;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            color: #6b7280;
            text-decoration: none;
            transition: all 0.2s;
        }

        .user-avatar:hover {
            background-color: #2563eb;
            color: white;
        }

        /* Main Content */
        .container {
            max-width: 600px;
            margin: 40px auto;
            padding: 0 16px;
            margin-top: 100px;
        }

        .page-title {
            text-align: center;
            font-size: 32px;
            font-weight: 700;
            color: #2563eb;
            margin-bottom: 32px;
        }

        /* Card Styles */
        .card {
            background: white;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            margin-bottom: 24px;
            padding: 24px;
        }

        .card-title {
            font-size: 16px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 16px;
        }

        /* Item Details */
        .item-detail-row {
            display: flex;
            margin-bottom: 16px;
            padding-bottom: 16px;
            border-bottom: 1px solid #e5e7eb;
        }

        .item-detail-row:last-child {
            margin-bottom: 0;
            padding-bottom: 0;
            border-bottom: none;
        }

        .item-detail-label {
            font-weight: 600;
            color: #1f2937;
            min-width: 140px;
        }

        .item-detail-value {
            color: #4b5563;
            flex: 1;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 20px;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .form-label .required {
            color: #ef4444;
        }

        .form-hint {
            display: block;
            font-size: 12px;
            color: #6b7280;
            margin-bottom: 8px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-input::placeholder {
            color: #9ca3af;
        }

        /* Upload Section */
        .upload-area {
            display: none;
        }

        .form-group input[type="file"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            cursor: pointer;
        }

        .form-group input[type="file"]::file-selector-button {
            padding: 8px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            margin-right: 8px;
            transition: background-color 0.2s;
        }

        .form-group input[type="file"]::file-selector-button:hover {
            background-color: #1d4ed8;
        }
        /* Form Actions */
        .form-actions {
            display: flex;
            gap: 16px;
            margin-top: 32px;
        }

        .btn {
            flex: 1;
            padding: 12px 32px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
            text-align: center;
        }

        .btn-submit {
            background-color: #2563eb;
            color: white;
        }

        .btn-submit:hover {
            background-color: #1d4ed8;
        }

        .btn-cancel {
            background-color: #6b7280;
            color: white;
        }

        .btn-cancel:hover {
            background-color: #4b5563;
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

            .page-title {
                font-size: 24px;
            }

            .container {
                margin: 20px auto;
            }

            .card {
                padding: 16px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }
        }
    </style>

    <div class="container">
        <h1 class="page-title">Return an Item</h1>

        <!-- Item Details Card -->
        <div class="card">
            <div class="card-title">Item Details</div>
            
            <div class="item-detail-row">
                <div class="item-detail-label">Item:</div>
                <div class="item-detail-value"><?php echo e($item->name); ?></div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Description:</div>
                <div class="item-detail-value"><?php echo e($item->description); ?></div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Category:</div>
                <div class="item-detail-value"><?php echo e($item->category?->name ?? 'Uncategorized'); ?></div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Lost at:</div>
                <div class="item-detail-value"><?php echo e($item->lost_location ?? 'Not specified'); ?></div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Date lost:</div>
                <div class="item-detail-value"><?php echo e($item->created_at->format('m/d/Y')); ?></div>
            </div>
        </div>

        <!-- Return Item Form Card -->
        <div class="card">
            <div class="card-title">Return Item Form</div>
            
            <div class="form-hint">Important: Please provide proof of found item. This will be reviewed by our administrators. False report may result in account suspension.</div>

            <form action="<?php echo e(route('return.store')); ?>" method="POST" enctype="multipart/form-data" id="returnForm">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="item_id" value="<?php echo e($item->id); ?>">

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email" class="form-label">
                            Contact Email <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="contact_email" 
                            name="contact_email" 
                            class="form-input <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            placeholder="your.email@example.com"
                            value="<?php echo e(old('contact_email', Auth::user()->email ?? '')); ?>"
                            required
                        >
                        <?php $__errorArgs = ['contact_email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: #ef4444; font-size: 12px;"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="contact_phone" class="form-label">
                            Contact Phone <span class="required">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="contact_phone" 
                            name="contact_phone" 
                            class="form-input <?php $__errorArgs = ['contact_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                            placeholder="0900-000-0000"
                            value="<?php echo e(old('contact_phone', Auth::user()->phone_number ?? '')); ?>"
                            required
                        >
                        <?php $__errorArgs = ['contact_phone'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span style="color: #ef4444; font-size: 12px;"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <div class="form-group">
                    <label for="proof_upload" class="form-label">
                        Upload proof of found item <span class="required">*</span>
                    </label>
                    <div class="form-hint">Upload photos, receipts, or any documents that prove you found this item</div>
                    <input type="file" id="proof_upload" name="proof_upload" accept="image/*" class="<?php $__errorArgs = ['proof_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">
                    <?php $__errorArgs = ['proof_upload'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div style="color: #ef4444; font-size: 12px; margin-top: 8px; padding: 8px; background: #fee2e2; border-radius: 4px;"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label for="additional_details" class="form-label">Additional Details</label>
                    <textarea 
                        id="additional_details" 
                        name="additional_details" 
                        class="form-input <?php $__errorArgs = ['additional_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>" 
                        placeholder="Any additional details about the item or where you found it..."
                        rows="4"
                        style="resize: vertical; font-family: inherit;"
                    ><?php echo e(old('additional_details')); ?></textarea>
                    <?php $__errorArgs = ['additional_details'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span style="color: #ef4444; font-size: 12px;"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <a href="<?php echo e(route('home')); ?>#browse" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>

        <script>
            // Form validation on submit
            document.getElementById('returnForm').addEventListener('submit', function(e) {
                const proofUpload = document.getElementById('proof_upload');
                const MAX_FILE_SIZE = 2 * 1024 * 1024; // 2MB
                
                if (!proofUpload.files || proofUpload.files.length === 0) {
                    e.preventDefault();
                    alert('Please upload a proof image of the found item.');
                    return false;
                }
                
                const file = proofUpload.files[0];
                if (file.size > MAX_FILE_SIZE) {
                    e.preventDefault();
                    alert(`File size exceeds 2MB limit (Current: ${(file.size / 1024 / 1024).toFixed(2)}MB). Please choose a smaller file.`);
                    return false;
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/return_item.blade.php ENDPATH**/ ?>