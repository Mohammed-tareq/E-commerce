<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Verification OTP</title>
    <link rel="shortcut icon" href="{{ asset('favicon.png') }}" type="image/png">
    <style>
        body {
            background-color: #1f2937;
            color: #e5e7eb;
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #111827;
            padding: 20px;
            border-radius: 8px;
        }
        .button {
            background-color: #3b82f6;
            color: #ffffff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            font-weight: bold;
        }
        .footer {
            font-size: 12px;
            color: #9ca3af;
            text-align: center;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2 style="color: #10b981; text-align: center;">Account Forget Password OTP</h2>
        <p>Hello,</p>
        <p>Thank you for registering! Your OTP for email  is:</p>
        <h3 style="text-align: center; font-size: 36px; color: #ffffff;">{{ $otp }}</h3>
        <p style="text-align: center;">Use this OTP to reset your password.</p>
        <p>If you did not create an account, please ignore this email.</p>
        

    </div>

</body>
</html>
