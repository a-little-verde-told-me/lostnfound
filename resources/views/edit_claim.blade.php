<x-layout title="Re-submit Claim">
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
            max-width: 800px;
            margin: 0 auto;
            padding: 40px 20px;
            margin-top: 100px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .page-subtitle {
            color: #6b7280;
            margin-bottom: 24px;
        }

        .card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            margin-bottom: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            font-size: 18px;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 20px;
        }

        .item-detail-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .item-detail-row:last-child {
            border-bottom: none;
        }

        .item-detail-label {
            font-weight: 600;
            color: #6b7280;
            font-size: 14px;
        }

        .item-detail-value {
            color: #1f2937;
            font-size: 14px;
        }

        .form-hint {
            background-color: #eff6ff;
            border-left: 3px solid #2563eb;
            padding: 12px 16px;
            border-radius: 6px;
            margin-bottom: 20px;
            color: #1e40af;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #1f2937;
            margin-bottom: 8px;
            font-size: 14px;
        }

        .required {
            color: #ef4444;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 10px 12px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 14px;
            font-family: inherit;
        }

        .form-textarea {
            resize: vertical;
            min-height: 100px;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
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

        .current-file {
            margin-top: 12px;
            padding: 12px;
            background-color: #f3f4f6;
            border-radius: 6px;
            font-size: 13px;
            color: #374151;
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

        .error-message {
            color: #ef4444;
            font-size: 12px;
            margin-top: 4px;
        }

        .alert-error {
            background: #fee2e2;
            border: 1px solid #ef4444;
            color: #991b1b;
            padding: 16px;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .alert-error strong {
            display: block;
            font-size: 15px;
            margin-bottom: 6px;
        }

        .alert-error ul {
            margin: 0;
            padding-left: 20px;
            font-size: 14px;
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

            .form-row {
                grid-template-columns: 1fr;
            }

            .form-actions {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }

            .container {
                padding: 20px 16px;
            }

            .page-title {
                font-size: 24px;
            }
        }
    </style>

    <div class="container">
        <h1 class="page-title">Re-submit Your Claim</h1>
        <p class="page-subtitle">Your previous claim was rejected. Please provide better proof of ownership and try again.</p>

        <!-- Item Details Card -->
        <div class="card">
            <div class="card-title">Item Details</div>
            
            <div class="item-detail-row">
                <div class="item-detail-label">Item:</div>
                <div class="item-detail-value">{{ $claim->item->name }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Description:</div>
                <div class="item-detail-value">{{ $claim->item->description }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Category:</div>
                <div class="item-detail-value">{{ $claim->item->category?->name ?? 'Uncategorized' }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Found at:</div>
                <div class="item-detail-value">{{ $claim->item->found_location ?? 'Not specified' }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Surrender location:</div>
                <div class="item-detail-value">{{ $claim->item->surrender_location ?? 'Guard post, main entrance' }}</div>
            </div>

            <div class="item-detail-row">
                <div class="item-detail-label">Date found:</div>
                <div class="item-detail-value">{{ $claim->item->created_at->format('m/d/Y') }}</div>
            </div>
        </div>

        <!-- Admin Feedback Card -->
        @if ($claim->admin_feedback)
            <div class="card" style="border-left: 3px solid #dc2626; background-color: #fef2f2;">
                <div class="card-title" style="color: #dc2626;">Admin Feedback</div>
                <p style="color: #991b1b; line-height: 1.6;">{{ $claim->admin_feedback }}</p>
            </div>
        @endif

        @if (session('error') || $errors->any())
            <div class="alert-error">
                <strong>Submission Failed:</strong>
                <ul>
                    @if(session('error'))
                        <li>{{ session('error') }}</li>
                    @endif
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Edit Claim Form Card -->
        <div class="card">
            <div class="card-title">Update Your Claim</div>
            
            <div class="form-hint">Please provide more detailed proof of ownership. Consider adding better descriptions, additional documents, or photos that clearly show you own this item.</div>

            <form action="{{ route('claim.update', $claim->id) }}" method="POST" enctype="multipart/form-data" id="editClaimForm">
                @csrf
                @method('PUT')

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
                    >{{ old('proof_description', $claim->proof_description) }}</textarea>
                    @error('proof_description')
                        <span class="error-message">{{ $message }}</span>
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
                            value="{{ old('contact_email', $claim->contact_email) }}"
                            required
                        >
                        @error('contact_email')
                            <span class="error-message">{{ $message }}</span>
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
                            value="{{ old('phone_number', $claim->contact_number) }}"
                            required
                        >
                        @error('phone_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label for="proof_upload" class="form-label">
                        Upload proof of ownership <span class="required">*</span> (Optional)
                    </label>
                    <div class="form-hint">Upload new photos, receipts, or documents that prove you own this item. Leave empty to keep your current proof.</div>
                    <div class="upload-area" id="uploadArea">
                        <div id="uploadDisplay" class="upload-display">
                            <div class="upload-text">Click or drag to upload new proof</div>
                        </div>
                        <input 
                            type="file" 
                            id="proof_upload" 
                            name="proof_upload" 
                            class="upload-input" 
                            accept="image/*,.pdf,.doc,.docx"
                        >
                    </div>
                    @if ($claim->image)
                        <div class="current-file">
                            ✓ Current proof file: {{ basename($claim->image) }}
                        </div>
                    @endif
                    @error('proof_upload')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-actions">
                    <button type="submit" class="btn btn-submit">Re-submit Claim</button>
                    <a href="{{ route('history.index') }}" class="btn btn-cancel">Cancel</a>
                </div>
            </form>
        </div>
    </div>

    <script>
        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const uploadInput = document.getElementById('proof_upload');
        const uploadDisplay = document.getElementById('uploadDisplay');

        uploadArea.addEventListener('click', () => uploadInput.click());

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
            updateUploadDisplay();
        });

        uploadInput.addEventListener('change', updateUploadDisplay);

        function updateUploadDisplay() {
            if (uploadInput.files.length > 0) {
                const fileName = uploadInput.files[0].name;
                uploadDisplay.innerHTML = `<div style="color: #059669; font-weight: 600;">✓ ${fileName}</div>`;
            } else {
                uploadDisplay.innerHTML = `
                    <div class="upload-icon">📷</div>
                    <div class="upload-text">Click or drag to upload new proof</div>
                `;
            }
        }
    </script>
</x-layout>
