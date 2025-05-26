<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Report</title>

  <style>
    @page {
      margin: 40px 50px 100px 50px;
    }
    * {
    font-family: DejaVu Sans, sans-serif !important;
    }
    body {
      font-family: DejaVu Sans, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    .email-wrapper {
      max-width: 700px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);
      padding: 30px;
    }

    .header {
      background-color: #DDE4E6;
      padding: 20px;
      text-align: center;
    }

    .header img {
      max-width: 150px;
    }

    h1 {
      text-align: center;
      font-size: 28px;
      margin-bottom: 30px;
    }

    .section-title {
      font-size: 18px;
      font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      border-bottom: 2px solid #e2e2e2;
      padding-bottom: 5px;
      color: #2a2a2a;
    }

    p {
      margin: 5px 0;
      font-size: 14px;
    }

    .footer {
      position: fixed;
      bottom: -60px;
      left: 0;
      right: 0;
      height: 50px;
      background: #DDE4E6;
      padding: 20px;
      text-align: center;
      font-size: 12px;
      color: #777;
    }

    .product-img {
      width: 100px;
      height: 100px;
      object-fit: cover;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .details p {
      margin: 0 0 6px 0;
    }

    .product-summary {
      display: flex;
      gap: 20px;
      align-items: center;
      margin-top: 20px;
    }
  </style>
</head>
<body>

  <div class="email-wrapper">

    <!-- Header -->
    <div class="header">
      <img src="{{ public_path('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>
    <p>Dear {{ $name ?? 'Guest' }},</p>

    <p>Thank you for your services.Please find attached a receipt acknowledging the completion of the service.This document is for your records and confirms the details of the work provided.</p>
    <div class="section-title">Service Summary </div>
    <p><strong>Booking ID:</strong> {{ $booking->bookingConfirmation->booking_id }}</p>
    <p><strong>Product Name:</strong> {{ $booking->variant->product->name }}</p>
    <p><strong>Product Variant:</strong> {{ $booking->variant->title }}</p>
    <p><strong>Quantity:</strong> {{ $booking->quantity }}</p>
    <p><strong>Booking Date:</strong>{{ $booking->bookingConfirmation->created_at->format('Y-m-d') }}</p>
    <p><strong>Customer Name:</strong> {{ $booking->bookingConfirmation->user->first_name }}</p>
    <p><strong>Redeemed Date:</strong> {{ $booking->bookingConfirmation->updated_at->format('Y-m-d') }}</p>
    <p><strong>Expiry Date:</strong> {{ $booking->validity }}</p>
  </div>

  <!-- Sticky Footer (outside .email-wrapper) -->
  <div class="footer">
    © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
  </div>

</body>
</html>
