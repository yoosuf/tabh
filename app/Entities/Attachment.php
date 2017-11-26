<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Attachment extends Model
{
    /**
     * Get all of the owning commentable models.
     */
    public function attachable()
    {
        return $this->morphTo();
    }
}
