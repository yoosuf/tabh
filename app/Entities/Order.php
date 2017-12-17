<?php

namespace App\Entities;

use App\Traits\HasAttachment;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasAttachment;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the comments for the blog post.
     */
    public function line_items()
    {
        return $this->hasMany(LineItem::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }
}
