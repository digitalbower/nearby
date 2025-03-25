<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class SupportSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'icon',
        'label',
        'title',
        'button_text',
        'form_action',
    ];
}
