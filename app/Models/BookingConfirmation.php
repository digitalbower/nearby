<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingConfirmation extends Model
{
    protected $table = 'booking_confirmations';
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
        'promocode',
        'promocode_discount_amount'
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

    public function bokkingitems()
    {
        return $this->hasMany(BookingConfirmationItem::class, 'booking_id', 'id');
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }
    
    // ProductVariant.php
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    
    // Product.php
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function guests(){

        return $this->hasMany(BookingGuestInfo::class);
    }
  
    
    
}
