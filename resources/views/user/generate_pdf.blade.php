<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Item #{{ $item->id }}</title>
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
    {{-- Header --}}
    <div class="header">
      <img src="{{ public_path('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>

    <p>Dear {{ $userId->first_name ?? 'Guest' }},</p>

    <p>We’re excited to provide you with the voucher you’ve chosen. Below you’ll find all the details you need to redeem your offer.</p>

    <div class="section-title">🧾 Your Voucher Summary</div>
     <p><strong>Product:</strong> {{$item->variant?->product?->name}}</p>
    <p><strong>Product Variant:</strong> {{$item->variant?->title}}</p>
    <p><strong>Voucher Number:</strong> {{ $item->bookingConfirmation?->booking_id ?? 'N/A' }}</p>
    <p><strong>Guest Name:</strong> {{ $userId->first_name ?? 'Guest' }}</p>
    <p><strong>Email:</strong> {{ $userId->email ?? 'N/A' }}</p>
    <p><strong>Website:</strong> https://nearbyvouchers.com/ </p>
   
    <div class="section-title">🔐 Verification Number</div>
    <h3 style="color: red;"><strong>{{ $item->verification_number}}</strong></h3>
    <p style="color: red;">Only share the verification code at the service location — never during advance booking</p>

    <div class="section-title">📅 Booking Date & Details</div>
    <p><strong>Validity From:</strong> {{ $order_date }}</p>
    <p><strong>Validity Until:</strong>{{ $validUntil }}
    <p><strong>Fulfilled By:</strong> {{ $vendor?->name ?? 'N/A' }}</p>
    <div class="section-title">🧾 Guest Info</div>
    @if($item->quantity == 1)
        <p><strong>Main Guest Name: </strong>{{$userId->first_name}}</p>
        <p><strong>Main Guest Email: </strong>{{$userId->email}}</p>
    @else
      <p><strong>Main Guest Name: </strong>{{$userId->first_name}}</p>
      <p><strong>Main Guest Email: </strong>{{$userId->email}}</p>
      @if($guests)
        <p><i>Accompanying Guests:</i></p>
        <ul class="list-disc pl-6 space-y-1"> 
        @foreach ($guests as $index =>$guest)
          <li><strong>Guest {{ $index + 1 }} Name:</strong> {{$guest['guest_first_name']}}</li>
          <li><strong>Guest {{ $index + 1 }} Email:</strong> {{$guest['guest_email']}}</li>
        @endforeach   
        </ul>
      @endif
    @endif


    <div class="section-title">📜 Voucher Details:</div>
      {!!$item->variant?->product?->email_about  !!}
    <div class="section-title">⚠️ Important Details:</div>
     {!! $item->variant?->product?->importantinfo !!}
    <div class="section-title">{{  $vendorTerms?->title}}</div>
      {!!  $vendorTerms?->terms !!}
    <div class="section-title">{{$nbvTerms?->title}}</div>
      {!! $nbvTerms?->terms !!}

    <!-- Thank You and Closing Message -->
    <p>Thank you for shopping with us! We look forward to serving you again soon.</p>
    <p>Best regards,<br>The NearBy Vouchers Team</p>

    {{-- Footer --}}
    <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
    </div>
  </div>
</body>
</html>
