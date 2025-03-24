<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'short_description','tags','gallery','vendor_terms_id','about_description'];
    public function vendorTerm(){
        return $this->hasMany(VendorTerm::class);
    }
}
