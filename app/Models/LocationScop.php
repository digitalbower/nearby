<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LocationScop extends Model
{
    protected $table = 'location_scop';

    protected $fillable = ['emirate_name', 'active'];
}
