<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    /**
     * Get all of the owning commentable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
