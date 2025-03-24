<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = ['logo_image', 'logo_fallback', 'preview_image'];
}
