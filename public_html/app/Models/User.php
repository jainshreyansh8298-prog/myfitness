<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\ActivityScopeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,HasRoles, Notifiable, HasApiTokens, ActivityScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
        'country_code',
        'phone_verified_at',
        'sex',
        'image',
        'status',
        'fcm_token',
        'player_id',
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
            'phone_verified_at' =>'datetime',
        ];
    }
    //-----------------------------

    protected $appends = [
        'type','image_url','is_phone_verified','phone'
    ];

    //-----------------------------------------------

    public function getPhoneAttribute()
    {
        return $this->country_code . $this->phone_number ;
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? asset('storage/'.$this->image) : null ;
    }

    public function getTypeAttribute()
    {
        return $this->sex == 'm' ? 'Male' : 'Female';
    }

    public function getIsPhoneVerifiedAttribute()
    {
        return is_null($this->phone_verified_at) ? false : true;
    }

       public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function details()
    {
        return $this->hasOne(UserDetail::class);
    }
}
