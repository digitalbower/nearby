<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use Barryvdh\DomPDF\Facade\Pdf;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Payment::with('paymentdata')->latest()->get();
        
        return view('admin.transactions.index', compact('transactions'));
    }

    public function downloadReceipt($id)
    {
        $payment = Payment::with('bookingConfirmation')->findOrFail($id);
        $response = is_string($payment->payment_response)
            ? json_decode($payment->payment_response)
            : (object) $payment->payment_response;

        $pdf = Pdf::loadView('admin.transactions.receipt', compact('payment', 'response'));
        return $pdf->download('receipt_' . $payment->stripe_transaction_id . '.pdf');
    }
}
