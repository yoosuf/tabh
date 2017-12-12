<?php

namespace App\Entities;

use Conner\Tagging\Taggable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    use Taggable;


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
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'preferences' => 'array',
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function auth_provider()
    {
        return $this->hasOne(AuthProvider::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     *
     * Get all of the post's addresses.
     */
    public function addresses()
    {
        return $this->morphMany(Address::class, 'addressable');
    }



    public function fullName()
    {
        return "{$this->name}";
    }

    public function avatar()
    {
        return "";
    }


    public function createdAt($format)
    {
        switch ($format) {
            case "human":
                return $this->created_at->diffForHumans();
                break;
            case "atom":
                return $this->created_at->toAtomString();
                break;
            default:
                return $this->created_at;
                break;
        }
    }

    public function  email()
    {
        return isset($this->email) ? $this->email : "No email provided";
    }


    public function  phone()
    {
        return isset($this->phone) ? $this->phone : "No phone provided";
    }

    public function  hasAccount()
    {
        return isset($this->password) ? true : "No account";
    }




    /**
     * @return \Illuminate\Database\Eloquent\Model|null|string|static
     */
    public function primaryAddress()
    {
        return $this->morphOne(Address::class, 'addressable');
    }






    /**
     * get complete
     */
    public function getCompleted()
    {
        return $this->is_complete;
    }

    /**
     * set complete
     */
    public function setComplete()
    {
        return $this->is_complete = 1;
    }
}
