<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reply Email</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f3f4f6; margin:0; padding:20px;">

<div style="max-width: 600px; margin: auto; background-color: #ffffff; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); padding: 20px;">

    <!-- Header -->
    <div style="border-bottom: 1px solid #e5e7eb; padding-bottom: 10px; margin-bottom: 20px;">
        <strong>From:</strong> {{ config('app.name') }}<br>
        <strong>To:</strong>{{ $email }}<br>
        <strong>Subject:</strong> {{ $subject }}
    </div>

    <!-- Body -->
    <div style="line-height: 1.6;">
        <p>Hello,</p>
        <p>This is a reply to your email.</p>
        <p>{{ $replayMessage }}</p>
        <p>Best regards,<br>{{ config('app.name') }}</p>
    </div>


    <!-- Footer -->
    <div style="border-top: 1px solid #e5e7eb; margin-top: 20px; padding-top: 10px; font-size: 12px; color: #6b7280;">
        <p>Sent from my email client</p>
    </div>

</div>

</body>
</html>
