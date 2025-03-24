<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LegalDisclaimer extends Model
{
    use HasFactory;
    protected $table = 'legal_disclaimer';
    protected $fillable = ['title'];
}
