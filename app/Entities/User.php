<?php

namespace App\Entities;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];



    /**
     *
     * Get all of the post's addresses.
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auth_provider()
    {
        return $this->hasMany(AuthProvider::class);
    }




    public function isCompleted()
    {
        return $this->is_setup;
    }
}
