<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Vendor extends Authenticatable
{
    protected $guard = 'vendor'; 
    
    protected $table = 'vendors';

    use Notifiable,SoftDeletes;

    protected $fillable = ['name','email','password','phone','validityfrom','validityto','status'];

    protected $hidden = [
        'password'
    ];

    protected $dates = ['deleted_at'];

    public function getStatusTextAttribute()
    {
        return $this->status ? 'Active' : 'Inactive';
    }
    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_vendors', 'vendor_id', 'product_id');
    }       
}
