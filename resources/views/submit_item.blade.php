<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>FindIt – Claim Item</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    body {
      font-family: 'Inter', sans-serif;
      background: #f0f0f0;
      color: #1a1a1a;
      min-height: 100vh;
    }

    /* ── NAV ── */
    nav {
      background: #fff;
      border-bottom: 1px solid #e8e8e8;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 40px;
      height: 60px;
    }

    .logo {
      font-size: 22px;
      font-weight: 700;
      color: #1a1a1a;
      text-decoration: none;
      letter-spacing: -0.5px;
    }

    .logo span { color: #3b82f6; }

    .nav-links {
      display: flex;
      align-items: center;
      gap: 32px;
      list-style: none;
    }

    .nav-links a {
      text-decoration: none;
      color: #374151;
      font-size: 14px;
      font-weight: 500;
    }

    .nav-links a:hover { color: #1a1a1a; }

    .nav-right {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .avatar {
      width: 36px;
      height: 36px;
      background: #d1d5db;
      border-radius: 50%;
    }

    .logout-btn {
      background: none;
      border: none;
      color: #ef4444;
      font-size: 14px;
      font-weight: 500;
      cursor: pointer;
      font-family: inherit;
    }

    /* ── MAIN ── */
    main {
      max-width: 640px;
      margin: 48px auto;
      padding: 0 16px;
      display: flex;
      flex-direction: column;
      gap: 24px;
    }

    h1 {
      text-align: center;
      font-size: 26px;
      font-weight: 700;
      color: #3b82f6;
      letter-spacing: -0.5px;
      margin-bottom: 4px;
    }

    /* ── CARDS ── */
    .card {
      background: #fff;
      border-radius: 16px;
      padding: 28px 32px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.07);
    }

    .card h2 {
      font-size: 17px;
      font-weight: 700;
      margin-bottom: 18px;
      color: #111;
    }

    /* Item Details */
    .details-grid {
      display: flex;
      flex-direction: column;
      gap: 10px;
    }

    .detail-row {
      font-size: 14px;
      color: #374151;
      line-height: 1.5;
    }

    .detail-row strong {
      font-weight: 600;
      color: #111;
    }

    /* ── FORM ── */
    .form-subtitle {
      font-size: 13px;
      font-style: italic;
      color: #6b7280;
      margin-bottom: 22px;
      line-height: 1.5;
    }

    .field {
      display: flex;
      flex-direction: column;
      gap: 6px;
      margin-bottom: 20px;
    }

    label {
      font-size: 14px;
      font-weight: 600;
      color: #111;
    }

    label .req {
      color: #ef4444;
      margin-left: 2px;
    }

    textarea, input[type="text"], input[type="email"], input[type="tel"] {
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      color: #374151;
      background: #fff;
      border: 1.5px solid #d1d5db;
      border-radius: 8px;
      padding: 12px 14px;
      width: 100%;
      outline: none;
      transition: border-color 0.18s;
    }

    textarea {
      resize: vertical;
      min-height: 110px;
    }

    textarea:focus, input:focus {
      border-color: #3b82f6;
    }

    textarea::placeholder, input::placeholder {
      color: #9ca3af;
    }

    .fields-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
      margin-bottom: 20px;
    }

    .fields-row .field { margin-bottom: 0; }

    /* phone wrapper */
    .phone-wrap {
      position: relative;
    }

    .phone-wrap input { padding-right: 42px; }

    .phone-icon {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      color: #9ca3af;
      pointer-events: none;
    }

    /* upload zone */
    .upload-zone {
      border: 2px dashed #d1d5db;
      border-radius: 10px;
      padding: 40px 20px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      gap: 10px;
      cursor: pointer;
      background: #fafafa;
      transition: border-color 0.18s, background 0.18s;
    }

    .upload-zone:hover {
      border-color: #3b82f6;
      background: #eff6ff;
    }

    .upload-zone input[type="file"] { display: none; }

    .upload-icon {
      color: #9ca3af;
    }

    .upload-label {
      font-size: 13px;
      color: #6b7280;
    }

    /* buttons */
    .btn-row {
      display: flex;
      gap: 16px;
      justify-content: center;
      margin-top: 10px;
    }

    .btn {
      padding: 14px 0;
      width: 200px;
      border: none;
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 15px;
      font-weight: 600;
      cursor: pointer;
      transition: opacity 0.15s, transform 0.1s;
    }

    .btn:active { transform: scale(0.97); }

    .btn-primary {
      background: #3b82f6;
      color: #fff;
    }

    .btn-primary:hover { opacity: 0.9; }

    .btn-cancel {
      background: #4b5563;
      color: #fff;
    }

    .btn-cancel:hover { opacity: 0.85; }
  </style>
</head>
<body>

<!-- NAV -->
<nav>
  <a href="#" class="logo">Find<span>it</span></a>
  <ul class="nav-links">
    <li><a href="#">Home</a></li>
    <li><a href="#">Browse</a></li>
    <li><a href="#">Report Found</a></li>
    <li><a href="#">Report Lost</a></li>
    <li><a href="#">My Claims</a></li>
  </ul>
  <div class="nav-right">
    <div class="avatar"></div>
    <button class="logout-btn">Logout</button>
  </div>
</nav>

<!-- MAIN -->
<main>
  <h1>Claim Item</h1>

  <!-- Item Details Card -->
  <div class="card">
    <h2>Item Details</h2>
    <div class="details-grid">
      <div class="detail-row"><strong>Item:</strong> Set of 3 keys with red keychain</div>
      <div class="detail-row"><strong>Description:</strong> 3 keys on a red keychain, one key has a blue rubber cap. Found near table 5 in the cafeteria.</div>
      <div class="detail-row"><strong>Found at:</strong> Near the cafeteria, table 5</div>
      <div class="detail-row"><strong>Surrender location:</strong> Guard post, main entrance</div>
      <div class="detail-row"><strong>Date found:</strong> 05/27/2026</div>
    </div>
  </div>

  <!-- Claim Form Card -->
  <div class="card">
    <h2>Claim Item Form</h2>
    <p class="form-subtitle">Important: Please provide detailed proof of ownership. Your claim will be reviewed by our administrators. False claims may result in account suspension.</p>

    <div class="field">
      <label>Proof of ownership description <span class="req">*</span></label>
      <textarea placeholder="Describe what makes this item yours (e.g., unique identifiers, contents, serial numbers, purchase details, etc.)"></textarea>
    </div>

    <div class="fields-row">
      <div class="field">
        <label>Contact Email <span class="req">*</span></label>
        <input type="email" placeholder="your.email@example.com"/>
      </div>
      <div class="field">
        <label>Contact Phone <span class="req">*</span></label>
        <div class="phone-wrap">
          <input type="tel" placeholder="0900-000-0000"/>
          <svg class="phone-icon" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
            <rect x="5" y="2" width="14" height="20" rx="2" ry="2"/>
            <line x1="12" y1="18" x2="12.01" y2="18"/>
          </svg>
        </div>
      </div>
    </div>

    <div class="field">
      <label>Upload proof of ownership <span class="req">*</span></label>
      <small style="color:#6b7280;font-size:13px;margin-top:-2px;margin-bottom:8px;display:block;">Upload photos, receipts, or any documents that prove you own this item</small>
      <label class="upload-zone" for="file-upload">
        <input type="file" id="file-upload" accept="image/*,.pdf"/>
        <svg class="upload-icon" width="36" height="36" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
          <path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"/>
          <circle cx="12" cy="13" r="4"/>
        </svg>
        <span class="upload-label">Upload a photo of the owned item</span>
      </label>
    </div>

    <div class="btn-row">
      <button class="btn btn-primary">Submit claim</button>
      <button class="btn btn-cancel">Cancel</button>
    </div>
  </div>
</main>

</body>
</html>
