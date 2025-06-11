<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Forgot Password Email</title>
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

    .btn {
      display: inline-block;
      padding: 10px 20px;
      margin-top: 20px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
    }

    .btn:hover {
      background-color: #0056b3;
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

      <p>We received a request to reset your password. You can reset your password by clicking the button below:</p>

      <p style="text-align: center;">
        <a href="{{ route('vendor.password.reset', $token) }}" class="btn">Reset Password</a>
      </p>

      <p>If you didn’t request a password reset, please ignore this email. This link will expire in 60 minutes.</p>

      <p>Best regards,<br>
      <strong>The NearBy Vouchers Team</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights Reserved
    </div>
  </div>
</body>
</html>
