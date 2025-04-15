<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = [
        'order_id',
        'user_id',
        'booking_amount',
        'discount_amount',
        'total_amount',
        'payment_method',
        'payment_status',
        'stripe_transaction_id',
        'payment_response',
    ];

    protected $casts = [
        'payment_response' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookingConfirmation()
    {
        return $this->hasOne(BookingConfirmation::class, 'order_id', 'order_id');
    }
}
