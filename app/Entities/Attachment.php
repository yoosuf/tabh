<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    protected $guarded = [];
    /**
     * Get all of the owning commentable models.
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
