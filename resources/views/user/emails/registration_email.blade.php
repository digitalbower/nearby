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

      <p>Welcome aboard! 🎉 We're thrilled to have you as a part of the NearBy Vouchers community.</p>

      <p>Get ready to explore a world of amazing features and services designed just for you. We're here to make your experience awesome, and our support team is always ready to help if you have any questions.</p>

      <p>Don't hesitate to reach out to us anytime at 
        <a href="mailto:info@nearbyvouchers.com">info@nearbyvouchers.com</a>.
      </p>

      <p>Thanks for joining us, and let's make great things happen together!</p>

      <p>
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
