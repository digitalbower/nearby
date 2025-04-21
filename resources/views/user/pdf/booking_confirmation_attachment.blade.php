<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif;
      background-color: #f6f9fb;
      margin: 0;
      padding: 0;">
  <div class="email-wrapper" style="max-width: 700px;
      margin: 0 auto;
      background-color: #ffffff;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 0 10px rgba(0,0,0,0.05);">
  
    <!-- Header -->
    <div class="header"  style="background-color: #DDE4E6; padding: 20px; text-align: center;">
      <img src="{{ public_path('assets/img/logo.png') }}" style="max-width: 150px;" alt="NearBy Vouchers Logo">
    </div>

    <!-- Content -->
    <div class="content" style="padding: 30px;
      color: #333;
      font-size: 16px;
      line-height: 1.6;">
      <p>Dear {{ $name }},</p>

      <p>We're excited to provide you with the voucher you've chosen. Below you'll find all the details you need to redeem your offer. Please keep this ticket handy and enjoy your experience.</p>
      <p>
        <strong> Voucher Summary</strong></p>
      <p> Voucher Number: {{$variant['voucher_number']}}</p>
      <p>Guest Name: {{$variant['guest_name']}}</p>
      <p>Email: {{$variant['email']}}</p>
      <p>Platform/Website: NearbyVouchers</p>
      {{-- <p><strong> Date : [Date] only for dated products</strong></p> --}}
      <p>Valid From: {{$variant['validity_from']}}</p>
      <p>Valid Until: {{$variant['validity_to']}}</p>
      <p>Full filled by: {{$variant['vendor']}}</p>
        
      <h3 style="color: red">Verification Number: {{$variant['verification_number']}}</h3>
      <p style="color: red">Do not share this on Phone</p>
      <div class="section-title" style=" font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
      color: #000;">📜 Voucher Details:</div>
      {!! $variant['voucher_details'] !!}
      <div class="section-title" style="font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
      color: #000;">Important Details:</div>
        {!! $variant['importantinfo'] !!}

      <div class="section-title" style=" font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
      color: #000;">Voucher Terms and Conditions:</div>
      {!! $variant['nbv_terms'] !!}

      <div class="section-title" style=" font-weight: bold;
      margin-top: 30px;
      margin-bottom: 10px;
      font-size: 18px;
      color: #000;">NearBy Vouchers Refund & Exchange Policy:</div>
      <ol>
        <li>Non-Refundable: All vouchers are non-refundable. Once purchased, vouchers cannot be returned or exchanged for cash or credit.</li>
        <li>Non-Transferable: Vouchers are non-transferable after a slot is booked or the booking is confirmed with the operator. They can only be used by the original purchaser or as specified in the booking confirmation.</li>
        <li>Validity: Vouchers must be redeemed within the validity period of 90 days from the date of purchase. Vouchers not used within this period will be considered void and will not be eligible for a refund or exchange.</li>
        <li>Cancellation by Operator: In the event of unforeseen circumstances such as weather, natural calamity, or traveler security-related issues, if the operator cancels or closes the deal, refunds will be issued for vouchers that have not been redeemed. Refunds will be processed within 14 working days to the original payment method. Notifications regarding cancellations and refunds will be communicated via email.</li>
        <li>Lost or Stolen Vouchers: We are not responsible for lost or stolen vouchers. It is the responsibility of the voucher holder to keep their voucher details and OTP secure.</li>
      </ul>

      <p>  Thank you for shopping with us! We look forward to serving you again soon.</p>

      <p>Best regards,<br>
      <strong>The NearBy Vouchers Team</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer" style="background: #DDE4E6;
            padding: 20px;
            font-size: 12px;
            text-align: center;
            color: #777;
            margin-top: 20px;">
      © nearbyvouchers.com 2024, All rights reserved.
    </div>
  </div>
</body>
</html>
