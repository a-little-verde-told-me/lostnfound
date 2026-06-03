<x-layout title="Report a Found Item">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Main Container */
        .container {
            max-width: 700px;
            margin: 100px auto;
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
            padding: 14px 16px;
            border: 1px solid #d1d5db;
            border-radius: 6px;
            font-size: 16px;
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
            font-size: 15px;
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

    <div class="container">
        <!-- Page Header -->
        <div class="page-header">
            <h1><strong>Report a found item</strong></h1>
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
                    <input
                        type="file"
                        id="photo"
                        name="photo"
                        accept="image/*"
                        class="@error('photo') error @enderror"
                    >
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
</x-layout>
