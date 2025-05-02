<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Booking Request #{{ $item->booking_id }}</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
            font-size: 14px;
            color: #333;
            line-height: 1.6;
            padding: 30px;
        }

        .header {
            margin-bottom: 20px;
            text-align: center;
        }

        .header img {
            max-width: 180px;
            height: auto;
        }

        .booking-card {
            border: 1px solid #06b6d4;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 18px;
            font-weight: bold;
            color: #0f172a;
            margin-bottom: 10px;
        }

        .info {
            margin-bottom: 8px;
            color: #475569;
        }

        .label {
            font-weight: bold;
            color: #0f766e;
        }

        .download-footer {
            margin-top: 30px;
            font-size: 12px;
            text-align: center;
            color: #6b7280;
        }
    </style>
</head>
<body>
    <div class="header">
        <img src="{{ public_path('assets/img/logo.png') }}" alt="NearBy Vouchers Logo">
    </div>

    <div class="booking-card">
        <div class="section-title">Booking Request #{{ $item->booking_id }}</div>

        <div class="info">
            <span class="label">Date:</span>
            {{ \Carbon\Carbon::parse($item->booking_created_at)->format('d/m/y') }}
        </div>

       

        <div class="info">
            <span class="label">Quantity:</span> {{ $item->quantity }}
           
            
        </div>

        <div class="info">
            <span class="label">Total Price:</span> {{ number_format($item->total_price, 2) }}
        </div>

        <div class="info">
            <span class="label">Verification Status:</span> {{ $item->verification_status }}
        </div>

        <div class="info">
            <span class="label">Gift Product:</span> {{ $item->giftproduct ? 'Yes' : 'No' }}
        </div>
    </div>

    <div class="download-footer">
        © Nearby Vouchers {{ date('Y') }}. All rights reserved.
    </div>
</body>
</html>
