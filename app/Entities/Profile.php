<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    protected $dates = ['created_at', 'updated_at'];



    public function user()
    {
        return $this->belongsTo(User::class);
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
        return "{$this->first_name} {$this->last_name}";
    }

    public function avatar()
    {
        return "{$this->avatar}";
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




}
