<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    protected $guarded = [];


    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
}
