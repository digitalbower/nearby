<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'short_description','tags_id','gallery','vendor_terms_id','about_description',
    'vendor_id','category_id','sub_category_id','nbv_terms_id','product_support_phone',
    'product_support_email','emirates_id','productlocation_address','productlocation_link','importantinfo',
    'validity_from','validity_to','giftable','herocarousel','trending','categorycarousel'];

    protected $casts = [
        'tags_id' => 'array',
    ];

    public function vendorTerms(){

        return $this->belongsTo(VendorTerm::class,'vendor_terms_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class);
    }  
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class, 'sub_category_id');
    }
    public function tag() {
        $cleanTagIds = trim($this->tags_id, '"'); 
        $tagIds = explode(',', $cleanTagIds); 
        $tagIds = array_map('intval', $tagIds); 
        $tags = Tags::whereIn('id', $tagIds)->pluck('tags'); 
        return $tags;
    }
    public function emirate()
    { 
        return $this->belongsTo(Emirate::class, 'emirates_id');
    }
}
