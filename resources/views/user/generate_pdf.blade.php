<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Booking Item #{{ $item->id }}</title>
  <style>
    @page {
      margin: 120px 50px 100px 50px;
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
    }

    .header {
      background-color: #DDE4E6;
      padding: 20px;
      text-align: center;
    }

    .header img {
      max-width: 150px;
    }

    .content {
      padding: 30px;
      font-size: 14px;
      line-height: 1.6;
    }

    .section-title {
      font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 16px;
      color: #000;
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
  </style>
</head>
<body>
  <div class="email-wrapper">
    <!-- Header -->
    <div class="header">
      <img src="{{ public_path('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>

    <!-- Content -->
    <div class="content">
      <p>Dear {{ $item->bookingConfirmation->name ?? 'Guest' }},</p>

      <p>Thank you for booking with us! Please find your booking item details below:</p>

      <div style="display: flex; gap: 20px; align-items: center; margin-top: 20px;">
        <img src="{{ public_path('storage/' . $item->variant->product->image) }}"
             class="product-img"
             alt="{{ $item->variant->product->name }}">
        <div class="details">
          <p><strong>Product:</strong> {{ $item->variant->product->name }}</p>
          <p><strong>Variant:</strong> {{ $item->variant->title }}</p>
          <p><strong>Description:</strong> {{ $item->variant->product->short_description }}</p>
          <p><strong>Quantity:</strong> {{ $item->quantity }}</p>
          <p><strong>Date:</strong> {{ \Carbon\Carbon::parse($item->created_at)->format('d/m/Y') }}</p>
          <p><strong>Unit Price:</strong> ${{ number_format($item->unit_price, 2) }}</p>
        </div>
      </div>

      <div class="section-title">Booking ID:</div>
      <p>{{ $item->id }}</p>

      <div class="section-title">Verification Number:</div>
      <p style="color: red;"><strong>{{ $item->variant->verification_number ?? 'N/A' }}</strong></p>
      <p style="color: red;">Do not share this on phone.</p>

      <div class="section-title">Terms & Conditions:</div>
      {!! $item->variant->nbv_terms ?? '<p>No terms available.</p>' !!}

      <p style="margin-top: 40px;">We look forward to serving you again.</p>
      <p>Best regards,<br><strong>The NearBy Vouchers Team</strong></p>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
  </div>
</body>
</html>
