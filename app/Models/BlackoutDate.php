<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlackoutDate extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable= ['product_variant_id','date'];
    
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
