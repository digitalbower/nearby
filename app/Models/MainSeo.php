<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainSeo extends Model
{
    use HasFactory;

    protected $fillable = ['page_url','meta_title', 'meta_description','og_title','og_description','og_image','schema'];
}
