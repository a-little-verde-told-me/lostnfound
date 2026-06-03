<x-layout title="About">
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
        .content-text p {
            margin-bottom: 16px;
        }
        .content-text strong {
            font-weight: 600;
            color: #2563eb;
        }
    </style>

    <!-- Content Container -->
    <div class="container">
        <div class="content-card">
            <h1 class="content-title">About Findit</h1>

            <div class="content-text">
                <p><strong>Findit</strong> is a community-driven platform dedicated to helping people find lost items and report discovered belongings. Our mission is to reunite lost possessions with their rightful owners through efficient categorization and community collaboration.</p>

                <p>Whether you've lost something valuable or found an item that needs to be returned to its owner, Findit makes the process simple and straightforward. Our platform connects people in your community, making it easier to solve the problem of lost and found items.</p>

                <p><strong>Our Features:</strong></p>
                <ul style="margin-left: 20px; margin-bottom: 16px;">
                    <li>Browse items available in your area</li>
                    <li>Report lost or found items with detailed descriptions</li>
                    <li>Categorize items for better searchability</li>
                    <li>Connect with other community members</li>
                    <li>Secure claims and verification process</li>
                </ul>

                <p><strong>Why Choose Findit?</strong></p>
                <p>Findit is committed to making your experience smooth and trustworthy. We believe in the power of community and the importance of helping each other recover what matters most.</p>
            </div>

            <div style="text-align: center; margin-top: 32px;">
                <a href="/" style="display: inline-block; padding: 12px 24px; background-color: #2563eb; color: white; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.2s;">
                    Back to Home
                </a>
            </div>
        </div>
    </div>
</x-layout>
