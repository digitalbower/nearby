<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingConfirmation extends Model
{
    protected $fillable = [
        'order_id',
        'booking_id',
        'user_id',
        'booking_amount',
        'discount_amount',
        'total_amount',
        'booking_status',
        'booking_details',
        'vat',
    ];

    protected $casts = [
        'booking_details' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function payment()
    {
        return $this->belongsTo(Payment::class, 'order_id', 'order_id');
    }

    public function items()
    {
        return $this->hasMany(BookingConfirmationItem::class);
    }

    
}
