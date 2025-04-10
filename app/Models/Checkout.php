<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Checkout extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['user_id','booking_amount','promocode','discount_amount','total_amount','payment_type'];
}
