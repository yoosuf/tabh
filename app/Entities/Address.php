<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Address extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $guarded = [];
    /**
     * Get all of the owning commentable models.
     */
    public function addressable()
    {
        return $this->morphTo();
    }
}
