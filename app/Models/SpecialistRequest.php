<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SpecialistRequest extends Model
{

    protected $table = 'specialist_requests';
    protected $fillable = ['name', 'email', 'country_code', 'phone', 'message'];
}
