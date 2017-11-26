<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }




    /**
     * Get the comments for the blog post.
     */
    public function variant()
    {
        return $this->hasMany(LineItem::class);
    }

    /**
     * Get all of the product's attachments.
     */
    public function images()
    {
        return $this->morphMany(Attachment::class, 'attachable');
    }
}
