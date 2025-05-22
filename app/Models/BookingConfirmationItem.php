<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingConfirmationItem extends Model
{

    protected $table = 'booking_confirmation_items';
    protected $fillable = [
        'booking_confirmation_id',
        'product_varient_id',
        'quantity',
        'unit_price',
        'total_price',
        'verification_number',
        'verification_status',
        'validity',
        'giftproduct',
    ];

    public function bookingConfirmation()
    {
        return $this->belongsTo(BookingConfirmation::class);
    }

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'product_varient_id');
    }

    public function variantPdf()
    {
        return $this->belongsTo(ProductVariant::class); // Changed to variantPdf
    }

    // Relationship to Product (renamed to productPdf)
    public function productPdf()
    {
        return $this->belongsTo(Product::class, 'product_id'); // or appropriate FK
    }
    

    // Relationship to Vendor Terms (renamed to vendorTermsPdf)
    public function vendorTermsPdf()
    {
        return $this->belongsTo(VendorTerm::class, 'vendor_terms_id'); // Changed to vendorTermsPdf
    }

    // Relationship to NBV Terms (renamed to nbvTermsPdf)
    public function nbvTermsPdf()
    {
        return $this->belongsTo(NbvTerm::class, 'nbv_terms_id'); // Changed to nbvTermsPdf
    }

    // Relationship to Vendor (renamed to vendorPdf)
    public function vendorPdf()
    {
        return $this->belongsTo(Vendor::class); // Changed to vendorPdf
    }

    // Relationship to Product Type (renamed to relatedProductTypePdf to avoid conflict)
    public function relatedProductTypePdf()
    {
        return $this->belongsTo(ProductType::class); // Changed to relatedProductTypePdf
    }
    

}
