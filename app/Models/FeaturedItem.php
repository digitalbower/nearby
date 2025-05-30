<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FeaturedItem extends Model
{

    protected $table = 'featured_items';
    protected $fillable = ['title', 'description', 'link', 'image'];
}
