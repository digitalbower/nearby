<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Booking Confirmation</title>
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
    .order-summary {
      padding: 15px;
      border-radius: 5px;
      margin-top: 10px;
    }
    .order-summary p {
      margin: 5px 0;
    }
    .items-table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 15px;
    }
    .items-table th, .items-table td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: left;
    }
    .items-table th {
      background-color: #f0f0f0;
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
      <p>Dear {{ $name }},</p>

      <p>Thank you for your purchase! We’re delighted to confirm your order. Below are the details of your recent purchase:</p>

      <div class="section-title">✨ Your Order Summary:</div>
      <div class="order-summary">
        <p>Order Date: {{ $order_date ?? '[Order Date]' }}</p>
        <p>Order Number:{{ $order_number ?? '[Order Number]' }}</p>
      </div>

      <p style="font-style: italic">🛒 Items Purchased:</p>
      <table class="items-table">
        <thead>
          <tr>
            <th>Item</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Total</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($items as $item)
            <tr>
              <td>{{$item['product_variant']}}</td>
              <td>{{$item['quantity']}}</td>
              <td>AED {{$item['unit_price']}}</td>
              <td>AED {{$item['total_price']}}</td>
            </tr>
          @endforeach     
           <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Promocode:</b> {{ $promocode ?? 'N/A' }}</td>
          </tr> 
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Promocode Discount:</b> {{$promo_discount ?? 'N/A'}}</td>
          </tr> 
            <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Promocode discount amount:</b> AED {{$promocode_discount_amount ?? 'N/A'}}</td>
          </tr>   
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>VAT:</b> AED {{$vat}}</td>
          </tr>     
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td><b>Grand Total:</b> AED {{$grand_total}}</td>
          </tr>
        </tbody>
      </table>

      <p>Thank you for shopping with us! We look forward to serving you again soon.</p>

      <p>Best regards,<br>
      <strong>The NearBy Vouchers Team</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer">
      © nearbyvouchers.com {{ date('Y') }}, All rights reserved.
    </div>
  </div>
</body>
</html>
