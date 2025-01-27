<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable //implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'remember_token', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function profile()
    {
        return $this->hasOne('App\Models\Profile');
    }

    public function socialLinks()
    {
        return $this->hasMany('App\Models\SocialLink');
    }

    public function _roles()
    {
        return $this->hasMany('App\Models\UserRole');
    }

    public function roles()
    {
        return $this->hasManyThrough('App\Models\Role', 'App\Models\UserRole', 'user_id', 'id', 'id', 'role_id');
    }
}
