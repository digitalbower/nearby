<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PurchasedProduct extends Model
{
    use HasFactory;

    protected $fillable = [
        'booking_confirmation_id',
        'product_variant_id',
        'user_id',
        'quantity',
        'unit_price',
        'total_price',
        'verification_number',
        'verification_status',
    ];

    // Define the relationship with BookingConfirmation
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id');
    }

    // Define the relationship to Product through ProductVariant
    public function product()
    {
        return $this->hasOneThrough(Product::class, ProductVariant::class, 'product_id', 'id', 'product_variant_id', 'id');
    }
}
