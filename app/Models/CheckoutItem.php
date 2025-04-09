<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CheckoutItem extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['checkout_id','product_variant_id','quantity','unit_price','total_price','giftproduct'];
}
