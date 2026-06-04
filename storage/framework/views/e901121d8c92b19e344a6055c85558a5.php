<?php if (isset($component)) { $__componentOriginal23a33f287873b564aaf305a1526eada4 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal23a33f287873b564aaf305a1526eada4 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.layout','data' => ['title' => 'Admin Login']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => 'Admin Login']); ?>
    <style slot="styles">
        .login-container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .login-card {
            background: white;
            border-radius: 12px;
            padding: 48px 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 450px;
            width: 100%;
        }
        .login-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 32px;
        }
        .form-group {
            margin-bottom: 24px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .form-input {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
            box-sizing: border-box;
        }
        .form-input:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .forgot-link {
            text-align: right;
            margin-top: 8px;
        }
        .forgot-link a {
            font-size: 13px;
            color: #2563eb;
            text-decoration: none;
        }
        .forgot-link a:hover {
            text-decoration: underline;
        }
        .login-button {
            width: 100%;
            padding: 12px 16px;
            background-color: #2563eb;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.2s;
            margin-top: 24px;
        }
        .login-button:hover {
            background-color: #1d4ed8;
        }
        .signup-link {
            text-align: center;
            margin-top: 24px;
            color: #6b7280;
        }
        .signup-link a {
            color: #2563eb;
            text-decoration: none;
            font-weight: 500;
        }
        .signup-link a:hover {
            text-decoration: underline;
        }
        .divider {
            display: flex;
            align-items: center;
            margin: 32px 0;
        }
        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e5e7eb;
        }
        .divider-text {
            padding: 0 12px;
            color: #9ca3af;
            font-size: 13px;
        }
        .user-link {
            text-align: center;
            margin-top: 16px;
        }
        .user-link a {
            color: #2563eb;
            text-decoration: none;
            font-size: 14px;
        }
        .user-link a:hover {
            text-decoration: underline;
        }
        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <h1 class="login-title">Login as Admin</h1>

            <form method="POST" action="<?php echo e(route('admin.login.post')); ?>">
                <?php echo csrf_field(); ?>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" value="<?php echo e(old('email')); ?>" required>
                    <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error-message"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-input" required>
                    <div class="forgot-link">
                        <a href="#">Forgot password?</a>
                    </div>
                </div>

                <button type="submit" class="login-button">Login</button>
            </form>

            <div class="divider">
                <span class="divider-text">or</span>
            </div>

            <div class="user-link">
                <a href="<?php echo e(route('login')); ?>">Go back to user login</a>
            </div>
        </div>
    </div>
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
<?php /**PATH C:\Users\Ian Derilo\Herd\lostnfound\resources\views/auth/admin_login.blade.php ENDPATH**/ ?>