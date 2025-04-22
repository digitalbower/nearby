<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingConfirmationItem extends Model
{

    protected $table = 'booking_confirmation_items';
    protected $fillable = [
        'booking_confirmation_id',
        'product_varient_id',
        'quantity',
        'unit_price',
        'total_price',
        'verification_number',
        'verification_status',
        'giftproduct',
    ];

    public function bookingConfirmation()
    {
        return $this->belongsTo(BookingConfirmation::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_varient_id');
    }
    

}
