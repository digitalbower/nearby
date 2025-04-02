<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Vendor extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['name','email','phone','validityfrom','validityto','status'];

    protected $dates = ['deleted_at'];

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vendors', 'vendor_id', 'product_id');
    }       
}
