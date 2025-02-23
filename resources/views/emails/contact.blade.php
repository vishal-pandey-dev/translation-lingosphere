<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Contact Message</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background: #f8f9fa;
            padding: 20px;
            text-align: center;
            border-bottom: 3px solid #dc3545;
        }
        .content {
            padding: 20px;
            background: #ffffff;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
        }
        .info-item {
            margin-bottom: 10px;
        }
        .label {
            font-weight: bold;
            color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h2>New Contact Message</h2>
        </div>
        
        <div class="content">
            <div class="info-item">
                <span class="label">Name:</span> 
                <span>{{ $data['fullname'] }}</span>
            </div>
            
            <div class="info-item">
                <span class="label">Email:</span> 
                <span>{{ $data['email'] }}</span>
            </div>
            
            @if(isset($data['phone']))
            <div class="info-item">
                <span class="label">Phone:</span> 
                <span>{{ $data['phone'] }}</span>
            </div>
            @endif
            
            @if(isset($data['service']))
            <div class="info-item">
                <span class="label">Service:</span> 
                <span>{{ $data['service'] }}</span>
            </div>
            @endif
            
            <div class="info-item">
                <span class="label">Message:</span><br>
                <p>{{ $data['message'] }}</p>
            </div>
            
            @if(isset($data['attachment']))
            <div class="info-item">
                <span class="label">Attachment:</span><br>
                <a href="{{ asset($data['attachment']) }}">View Attachment</a>
            </div>
            @endif
        </div>
        
        <div class="footer">
            <p>This email was sent from {{ config('app.name') }} contact form</p>
        </div>
    </div>
</body>
</html>
