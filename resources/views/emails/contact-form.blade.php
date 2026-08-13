<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New Contact Form Submission</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }
        .header {
            background-color: #2c9fe0;
            color: white;
            padding: 20px;
            text-align: center;
            border-radius: 5px 5px 0 0;
        }
        .content {
            background-color: #f9f9f9;
            padding: 30px;
            border: 1px solid #ddd;
        }
        .field {
            margin-bottom: 20px;
            padding: 15px;
            background-color: white;
            border-left: 4px solid #2c9fe0;
        }
        .field-label {
            font-weight: bold;
            color: #2c9fe0;
            margin-bottom: 5px;
            display: block;
        }
        .field-value {
            color: #333;
            margin-top: 5px;
        }
        .footer {
            background-color: #f0f0f0;
            padding: 15px;
            text-align: center;
            font-size: 12px;
            color: #666;
            border: 1px solid #ddd;
            border-top: none;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>New Contact Form Submission</h1>
    </div>
    
    <div class="content">
        <p>You have received a new contact form submission from your website.</p>
        
        <div class="field">
            <span class="field-label">Name:</span>
            <div class="field-value">{{ $name }}</div>
        </div>
        
        <div class="field">
            <span class="field-label">Email:</span>
            <div class="field-value">{{ $email }}</div>
        </div>
        
        <div class="field">
            <span class="field-label">Phone:</span>
            <div class="field-value">{{ $phone }}</div>
        </div>
        
        <div class="field">
            <span class="field-label">Purpose:</span>
            <div class="field-value">{{ $purpose }}</div>
        </div>
        
        <div class="field">
            <span class="field-label">Message/Comment:</span>
            <div class="field-value" style="white-space: pre-wrap;">{{ $comment }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>This email was sent from the contact form on your website.</p>
        <p>Please do not reply to this email. Contact the user directly at: {{ $email }}</p>
    </div>
</body>
</html>

