<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'gender',
        'dob',
        'phone',
        'country',
        'address',
        'profileicon',
    ];
    

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function gender()
{
    return $this->belongsTo(Gender::class, 'gender_id');
}

public function nationality()
{
    return $this->belongsTo(Country::class, 'nationality_id');
}

public function countryOfResidence()
{
    return $this->belongsTo(Country::class, 'cor_id');
}

public function countryCode()
{
    return $this->belongsTo(Country::class, 'country_code_id');
}
public function checkout()
{
    return $this->hasMany(Checkout::class, 'user_id');
}

}
