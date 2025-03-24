<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_description','tags','gallery','vendor_terms_id','about_description','vendor_id','category_id'];

    public function vendorTerms(){

        return $this->hasOne(VendorTerm::class);
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }  

   
}
