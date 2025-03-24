<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SocialMediaLink extends Model
{
    use HasFactory;
    
    protected $table = 'social_media_link';
    protected $fillable = ['platform', 'url'];
}
