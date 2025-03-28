<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VendorTerm extends Model
{
    use HasFactory;

    protected $fillable = ['vendor_id','terms','product_id'];

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function product(){
        
        return $this->belongsTo(Product::class);
    }

}
