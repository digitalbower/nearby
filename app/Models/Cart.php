<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductVariant;

class Cart extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['user_id', 'product_variant_id', 'quantity','check_in_date','check_out_date','dated_product'];

    public $timestamps = true;

    // Get cart count
    public static function getCartCount()
    {
        if (auth()->check()) {
            return self::where('user_id', auth()->id())->count();
        }

        return self::where('session_id', session()->getId())->count();
    }

    // Relationship with ProductVariant (withTrashed if using SoftDeletes)
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_variant_id')->withTrashed();
    }
    // Shortcut to get product from variant
    public function product()
    {
        return $this->productVariant->product ?? null;
    }

    // Optional alias for Blade use
    public function getVarientAttribute()
    {
        return $this->productVariant;
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
        
}
