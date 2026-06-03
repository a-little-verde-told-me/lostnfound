<x-layout title="Claim an Item">
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

        .upload-display {
            pointer-events: none;
        }

        .upload-display.hidden {
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

    <div class="container">
        <h1 class="page-title">Claim Item</h1>

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
                <div class="item-detail-label">Category:</div>
                <div class="item-detail-value">{{ $item->category?->name ?? 'Uncategorized' }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Found at:</div>
                <div class="item-detail-value">{{ $item->location }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Surrender location:</div>
                <div class="item-detail-value">{{ $item->surrender_location ?? 'Guard post, main entrance' }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Date found:</div>
                <div class="item-detail-value">{{ $item->date_reported->format('m/d/Y') }}</div>
            </div>
        </div>

        @if (session('error') || $errors->any())
    <div style="background: #fee2e2; border: 1px solid #ef4444; color: #991b1b; padding: 16px; border-radius: 8px; margin-bottom: 20px;">
        <strong style="display: block; font-size: 15px; margin-bottom: 6px;">Submission Failed:</strong>
        <ul style="margin: 0; padding-left: 20px; font-size: 14px;">
            @if(session('error'))
                <li>{{ session('error') }}</li>
            @endif
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

        <!-- Claim Item Form Card -->
        <div class="card">
            <div class="card-title">Claim Item Form</div>
            
            <div class="form-hint">Important: Please provide detailed proof of ownership. Your claim will be reviewed by our administrators. False claims may result in account suspension.</div>

            <form action="{{ route('claim.store') }}" method="POST" enctype="multipart/form-data" id="claimForm">
                @csrf
                <input type="hidden" name="item_id" value="{{ $item->id }}">

                <div class="form-group">
                    <label for="proof_description" class="form-label">
                        Proof of ownership description <span class="required">*</span>
                    </label>
                    <textarea 
                        id="proof_description" 
                        name="proof_description" 
                        class="form-input @error('proof_description') error @enderror" 
                        placeholder="Describe what makes this item yours (e.g., unique identifiers, contents, serial numbers, purchase details, etc.)"
                        rows="4"
                        style="resize: vertical; font-family: inherit;"
                        required
                    >{{ old('proof_description') }}</textarea>
                    @error('proof_description')
                        <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="contact_email" class="form-label">
                            Email <span class="required">*</span>
                        </label>
                        <input 
                            type="email" 
                            id="contact_email" 
                            name="contact_email" 
                            class="form-input @error('contact_email') error @enderror" 
                            value="{{ Auth::user()->email }}"
                            required
                        >
                        @error('contact_email')
                            <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phone_number" class="form-label">
                            Phone Number <span class="required">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="phone_number" 
                            name="phone_number" 
                            class="form-input @error('phone_number') error @enderror" 
                            value="{{ Auth::user()->phone_number ?? '' }}"
                            required
                        >
                        @error('phone_number')
                            <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="proof_upload" class="form-label">
                        Upload proof of ownership <span class="required">*</span>
                    </label>
                    <div class="form-hint">Upload photos, receipts, or any documents that prove you own this item</div>
                    <div class="upload-area" id="uploadArea">
                        <div id="uploadDisplay" class="upload-display">
                            <div class="upload-icon">📷</div>
                            <div class="upload-text">Upload a photo of the owned item</div>
                        </div>
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

                <!-- <div class="form-group">
                    <label for="additional_details" class="form-label">Additional Details</label>
                    <textarea 
                        id="additional_details" 
                        name="additional_details" 
                        class="form-input @error('additional_details') error @enderror" 
                        placeholder="Any additional information about the item or how you lost it..."
                        rows="4"
                        style="resize: vertical; font-family: inherit;"
                    >{{ old('additional_details') }}</textarea>
                    @error('additional_details')
                        <span style="color: #ef4444; font-size: 12px;">{{ $message }}</span>
                    @enderror
                </div> -->

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
        const uploadDisplay = document.getElementById('uploadDisplay');
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
            updateFileDisplay();
        });

        uploadInput.addEventListener('change', () => {
            updateFileDisplay();
        });

        function updateFileDisplay() {
            if (uploadInput.files.length > 0) {
                uploadDisplay.innerHTML = `
                    <div class="upload-icon">✓</div>
                    <div class="upload-text">${uploadInput.files[0].name}</div>
                `;
            }
        }
    </script>
</x-layout>
