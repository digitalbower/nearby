<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation Attachment</title>
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
    <div class="header">
      <img src="{{ public_path('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>

    <p>Dear {{ $name }},</p>

    <p>We’re excited to provide you with the voucher you’ve chosen. Below you’ll find all the details you need to redeem your offer.</p>

    <div class="section-title">🧾 Your Voucher Summary</div>
    <p><strong>Product:</strong> {{$variant['product_name']}}</p>
    <p><strong>Product Variant:</strong> {{$variant['product_variant_name']}}</p>
    <p><strong>Voucher Number:</strong> {{$variant['voucher_number']}}</p>
    <p><strong>Guest Name:</strong> {{$variant['guest_name']}}</p>
    <p><strong>Email:</strong>{{$variant['email']}}</p>
    <p><strong>Platform/Website:</strong> https://nearbyvouchers.com/ </p>


    <div class="section-title">🔐 Verification Number</div>
    <h2 style="color: red;"><strong>{{$variant['verification_number']}}</strong></h2>
    <p style="color: red;">Only share the verification code at the service location — never during advance booking</p>
   
    <div class="section-title">📅 Booking Date & Details</div>
    <p><strong>Validity From:</strong>{{$variant['validity_from']}}</p>
    <p><strong>Validity Until:</strong>{{$variant['validity_to']}}</p>
    <p><strong>Fulfilled By:</strong> {{$variant['vendor']}}</p>
    <div class="section-title">🧾 Guest Info</div>
        @if($variant['quantity'] == 1)
            <p><strong>Main Guest Name:</strong> {{$variant['guest_name']}}</p>
            <p><strong>Main Guest Email:</strong> {{$variant['email']}}</p>
        @else
          <p><strong>Main Guest Name:</strong> {{$variant['guest_name']}}</p>
          <p><strong>Main Guest Email:</strong> {{$variant['email']}}</p>
          @if($variant['guests'])
            <p><i>Accompanying Guests:</i></p>
            <ul class="list-disc pl-6 space-y-1"> 
            @foreach ($variant['guests'] as $index => $guest)
                <li><strong>Guest {{ $index + 1 }} Name:</strong> {{ $guest['guest_first_name'] }}</li>
                <li><strong>Guest {{ $index + 1 }} Email:</strong> {{ $guest['guest_email'] }}</li>
            @endforeach
            </ul>
          @endif
        @endif
  <div class="section-title">📜 Voucher Details:</div>
      {!! $variant['voucher_details'] !!}
      <div class="section-title">Important Details:</div>
        {!! $variant['importantinfo'] !!}
      <div class="section-title">{{$variant['vendor_terms_title']}}</div>
      {!! $variant['vendor_terms'] !!}
      <div class="section-title">{{$variant['nbv_terms_title']}}</div>
      {!! $variant['nbv_terms'] !!}
      <p>  Thank you for shopping with us! We look forward to serving you again soon.</p>
      <p>Best regards,<br>The NearBy Vouchers Team</p>

    </div>
  </div>
  <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
  </div>
</body>
</html>