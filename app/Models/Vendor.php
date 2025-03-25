<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    use HasFactory;

    protected $fillable = ['name','contact_info','status'];

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vendors', 'vendor_id', 'product_id');
    }       
}
