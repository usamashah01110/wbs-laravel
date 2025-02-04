<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Our Platform</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .email-container {
            max-width: 600px;
            margin: 20px auto;
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
        }
        .header {
            text-align: center;
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 8px 8px 0 0;
        }
        .content {
            margin-top: 20px;
        }
        .cta-btn {
            background-color: #007bff;
            color: white !important;
            padding: 10px 25px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer {
            font-size: 12px;
            color: #6c757d;
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>
<div class="email-container">
    <div class="header">
        <h1>Welcome to Our Platform!</h1>
    </div>
    <div class="content">
        <p>Hi {{ $user->name }},</p>
        <p>Thank you for signing up! We're excited to have you on board.</p>
        <p>You can now explore all the amazing features available on our platform.</p>
        <div class="text-center mt-4">
            <a href="{{ route('dashboard') }}" class="cta-btn">Get Started</a>
        </div>
        <p>If you have any questions, feel free to contact our support team.</p>
        <p>Happy exploring!</p>
        <p>— The Team</p>
    </div>
    <div class="footer">
        <p>&copy; {{ date('Y') }} Our Platform. All rights reserved.</p>
    </div>
</div>
</body>
</html>
