<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogHeaderFooter extends Model
{

    protected $table = 'blog_header_footers';
    protected $fillable = [
       
        'logo',
        'main_title',
        'description',
        'main_image',
        'button_text',
        'button_link',
        'button_hide',
        
    ];

  
}
