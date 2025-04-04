<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Gender extends Model
{
    use HasFactory;

    protected $fillable = ['gender', 'status'];

    /**
     * Define a relationship with users.
     */
    public function users()
    {
        return $this->hasMany(User::class, 'gender_id');
    }
}
