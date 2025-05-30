<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\ProductVariant;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name', 'short_description','tags_id','gallery','vendor_terms_id','about_description',
    'vendor_id','category_id','sub_category_id','nbv_terms_id','product_support_phone',
    'product_support_email','emirates_id','productlocation_address','productlocation_link','importantinfo',
    'validity_from','validity_to','giftable','herocarousel','trending','categorycarousel','sales_person_id',
    'product_type_id','meta_title', 'meta_description','og_title','og_description','og_image','schema','email_about'];

    protected $casts = [
        'tags_id' => 'array',
    ];

    public function vendorTerms(){

        return $this->hasOne(VendorTerm::class,'id','vendor_terms_id');
    }
    public function nbvTerms(){

        return $this->hasOne(NbvTerm::class,'id','nbv_terms_id');
    }
    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
    public function variants()
    {
        return $this->hasMany(ProductVariant::class)->where('status', 1);
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
    public function reviews()
    {
        return $this->hasMany(Review::class)->where('status', 1);
    }
    public function productVariant()
    {
        return $this->hasMany(ProductVariant::class, 'product_id');  // 'product_id' is the foreign key in 'product_variants' table
        
    }
    public function getTotalBookingCount()
    {
        return $this->variants->sum(function ($variant) {
            return $variant->bookingConfirmationItems->where('verification_status','redeemed')->sum('quantity');
        });
    }

    public function commissionCategory()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function types()
    {
        return $this->hasOne(ProductType::class, 'id', 'product_type_id');
    }
    public function salesPerson(){
        return $this->belongsTo(SalesPerson::class,'sales_person_id');
    }
}
