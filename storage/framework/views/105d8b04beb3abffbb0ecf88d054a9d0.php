<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Report a Lost Item - Findit']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Report a Lost Item - Findit']); ?>
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Report a lost item</h1>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-title">Lost item details</div>
            <div class="card-subtitle">Fill out the form below to report your lost item.</div>

            <?php if($errors->any()): ?>
                <div class="alert alert-errors">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <?php if(session('success')): ?>
                <div class="alert alert-success">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('report.lost.store')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <!-- Type (Hidden - Always "Lost") -->
                <div class="form-group" style="display: none;">
                    <input type="hidden" name="type" value="Lost">
                </div>

                <!-- Item Name -->
                <div class="form-group">
                    <label for="item_name">Item name <span class="required">*</span></label>
                    <input
                        type="text"
                        id="item_name"
                        name="item_name"
                        placeholder="e.g. Black leather wallet"
                        value="<?php echo e(old('item_name')); ?>"
                        class="<?php $__errorArgs = ['item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
                    <?php $__errorArgs = ['item_name'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Category and Date Lost (Row) -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="category_id">Category <span class="required">*</span></label>
                        <select
                            id="category_id"
                            name="category_id"
                            style="font-size: 14px;"
                            class="<?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        >
                            <option value="">Select a category</option>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($category->id); ?>" <?php if(old('category_id') == $category->id): echo 'selected'; endif; ?>>
                                    <?php echo e($category->name); ?>

                                </option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                        <?php $__errorArgs = ['category_id'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>

                    <div class="form-group">
                        <label for="date_lost">Date lost <span class="required">*</span></label>
                        <input
                            type="date"
                            id="date_lost"
                            name="date_lost"
                            value="<?php echo e(old('date_lost')); ?>"
                            class="<?php $__errorArgs = ['date_lost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                        >
                        <?php $__errorArgs = ['date_lost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                            <span class="error-message"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </div>
                </div>

                <!-- Where you lost it -->
                <div class="form-group">
                    <label for="location_lost">Last seen location <span class="required">*</span></label>
                    <input
                        type="text"
                        id="location_lost"
                        name="location_lost"
                        placeholder="e.g. Library, second floor"
                        value="<?php echo e(old('location_lost')); ?>"
                        class="<?php $__errorArgs = ['location_lost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
                    <?php $__errorArgs = ['location_lost'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Provide detailed description of the lost item..."
                        class="<?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    ><?php echo e(old('description')); ?></textarea>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Photo Upload -->
                <div class="form-group">
                    <label for="photo">Photo <span class="required">*</span></label>
                    <div class="photo-upload-area" id="photoUploadArea">

                        <div class="photo-upload-icon">
                            <i class="fa-solid fa-image"></i>
                        </div>                        
                        
                        <div class="photo-upload-text">Upload a photo of the lost item</div>
                        <div class="photo-upload-help">JPG, PNG, or GIF (Max 2MB)</div>
                    </div>
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        style="display: none;"
                        class="<?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> error <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>"
                    >
                    <div id="photoPreview"></div>
                    <?php $__errorArgs = ['photo'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="error-message"><?php echo e($message); ?></span>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Report lost item</button>
                    <a href="<?php echo e(route('home')); ?>" class="btn btn-secondary">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Photo upload handling
        const photoUploadArea = document.getElementById('photoUploadArea');
        const photoInput = document.getElementById('photo');
        const photoPreview = document.getElementById('photoPreview');

        photoUploadArea.addEventListener('click', () => photoInput.click());

        photoUploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            photoUploadArea.style.borderColor = '#2563eb';
            photoUploadArea.style.backgroundColor = '#f0f9ff';
        });

        photoUploadArea.addEventListener('dragleave', () => {
            photoUploadArea.style.borderColor = '#d1d5db';
            photoUploadArea.style.backgroundColor = 'white';
        });

        photoUploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            if (e.dataTransfer.files.length > 0) {
                photoInput.files = e.dataTransfer.files;
                handlePhotoChange();
            }
        });

        photoInput.addEventListener('change', handlePhotoChange);

        function handlePhotoChange() {
            if (photoInput.files.length > 0) {
                const file = photoInput.files[0];
                const reader = new FileReader();

                reader.onload = (e) => {
                    photoUploadArea.innerHTML = '<div style="color: #10b981; font-weight: 600;">✓ Image selected</div>';
                    photoUploadArea.classList.add('has-file');

                    photoPreview.innerHTML = `
                        <div class="photo-preview">
                            <img src="${e.target.result}" alt="Preview">
                            <button type="button" class="remove-photo" onclick="removePhoto()"><i class="fa fa-close" style="font-size:14px"></i></button>
                        </div>
                        </div>
                    `;
                };

                reader.readAsDataURL(file);
            }
        }

        function removePhoto() {
            photoInput.value = '';
            photoUploadArea.innerHTML = `
                <div class="photo-upload-icon">
                    <i class="fa-solid fa-image"></i>
                </div>
                <div class="photo-upload-text">Upload a photo of the found item</div>
                <div class="photo-upload-help">JPG, PNG, or GIF (Max 2MB)</div>
            `;
            photoUploadArea.classList.remove('has-file');
            photoPreview.innerHTML = '';
        }

        // Prevent form submission if required fields are empty
        document.querySelector('form').addEventListener('submit', function(e) {
            const itemName = document.getElementById('item_name').value.trim();
            const categoryId = document.getElementById('category_id').value;
            const dateLost = document.getElementById('date_lost').value;
            const locationLost = document.getElementById('location_lost').value.trim();
            const description = document.getElementById('description').value.trim();

            if (!itemName || !categoryId || !dateLost || !locationLost || !description) {
                e.preventDefault();
                alert('Please fill out all required fields');
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
<?php endif; ?><?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/user/report_lost.blade.php ENDPATH**/ ?>