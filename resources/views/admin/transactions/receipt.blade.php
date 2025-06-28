<!DOCTYPE html>
<html>
<head>
    <title>Payment Receipt</title>
    <style>
        body { font-family: Arial, sans-serif; }
        .header { margin-bottom: 20px; }
        .section { margin-bottom: 10px; }
    </style>
</head>
<body>
    <h2>Payment Receipt</h2>

    <div class="section"><strong>Transaction ID:</strong> {{ $payment->stripe_transaction_id }}</div>
    <div class="section"><strong>Booking ID:</strong> {{ $payment->bookingConfirmation->id ?? '-' }}</div>
    <div class="section"><strong>Total Amount:</strong> ${{ number_format($payment->bookingConfirmation->total_amount ?? 0, 2) }}</div>
    <div class="section"><strong>Payment Method:</strong> {{ ucfirst($payment->payment_method) }}</div>
    <div class="section"><strong>Status:</strong> {{ ucfirst($payment->payment_status) }}</div>

    @if(!empty($response->last_payment_error))
        <div class="section text-danger"><strong>Failure Reason:</strong> {{ $response->last_payment_error->message ?? 'N/A' }}</div>
    @else
        <div class="section text-success"><strong>Status:</strong> Payment Successful</div>
    @endif

    <div class="section"><small>Generated on: {{ now()->format('Y-m-d H:i:s') }}</small></div>
</body>
</html>
