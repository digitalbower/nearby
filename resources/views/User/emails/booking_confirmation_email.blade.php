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
        <p>Order Date: {{ $orderDate ?? '[Order Date]' }}</p>
        <p>Order Number:{{ $orderNumber ?? '[Order Number]' }}</p>
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
          <tr>
            <td>Sample Product</td>
            <td>2</td>
            <td>AED 100.00</td>
            <td>AED 200.00</td>
          </tr>
          <tr>
            <td></td>
            <td></td>
            <td></td>
            <td>Grand Total: AED 575.00</td>
          </tr>
        </tbody>
      </table>
      <div class="section-title">📜 Important Details:</div>
      <ol>
        <li>Confirmation Email: Please ensure you have a printout or digital version of this confirmation email for verification at the time of use.</li>
        <li>Non-Dated Products: For non-dated products, advance slot booking is required. Please contact us using the contact number or email provided above to schedule your slot.</li>
        <li>Dated Bookings: For products with a specific date, please verify your booking by calling us before traveling to confirm your reservation.</li>
      </ol>

      <div class="section-title">📋 Near By Vouchers Terms and Conditions:</div>
      <ol>
        <li>Voucher Validity: Valid for 90 days from the date of purchase. Please redeem within this period.</li>
        <li>Redemption Instructions: Present a printout or digital version of this email at the time of purchase or service. Follow any additional instructions provided.</li>
        <li>Usage: The voucher is valid only for the items mentioned in the voucher details. Any items not mentioned or excluded are not included with this voucher.</li>
        <li>Restrictions: Cannot be combined with other promotions or discounts.</li>
        <li>Refunds and Exchanges: Non-refundable and cannot be exchanged for cash or credit. Void if not used within the validity period.</li>
        <li>Lost or Stolen Vouchers: We are not responsible for lost or stolen vouchers. Ensure you keep your voucher details and OTP secure.</li>
        <li>Modification and Termination: No modifications are possible after purchase. In unforeseen situations such as weather, natural calamity, or traveler security-related issues, if the operator cancels or closes the deal, vouchers not redeemed will be eligible for a refund. Refunds will be issued within 14 working days to the original payment method. Notifications of cancellations and refunds will be sent via email.</li>
        <li>Dispute Resolution: For any disputes, please contact us at <a href="mailto:support@nearbyvouchers.com">support@nearbyvouchers.com.</a> Our office hours are Monday to Friday, 9 AM to 5 PM.</li>
      </ol>

      <div class="section-title">🔄 NearBy Vouchers Refund & Exchange Policy:</div>
      <ol>
        <li>Non-Refundable: All vouchers are non-refundable. Once purchased, vouchers cannot be returned or exchanged for cash or credit.</li>
        <li>Non-Transferable: Vouchers are non-transferable after a slot is booked or the booking is confirmed with the operator. They can only be used by the original purchaser or as specified in the booking confirmation.</li>
        <li>Validity: Vouchers must be redeemed within the validity period of 90 days from the date of purchase. Vouchers not used within this period will be considered void and will not be eligible for a refund or exchange.</li>
        <li>Cancellation by Operator: In the event of unforeseen circumstances such as weather, natural calamity, or traveler security-related issues, if the operator cancels or closes the deal, refunds will be issued for vouchers that have not been redeemed. Refunds will be processed within 14 working days to the original payment method. Notifications regarding cancellations and refunds will be communicated via email.</li>
        <li>Lost or Stolen Vouchers: We are not responsible for lost or stolen vouchers. It is the responsibility of the voucher holder to keep their voucher details and OTP secure.</li>
      </ul>

      <p>Thank you for shopping with us! We look forward to serving you again soon.</p>

      <p>Best regards,<br>
      <strong>The NearBy Vouchers Team</strong></p>
    </div>

    <!-- Footer -->
    <div class="footer">
      © nearbyvouchers.com 2024, All rights reserved.
    </div>
  </div>
</body>
</html>
