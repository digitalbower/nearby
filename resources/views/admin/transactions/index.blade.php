@extends('admin.layouts.masteradmin')

@section('content')
<div class="card shadow-none px-2 mt-3"> {{-- Reduced padding and margin --}}
    <div class="card-body shadow-lg bg-white">
        <div class="container-fluid">
            <h2 class="mb-4">Transaction History</h2>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark text-center">
                    <tr>
                        <th>Booking ID</th>
                        <th>Transaction ID</th>
                        
                        <th>Total Amount</th>
                        <th>Payment Method</th>
                        <th>Status</th>
                        <th>Payment Response</th>
                        <th>Action</th> 
                    </tr>
                </thead>
                <tbody>
                @forelse($transactions as $txn)
                    <tr>
                        <td>{{ $txn->bookingConfirmation->booking_id ?? '-' }}</td>
                        <td>{{ $txn->stripe_transaction_id ?? '-' }}</td>
                        
                        <td>${{ number_format($txn->bookingConfirmation->total_amount ?? 0, 2) }}</td>
                        <td>{{ ucfirst($txn->payment_method ?? 'N/A') }}</td>
                        <td class="text-center">
                            @if($txn->payment_status === 'completed')
                                <span class="badge bg-success">Success</span>
                            @else
                                <span class="badge bg-danger">Failed</span>
                            @endif
                        </td>
                        <td>
                            @php
                                $response = is_string($txn->payment_response)
                                    ? json_decode($txn->payment_response)
                                    : (object) $txn->payment_response;
                            @endphp

                            @if(!empty($response->last_payment_error))
                                <strong>{{ $response->last_payment_error->message ?? 'Payment Failed' }}</strong>
                            @else
                                <span class="text-success">Payment Successful</span>
                            @endif
                        </td>
                       <td class="text-center">
    @if($txn->receipt_url)
        <a href="{{ $txn->receipt_url }}" title="Download Stripe Receipt" target="_blank">
            <i class="fas fa-download text-success fs-5"></i>
        </a>
    @else
        <span class="text-muted">N/A</span>
    @endif
</td>

                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center">No transactions found.</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
