<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Contact Us Email</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
    }

    .email-wrapper {
      max-width: 600px;
      margin: 40px auto;
      background-color: #ffffff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      overflow: hidden;
    }

    .header, .footer {
      background: linear-gradient(90deg, #F0F6F8 0%, #DDE4E6 0.01%);
      padding: 20px 30px;
      text-align: center;
    }

    .logo img {
      max-width: 150px;
      height: auto;
    }

    .content {
      padding: 30px;
      font-size: 16px;
      color: #333;
      line-height: 1.6;
    }

    .footer {
      font-size: 12px;
      color: #888;
    }

    a {
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline;
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    
    <!-- Header with Logo -->
    <div class="header">
      <div class="logo">
        <img src="{{ asset('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
      </div>
    </div>

    <!-- Email Body -->
    <div class="content">
      <p>Dear {{ $name }},</p>

      <p>Thank you for reaching out to us! We have received your message and will get back to you within 24 to 48 hours.</p>

      <p>If you need immediate assistance, please email us at 
        <a href="mailto:support@nearbyvouchers.com">support@nearbyvouchers.com</a>.
      </p>

      <p>We appreciate your patience and will respond as soon as possible.</p>

      <p>Best regards,<br>
      Cheers,<br>
      <strong>The NearBy Vouchers Team</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights Reserved
    </div>
  </div>
</body>
</html>
