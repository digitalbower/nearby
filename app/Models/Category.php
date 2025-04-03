<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [ 'name',
    'code',
    'categoryicon',
    'status',
    'enable_homecarousel'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }
}
