<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductVariant extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ['product_id','title','short_legend','short_legend_icon','short_info','short_description','product_variant_icon','unit_price','unit_type_id','discounted_percentage','discounted_price',
    'available_quantity','threshold_quantity','validity_from','validity_to','timer_flag','start_time','end_time','markup','agreement_unit_price','holiday_length','bookable_start_date','bookable_end_date'];
    
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function cart()
    {
        return $this->hasOne(Cart::class, 'product_variant_id', 'id');
    }

    public function checkout()
    {
        return $this->belongsTo(Product::class, 'product_id')->withTrashed();
    }

    public function bookingConfirmationItems()
{
    return $this->hasMany(BookingConfirmationItem::class,'product_varient_id');
}
   public function product_purchase()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function productbook()
    {
        return $this->belongsTo(Product::class);
    }
    public function getBookingCountBasedOnvariant(){
        $totalBooking = $this->bookingConfirmationItems->count();
        return $totalBooking;
    }

    public function commissionProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function blackoutDates()
    {
        return $this->hasMany(BlackoutDate::class);
    }

}
