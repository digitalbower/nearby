<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Report</title>

  <style>
    @page {
      margin: 120px 50px 100px 50px;
    }

    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    .footer {
      position: fixed;
      bottom: -60px; /* push inside printable area */
      left: 0;
      right: 0;
      height: 50px;
      background: #DDE4E6;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #777;
    }
  </style>
</head>
<body>

  <div class="email-wrapper" style="max-width: 700px; margin: 0 auto; background-color: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 0 10px rgba(0,0,0,0.05);">

    <!-- Header -->
    <div class="header" style="background-color: #DDE4E6; padding: 20px; text-align: center;">
      <img src="{{ public_path('assets/img/logo.png') }}" style="max-width: 150px;" alt="NearBy Vouchers Logo">
    </div>

    <!-- Content -->
    <div class="content" style="padding: 30px; color: #333; font-size: 16px; line-height: 1.6;">
      <p><strong>Booking Summary</strong></p>
      <p>Booking ID: {{ $booking->bookingConfirmation->booking_id }}</p>
      <p>Product Name: {{ $booking->variant->product->name }}</p>
      <p>User Name: {{ $booking->bookingConfirmation->user->first_name }}</p>
      <p>Email: {{ $booking->bookingConfirmation->user->email }}</p>
      <p>Quantity: {{ $booking->quantity }}</p>
      <p>Booking Date: {{ $booking->bookingConfirmation->created_at->format('Y-m-d') }}</p>
    </div>

  </div>

  <!-- Sticky Footer (outside .email-wrapper) -->
  <div class="footer">
    © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
  </div>

</body>
</html>
