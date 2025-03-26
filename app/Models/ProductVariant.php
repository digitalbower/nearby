<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable= ['product_id','title','short_description','unit_price','unit_type','discounted_price',
    'available_quantity','threshold_quantity','validity_from','validity_to','timer_flag','start_time','end_time'];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
