<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavigationMenu extends Model
{
    protected $table = 'navigation_menus'; // Ensure this matches your database table name

    protected $fillable = ['title', 'link', 'icon', 'type', 'status','name','navigation_placement'];
} 
