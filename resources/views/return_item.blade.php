<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Return an Item - Findit</title>
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

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
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
            border: 2px dashed #d1d5db;
            border-radius: 8px;
            padding: 32px 16px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s;
        }

        .upload-area:hover {
            border-color: #2563eb;
            background-color: #f0f9ff;
        }

        .upload-area.active {
            border-color: #2563eb;
            background-color: #f0f9ff;
        }

        .upload-icon {
            font-size: 48px;
            color: #d1d5db;
            margin-bottom: 12px;
        }

        .upload-text {
            color: #6b7280;
            font-size: 14px;
        }

        .upload-input {
            display: none;
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
</head>
<body>
    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('home') }}" class="navbar-logo">Find<span class="navbar-logo-highlight">it</span></a>
        
        @if (Auth::check())
            <ul class="navbar-nav">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('home') }}#browse">Browse</a></li>
                <li><a href="{{ route('report.found') }}">Report Found</a></li>
                <li><a href="{{ route('report.lost') }}">Report Lost</a></li>
                <li><a href="{{ route('history.index') }}">My History</a></li>
            </ul>
            <div class="navbar-right">
                <a href="{{ route('profile') }}" class="user-avatar" title="View Profile">{{ substr(Auth::user()->name, 0, 1) }}</a>
                <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                    @csrf
                    <button type="submit" class="nav-link-logout">Logout</button>
                </form>
            </div>
        @endif
    </div>

    <!-- Main Content -->
    <div class="container">
        <h1 class="page-title">Return an Item</h1>

        <!-- Item Details Card -->
        <div class="card">
            <div class="card-title">Item Details</div>
            
            <div class="item-detail-row">
                <div class="item-detail-label">Item:</div>
                <div class="item-detail-value">{{ $item->name }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Description:</div>
                <div class="item-detail-value">{{ $item->description }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Lost at:</div>
                <div class="item-detail-value">{{ $item->location }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Date lost:</div>
                <div class="item-detail-value">{{ $item->date_reported->format('m/d/Y') }}</div>
            </div>
        </div>

        <!-- Return Item Form Card -->
        <div class="card">
            <div class="card-title">Return Item Form</div>
            
            <div class="form-hint">Important: Please provide proof of found item. This will be reviewed by our administrators. False report may result in account suspension.</div>

            <form action="{{ route('return.store') }}" method="POST" enctype="multipart/form-data" id="returnForm">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email" class="form-label">
                            Contact Email <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="contact_email" 
                            name="contact_email" 
                            class="form-input @error('contact_email') error @enderror" 
                            placeholder="your.email@example.com"
                            value="{{ old('contact_email', Auth::user()->email ?? '') }}"
                            required
                        >
                        @error('contact_email')
                            <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="contact_number" class="form-label">
                            Contact Phone <span class="required">*</span>
                        </label>
                        <input 
                            type="tel" 
                            id="contact_number" 
                            name="contact_number" 
                            class="form-input @error('contact_number') error @enderror" 
                            placeholder="0900-000-0000"
                            value="{{ old('contact_number', Auth::user()->phone_number ?? '') }}"
                            required
                        >
                        @error('contact_number')
                            <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="proof_upload" class="form-label">
                        Upload proof of found item <span class="required">*</span>
                    </label>
                    <div class="form-hint">Upload photos, receipts, or any documents that prove you found this item</div>
                    <div class="upload-area" id="uploadArea">
                        <div class="upload-icon">📷</div>
                        <div class="upload-text">Upload a photo of the found item</div>
                        <input 
                            type="file" 
                            id="proof_upload" 
                            name="proof_upload" 
                            class="upload-input" 
                            accept="image/*,.pdf,.doc,.docx"
                            required
                        >
                    </div>
                    @error('proof_upload')
                        <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="additional_details" class="form-label">Additional Details</label>
                    <textarea 
                        id="additional_details" 
                        name="additional_details" 
                        class="form-input @error('additional_details') error @enderror" 
                        placeholder="Any additional details about the item or where you found it..."
                        rows="4"
                        style="resize: vertical; font-family: inherit;"
                    >{{ old('additional_details') }}</textarea>
                    @error('additional_details')
                        <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">Submit</button>
                    <a href="{{ route('home') }}#browse" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // File upload drag and drop
        const uploadArea = document.getElementById('uploadArea');
        const uploadInput = document.getElementById('proof_upload');

        uploadArea.addEventListener('click', () => {
            uploadInput.click();
        });

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('active');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('active');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('active');
            uploadInput.files = e.dataTransfer.files;
            
            // Update the display with file name
            updateFileDisplay();
        });

        uploadInput.addEventListener('change', () => {
            updateFileDisplay();
        });

        function updateFileDisplay() {
            if (uploadInput.files.length > 0) {
                // Find or create the display element
                let fileDisplay = uploadArea.querySelector('.file-display');
                if (!fileDisplay) {
                    fileDisplay = document.createElement('div');
                    fileDisplay.className = 'file-display';
                    uploadArea.appendChild(fileDisplay);
                }
                fileDisplay.innerHTML = `
                    <div class="upload-icon">✓</div>
                    <div class="upload-text">${uploadInput.files[0].name}</div>
                `;
            }
        }
    </script>
</body>
</html>
