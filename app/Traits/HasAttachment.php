<?php

namespace App\Traits;

use App\Entities\Attachment;

trait HasAttachment
{
    /**
     * Get all of the notes.
     *
     */
    public function attachment()
    {
        return $this->morphOne(Attachment::class, 'attachable');
    }
}