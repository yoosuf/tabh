<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{


    protected $guarded = [];
    /**
     * Get all of the owning commentable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
