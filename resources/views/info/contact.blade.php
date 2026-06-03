<x-layout title="Contact">
    <style slot="styles">
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
            margin-left: 100px;
        }
        .content-card {
            background: white;
            border-radius: 12px;
            padding: 48px 32px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            width: 100%;
        }
        .content-title {
            text-align: center;
            font-size: 32px;
            font-weight: bold;
            color: #2563eb;
            margin-bottom: 32px;
        }
        .content-text {
            color: #1f2937;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 24px;
        }
        .contact-info {
            background: #f3f4f6;
            padding: 24px;
            border-radius: 8px;
            margin: 24px 0;
        }
        .contact-item {
            margin-bottom: 16px;
            display: flex;
            align-items: flex-start;
        }
        .contact-item:last-child {
            margin-bottom: 0;
        }
        .contact-label {
            font-weight: 600;
            color: #2563eb;
            margin-right: 12px;
            min-width: 80px;
        }
        .contact-value {
            color: #1f2937;
        }
        .contact-form {
            margin-top: 24px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-label {
            display: block;
            font-size: 14px;
            font-weight: 500;
            color: #1f2937;
            margin-bottom: 8px;
        }
        .form-input,
        .form-textarea {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 14px;
            transition: border-color 0.2s;
            box-sizing: border-box;
            font-family: inherit;
        }
        .form-input:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #2563eb;
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.1);
        }
        .form-textarea {
            resize: vertical;
            min-height: 120px;
        }
        .submit-button {
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
        }
        .submit-button:hover {
            background-color: #1d4ed8;
        }
    </style>

    <!-- Content Container -->
    <div class="container">
        <div class="content-card">
            <h1 class="content-title">Contact Us</h1>

            <div class="content-text">
                <p>Have a question or need assistance? We'd love to hear from you! Get in touch with the Findit team using the information below or fill out the contact form.</p>
            </div>

            <div class="contact-info">
                <div class="contact-item">
                    <span class="contact-label">Email:</span>
                    <span class="contact-value">support@findit.com</span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Phone:</span>
                    <span class="contact-value">1-800-FINDIT-1 (1-800-346-3481)</span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Hours:</span>
                    <span class="contact-value">Monday - Friday, 9:00 AM - 6:00 PM (UTC-5)</span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Address:</span>
                    <span class="contact-value">123 Lost & Found Street, Community City, CC 12345</span>
                </div>
            </div>

            <div class="content-text">
                <p>Or send us a message using the form below:</p>
            </div>

            <form class="contact-form" method="POST" action="#">
                @csrf
                
                <div class="form-group">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Subject</label>
                    <input type="text" name="subject" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Message</label>
                    <textarea name="message" class="form-textarea" required></textarea>
                </div>

                <button type="submit" class="submit-button">Send Message</button>
            </form>

            <div style="text-align: center; margin-top: 32px;">
                <a href="/" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.2s;">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-layout>
