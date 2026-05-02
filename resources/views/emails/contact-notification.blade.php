<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>New Portfolio Contact</title>
</head>
<body style="font-family: Arial, sans-serif; color: #18181b; line-height: 1.6;">
    <h1 style="font-size: 20px; margin-bottom: 16px;">New Portfolio Contact</h1>

    <p><strong>Name:</strong> {{ $contactMessage->name }}</p>
    <p><strong>Email:</strong> {{ $contactMessage->email }}</p>
    <p><strong>Subject:</strong> {{ $contactMessage->subject }}</p>
    <p><strong>Submitted:</strong> {{ $contactMessage->created_at?->format('d M Y H:i') }}</p>

    <hr style="margin: 24px 0; border: 0; border-top: 1px solid #e4e4e7;">

    <p style="white-space: pre-line;">{{ $contactMessage->message }}</p>
</body>
</html>
