<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Found Item - Findit</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
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
            max-width: 700px;
            margin: 40px auto;
            padding: 0 16px;
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

        .photo-upload-icon {
            font-size: 48px;
            color: #2563eb;
            margin-bottom: 12px;
}

        /* Card Styles */
        .card {
            background: white;
            border-radius: 8px;
            padding: 32px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            border: 1px solid #e5e7eb;
        }

        .card-title {
            font-size: 18px;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .card-subtitle {
            font-size: 14px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        /* Form Styles */
        .form-group {
            margin-bottom: 24px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #1f2937;
            font-size: 14px;
        }

        .form-group label .required {
            color: #ef4444;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 14px 16px;  /* ← mas malaki ang padding */
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 16px;  /* ← pinalaki */
            font-family: inherit;
            transition: border-color 0.2s, box-shadow 0.2s;
        }

        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }

        .form-group select option {
            font-size: 40px;
            padding: 12px;
        }

        .form-group textarea {
            resize: vertical;
            min-height: 120px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        @media (max-width: 640px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        /* Error Messages */
        .error-message {
            color: #ef4444;
            font-size: 13px;
            margin-top: 6px;
            display: block;
        }

        .alert {
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
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

        .alert-errors {
            background-color: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 16px;
        }

        .alert-errors ul {
            margin-left: 20px;
            margin-top: 8px;
        }

        .alert-errors li {
            margin-bottom: 4px;
        }

        /* Form Input with Error */
        .form-group input.error,
        .form-group select.error,
        .form-group textarea.error {
            border-color: #ef4444;
            background-color: #fef2f2;
        }

        /* Photo Upload */
        .photo-upload-area {
            border: 2px dashed #d1d5db;
            border-radius: 6px;
            padding: 32px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
            position: relative;
            overflow: hidden;
        }

        .photo-upload-area:hover {
            border-color: #2563eb;
            background-color: #f0f9ff;
        }

        .photo-upload-area.has-file {
            border-color: #10b981;
            background-color: #f0fdf4;
        }

        .photo-upload-icon {
            font-size: 48px;
            margin-bottom: 12px;
        }

        .photo-upload-text {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .photo-upload-help {
            color: #9ca3af;
            font-size: 12px;
        }

        .photo-preview {
            position: relative;
            display: inline-block;
            margin-top: 16px;
        }

        .photo-preview img {
            max-width: 200px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        .remove-photo {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #10b981;
            color: white;
            border: none;
            border-radius: 50%;
            width: 28px;
            height: 28px;
            cursor: pointer;
            font-weight: 600;
            font-size: 18px;
            transition: background-color 0.2s;
        }

        .remove-photo:hover {
            background-color: #dc2626;
        }

        /* Buttons */
        .button-group {
            display: flex;
            gap: 12px;
            margin-top: 32px;
            flex-wrap: wrap;
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
            flex: 1;
            min-width: 150px;
        }

        .btn-primary {
            background-color: #2563eb;
            color: white;
        }

        .btn-primary:hover {
            background-color: #1d4ed8;
        }

        .btn-primary:disabled {
            background-color: #9ca3af;
            cursor: not-allowed;
        }

        .btn-secondary {
            background-color: #e5e7eb;
            color: #1f2937;
        }

        .btn-secondary:hover {
            background-color: #d1d5db;
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

            .card {
                padding: 16px;
            }

            .page-header h1 {
                font-size: 24px;
            }

            .form-row {
                grid-template-columns: 1fr;
            }

            .button-group {
                flex-direction: column;
            }

            .btn {
                flex: none;
            }
        }
    </style>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <a href="{{ route('home') }}" class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></a>
        <ul class="navbar-nav">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('home') }}#browse">Browse</a></li>
            <li><a href="{{ route('report.found') }}">Report Found</a></li>
            <li><a href="{{ route('report.lost') }}">Report Lost</a></li>
        </ul>
        <div class="navbar-right">
            @if(Auth::check())
                <span style="color: #6b7280; font-size: 14px;">{{ Auth::user()->name ?? 'User' }}</span>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; color: #10b981; cursor: pointer; font-weight: 500; font-size: 14px;">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="nav-link-login">Login</a>
            @endif
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1>Report a found item</h1>
        </div>

        <!-- Card -->
        <div class="card">
            <div class="card-title">Found item details</div>
            <div class="card-subtitle">Fill out the form below to report your found item.</div>

            @if ($errors->any())
                <div class="alert alert-errors">
                    <strong>Please fix the following errors:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('report.found.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Type (Hidden - Always "Found") -->
                <div class="form-group" style="display: none;">
                    <input type="hidden" name="type" value="Found">
                </div>

                <!-- Item Name -->
                <div class="form-group">
                    <label for="item_name">Item name <span class="required">*</span></label>
                    <input
                        type="text"
                        id="item_name"
                        name="item_name"
                        placeholder="e.g. Set of 3 keys with red keychain"
                        value="{{ old('item_name') }}"
                        class="@error('item_name') error @enderror"
                    >
                    @error('item_name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Category and Date Found (Row) -->
                <div class="form-row">
                    <div class="form-group">
                        <label for="category_id">Category <span class="required">*</span></label>
                        <select
                            id="category_id"
                            name="category_id"
                            class="@error('category_id') error @enderror"
                        >
                            <option value="">Select a category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" @selected(old('category_id') == $category->id)>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_found">Date found <span class="required">*</span></label>
                        <input
                            type="date"
                            id="date_found"
                            name="date_found"
                            value="{{ old('date_found') }}"
                            class="@error('date_found') error @enderror"
                        >
                        @error('date_found')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <!-- Where you found it -->
                <div class="form-group">
                    <label for="location_found">Where you found it? <span class="required">*</span></label>
                    <input
                        type="text"
                        id="location_found"
                        name="location_found"
                        placeholder="e.g. Near the cafeteria, table 5"
                        value="{{ old('location_found') }}"
                        class="@error('location_found') error @enderror"
                    >
                    @error('location_found')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Where it is now (surrender location) -->
                <div class="form-group">
                    <label for="location_current">Where it is now (surrender location) <span class="required">*</span></label>
                    <input
                        type="text"
                        id="location_current"
                        name="location_current"
                        placeholder="e.g. Guard post, main entrance"
                        value="{{ old('location_current') }}"
                        class="@error('location_current') error @enderror"
                    >
                    @error('location_current')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Description -->
                <div class="form-group">
                    <label for="description">Description <span class="required">*</span></label>
                    <textarea
                        id="description"
                        name="description"
                        placeholder="Provide detailed description of the found item..."
                        class="@error('description') error @enderror"
                    >{{ old('description') }}</textarea>
                    @error('description')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Photo Upload -->
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <div class="photo-upload-area" id="photoUploadArea">
                        
                        <div class="photo-upload-icon">
                            <i class="fa-solid fa-image"></i>
                        </div>

                        <div class="photo-upload-text">Upload a photo of the found item</div>
                        <div class="photo-upload-help">JPG, PNG, or GIF</div>
                    </div>
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        style="display: none;"
                        class="@error('photo') error @enderror"
                    >
                    <div id="photoPreview"></div>
                    @error('photo')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="button-group">
                    <button type="submit" class="btn btn-primary">Report found item</button>
                    <a href="{{ route('home') }}" class="btn btn-secondary">Cancel</a>
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
            const dateFound = document.getElementById('date_found').value;
            const locationFound = document.getElementById('location_found').value.trim();
            const locationCurrent = document.getElementById('location_current').value.trim();
            const description = document.getElementById('description').value.trim();

            if (!itemName || !categoryId || !dateFound || !locationFound || !locationCurrent || !description) {
                e.preventDefault();
                alert('Please fill out all required fields');
            }
        });
    </script>
</body>
</html>
