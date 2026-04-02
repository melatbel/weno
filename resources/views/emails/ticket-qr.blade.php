<!DOCTYPE html>
<html>
<head>
    <title>Your Wennovate Summit Ticket</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 40px auto; background: #ffffff; padding: 40px; border-radius: 10px; text-align: center; box-shadow: 0 4px 10px rgba(0,0,0,0.1); }
        .logo { max-width: 150px; margin-bottom: 20px; }
        h1 { color: #333333; font-size: 24px; margin-bottom: 10px; }
        p { color: #666666; font-size: 16px; line-height: 1.5; margin-bottom: 20px; }
        .ticket-details { background: #f9f9f9; padding: 20px; border-radius: 8px; margin: 20px 0; text-align: left; border: 1px solid #eeeeee; }
        .ticket-details strong { display: inline-block; width: 120px; color: #333333; }
        .qr-code { margin: 30px 0; }
        .qr-code img { max-width: 250px; border: 4px solid #ffffff; box-shadow: 0 0 10px rgba(0,0,0,0.1); border-radius: 10px; }
        .footer { margin-top: 40px; font-size: 12px; color: #999999; }
        .btn { display: inline-block; padding: 12px 24px; background-color: #E6C200; color: #000000; text-decoration: none; font-weight: bold; border-radius: 5px; margin-top: 10px; }
    </style>
</head>
<body>
    <div class="container">
        <!-- Optional: Add Wennovate Logo if you have a public URL -->
        <!-- <img src="https://yourdomain.com/logo.png" alt="Wennovate Summit" class="logo"> -->
        
        <h1>Your Wennovate Summit Ticket</h1>
        <p>Hi {{ $attendee->name }},</p>
        <p>Your booking has been approved! We are excited to see you at the Wennovate Summit. Please find your ticket details and QR code below.</p>
        
        <div class="ticket-details">
            <div><strong>Ticket Type:</strong> {{ $attendee->ticket_type }}</div>
            <div><strong>Email:</strong> {{ $attendee->email }}</div>
            <div><strong>Phone:</strong> {{ $attendee->phone }}</div>
            <div><strong>Date of Purchase:</strong> {{ \Carbon\Carbon::parse($attendee->created_at)->format('F j, Y') }}</div>
        </div>

        <div class="qr-code">
            <p><strong>Present this QR Code for Check-in:</strong></p>
            <img src="{{ $qrUrl }}" alt="Your QR Code">
        </div>

        <p>Important: This QR code can only be scanned once. Do not share it with anyone.</p>

        <div class="footer">
            <p>&copy; {{ date('Y') }} Wennovate Summit. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
