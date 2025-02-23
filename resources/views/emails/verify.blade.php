<!DOCTYPE html>
<html>
<head>
    <title>Verify Your Email</title>
    <style>
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            font-family: Arial, sans-serif;
        }
        .header {
            background: #4A90E2;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 20px;
            line-height: 1.5;
        }
        .button {
            background: #4A90E2;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 4px;
            display: inline-block;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Welcome to {{ config('app.name') }}!</h1>
        </div>
        <div class="content">
            <h2>Hi {{ $user->name }},</h2>
            <p>Thanks for registering! Please verify your email address to get started.</p>
            
            <a href="{{ url('verify-email/' . $token) }}" class="button">
                Verify Email Address
            </a>

            <p>If you did not create an account, no further action is required.</p>
        </div>
    </div>
</body>
</html>
