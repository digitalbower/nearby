<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
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
      <h2>Booking Confirmation attachment</h2>
    </div>

    <p>Dear {{ $userId->first_name ?? 'Guest' }},</p>

    <p>We’re excited to provide you with the voucher you’ve chosen. Below you’ll find all the details you need to redeem your offer.</p>

    <div class="section-title">🧾 Your Voucher Summary</div>
    <p><strong>Voucher Number:</strong> {{ $item->bookingConfirmation->booking_id ?? 'N/A' }}</p>
    <p><strong>Guest Name:</strong> {{ $userId->first_name ?? 'Guest' }}</p>
    <p><strong>Email:</strong> {{ $userId->email ?? 'N/A' }}</p>
    <p><strong>Website:</strong> https://nearbyvouchers.com/ </p>
   
    <div class="section-title">📅 Booking Date & Details</div>
    <p><strong>Validity From:</strong> {{ \Carbon\Carbon::parse($item->bookingConfirmation->created_at ?? now())->format('d/m/Y') }}</p>
    <p><strong>Fulfilled By:</strong> {{ $vendor->name ?? 'N/A' }}</p>
    <p><strong>Validity Until:</strong>{{ $validUntil = \Carbon\Carbon::parse($item->bookingConfirmation->created_at)->addDays($item->relatedProductTypePdf->validity ?? 0)->format('Y-m-d'); }}

    </p>
    <p style="color: red;">Do not share this on the phone.</p>
   
    {{-- Section 3: Verification Number --}}
    <div class="section-title">🔐 Verification Number</div>
    <p style="color: red;"><strong>{{ $item->verification_number ?? 'N/A' }}</strong></p>
    <p style="color: red;">Do not share this on the phone.</p>

    <div class="section-title">📜 Voucher Details:</div>
<ol>
  <li>Below are the specifics of what is covered and not covered by your voucher:
    <ol type="a">
      <li> {{ $item->variant->product->name ?? 'N/A' }}
        <ol type="i">
        <li>
        <div class="relative w-28 h-28 rounded-lg overflow-hidden">
          <img src="{{ asset('storage/' . $item->variant->product->image) }}" alt="{{ $item->variant->product->name }}" class="w-full h-full object-cover">
        </div>
      </li>

          <li>
            <strong>{{ $item->variant->product->short_description ?? 'No Description' }}</strong>
          </li>
          <li>
            <strong>{{ $item->variant->title ?? 'No Variant Title' }}</strong>
          </li>
          <li>
            <strong>AED {{ number_format($item->variant->price ?? 0, 2) }}</strong>
          </li>
        </ol>
      </li>
    </ol>
  </li>
</ol>

<div class="section-title">⚠️ Important Details:</div>
<ol>
  <li>
    Confirmation Email: Please ensure you have a printout or digital version of this confirmation email for verification at the time of use.
  </li>
  <li>
    Non-Dated Products: For non-dated products, advance slot booking is required. Please contact us using the contact number or email provided above to schedule your slot.
    <ol type="a">
      <li><strong>Phone:</strong> <em>{{ $item->variant->product->product_support_phone ?? 'N/A' }}</em></li>
      <li><strong>Email:</strong> <em>{{ $item->variant->product->product_support_email ?? 'N/A' }}</em></li>
      <li><strong>Operating Hours:</strong> <em>{{ $item->variant->product->importantinfo ?? 'N/A' }}</em></li>
    </ol>
  </li>
  <li>
    Dated Bookings: For products with a specific date, please verify your booking by calling us before traveling to confirm your reservation.
    <ol type="a">
      <li><strong>Phone:</strong> <em>{{ $item->variant->product->product_support_phone ?? 'N/A' }}</em></li>
      <li><strong>Email:</strong> <em>{{ $item->variant->product->product_support_email ?? 'N/A' }}</em></li>
      <li><strong>Operating Hours:</strong> <em>{{ $item->variant->product->importantinfo ?? 'N/A' }}</em></li>
    </ol>
  </li>
</ol>


    <!-- Voucher Terms and Conditions Section -->
    <div class="section-title">📄 Voucher Terms and Conditions:</div>

@if(!empty($item->variant->product->nbvTerms->terms))
  {!! $item->variant->product->nbvTerms->terms !!}
@else
  <p>Voucher terms and conditions are not available at the moment.</p>
@endif


@if($vendorTerms)
    <div class="section-title">📄 {{ $vendorTerms->name }}</div>
    <div>{!! nl2br(e($vendorTerms->terms)) !!}</div>
@endif

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
