<x-layout title="Login to FindIt">
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
        .error-message {
            color: #dc2626;
            font-size: 13px;
            margin-top: 4px;
        }
    </style>

    <!-- Login Container -->
    <div class="login-container">
        <div class="login-card">
            <h1 class="login-title">Login</h1>

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
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

            <div class="signup-link">
                No account? <a href="{{ route('signup') }}">Create here</a>
            </div>
        </div>
    </div>
</x-layout>
