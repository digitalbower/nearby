<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BlogDetail extends Model
{

    protected $table = 'blog_details';
    protected $fillable = [
        'blog_id',
        'title',
        'description',
        'button_text',
        'button_link',
        'images',
        'is_featured',
        'validity_date',
    ];

    protected $casts = [
        'images' => 'array',
        'is_featured' => 'boolean',
        'validity_date' => 'date',
    ];

    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }
}

