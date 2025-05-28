<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogHeaderFooter extends Model
{

    protected $table = 'blog_header_footers';
    protected $fillable = [
        'navigation_placement',
        'type',
        'logo',
        'main_title',
        'description',
        'main_image',
        'button_text',
        'button_link',
        'button_hide',
        'social_media_icons',
        'footer_text'
    ];

    protected $casts = [
        'social_media_icons' => 'array',
        'button_hide' => 'boolean',
    ];
}
