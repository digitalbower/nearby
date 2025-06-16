<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use Notifiable;
    
    protected $guard = 'admin'; 
    
    protected $table = 'admins';

    protected $fillable = [
        'name', 'email', 'password', 'remember_token','user_role_id','view_report'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function role()
    {
        return $this->belongsTo(Role::class, 'user_role_id');
    }
    public function permissions()
    {
        return $this->belongsToMany(Permission::class, 'permission_admins');
    }

    public function hasPermission($permissionName)
    {
        return $this->permissions()->where('name', $permissionName)->exists()
            || $this->role && $this->role->permissions()->where('name', $permissionName)->exists();
    }
}
