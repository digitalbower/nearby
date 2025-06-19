<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BlogFooter extends Model
{
     use HasFactory;

    protected $table = 'blogfooters';

    protected $fillable = [
        'type',
        'footer_text',
        'footer_link',
        'social_icon',
        'social_link',
        'social_svg',
    ];
}
