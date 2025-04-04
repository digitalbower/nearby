<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = ['country', 'country_code', 'status'];

    /**
     * Define a relationship with users (if needed).
     */
    public function users()
    {
        return $this->hasMany(User::class, 'nationality_id'); // or 'cor_id' / 'country_code_id'
    }
}
