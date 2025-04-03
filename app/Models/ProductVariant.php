<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ['product_id','title','short_legend','short_info','product_type_id','short_description','unit_price','unit_type_id','discounted_percentage','discounted_price',
    'available_quantity','threshold_quantity','validity_from','validity_to','timer_flag','start_time','end_time'];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
