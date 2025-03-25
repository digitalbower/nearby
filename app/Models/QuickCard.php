<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuickCard extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'button_text', 'link', 'image'];
}
