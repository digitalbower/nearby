<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductVariant;

class Cart extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable=['user_id','product_variant_id','quantity'];

    public $timestamps = true;

    // Add this method for cart count
    public static function getCartCount()
    {
        if (auth()->check()) {
            return self::where('user_id', auth()->id())->count();
        }

        return self::where('session_id', session()->getId())->count();
    }
     

    
            public function varient()
        {
            return $this->belongsTo(ProductVariant::class, 'id');
        }


        
    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_varient_id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
        
}
