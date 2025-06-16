<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>New Vendor Booking</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f6f9fb;
      margin: 0;
      padding: 0;
    }
    .email-wrapper {
      max-width: 700px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
    }
    .header {
      background: linear-gradient(90deg, #F0F6F8 0%, #DDE4E6 0.01%);
      padding: 20px;
      text-align: center;
    }
    .header img {
      max-width: 150px;
    }
    .content {
      padding: 30px;
      color: #333;
      font-size: 16px;
      line-height: 1.6;
    }
    .section-title {
      font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
      color: #000;
    }
    .footer {
      background: linear-gradient(90deg, #F0F6F8 0%, #DDE4E6 0.01%);
      padding: 20px;
      font-size: 12px;
      text-align: center;
      color: #777;
    }
    a {
      color: #007BFF;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>
  <div class="email-wrapper">
    <!-- Header -->
    <div class="header">
      <img src="{{ asset('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>

    <!-- Content -->
    <div class="content">
      <p>Hi {{ $vendorName }},</p>

      <p>You’ve just received a new booking through <strong>NearbyVouchers</strong>!</p>

      <div class="section-title">📌 Booking Summary:</div>
      <ul>
        <li><strong>Customer:</strong> {{ $customerName ?? 'N/A' }}</li>
        <li><strong>Email:</strong> {{ $customerEmail ?? 'N/A' }}</li>
        <li><strong>Booking ID:</strong> {{ $orderNumber }}</li>
      </ul>

      <div class="section-title">🛒 Items Booked:</div>
      <ul>
        @foreach($items as $item)
          <li>
            <strong>Product:</strong> {{ $item['product_name'] }}<br>
            <strong>Variant:</strong> {{ $item['product_variant_name'] }}<br>
            <strong>Quantity:</strong> {{ $item['quantity'] }}
          </li>
          <br>
        @endforeach
      </ul>

      <p style="margin-top: 20px;">👉 <a href="{{ url('/vendor/login') }}" target="_blank">View Booking in Vendor Portal</a></p>

      <p>If you need any support, reach us at <a href="mailto:support@nearbyvouchers.com">support@nearbyvouchers.com</a>.</p>

      <p>Thanks,<br>
      <strong>Team NearbyVouchers</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
    </div>
  </div>
</body>
</html>
