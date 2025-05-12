<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation Attachment</title>
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
      <h2>Booking Confirmation attachment</h2>
    </div>

    <p>Dear {{ $name }},</p>

    <p>We’re excited to provide you with the voucher you’ve chosen. Below you’ll find all the details you need to redeem your offer.</p>

    <div class="section-title">🧾 Your Voucher Summary</div>
    <p><strong>Voucher Number:</strong> {{$variant['voucher_number']}}</p>
    <p><strong>Guest Name:</strong> {{$variant['guest_name']}}</p>
    <p><strong>Email:</strong>{{$variant['email']}}</p>
    <p><strong>Platform/Website:</strong> https://nearbyvouchers.com/ </p>
   
    <div class="section-title">📅 Booking Date & Details</div>
    <p><strong>Validity From:</strong>{{$variant['validity_from']}}</p>
    <p><strong>Validity Until:</strong>{{$variant['validity_to']}}
    <p><strong>Fulfilled By:</strong> {{$variant['vendor']}}</p>

    {{-- Section 3: Verification Number --}}
    <div class="section-title">🔐 Verification Number</div>
    <p style="color: red;"><strong>{{$variant['verification_number']}}</strong></p>
    <p style="color: red;">Do not share this on the phone.</p>

  <div class="section-title">📜 Voucher Details:</div>
      {!! $variant['voucher_details'] !!}
      <div class="section-title">Important Details:</div>
        {!! $variant['importantinfo'] !!}

      <div class="section-title">Voucher Terms and Conditions:</div>
      {!! $variant['nbv_terms'] !!}

      <div class="section-title" >NearBy Vouchers Refund & Exchange Policy:</div>
      <ol>
        <li>Non-Refundable: All vouchers are non-refundable. Once purchased, vouchers cannot be returned or exchanged for cash or credit.</li>
        <li>Non-Transferable: Vouchers are non-transferable after a slot is booked or the booking is confirmed with the operator. They can only be used by the original purchaser or as specified in the booking confirmation.</li>
        <li>Validity: Vouchers must be redeemed within the validity period of 90 days from the date of purchase. Vouchers not used within this period will be considered void and will not be eligible for a refund or exchange.</li>
        <li>Cancellation by Operator: In the event of unforeseen circumstances such as weather, natural calamity, or traveler security-related issues, if the operator cancels or closes the deal, refunds will be issued for vouchers that have not been redeemed. Refunds will be processed within 14 working days to the original payment method. Notifications regarding cancellations and refunds will be communicated via email.</li>
        <li>Lost or Stolen Vouchers: We are not responsible for lost or stolen vouchers. It is the responsibility of the voucher holder to keep their voucher details and OTP secure.</li>
      </ul>
      <p>  Thank you for shopping with us! We look forward to serving you again soon.</p>
      <p>Best regards,<br>The NearBy Vouchers Team</p>

    </div>
  </div>
  <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
  </div>
</body>
</html>