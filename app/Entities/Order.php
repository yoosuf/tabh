<?php

namespace App\Entities;

use App\Traits\HasAttachment;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasAttachment;
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'meta' => 'array',
    ];

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



    public static function boot()
    {
        parent::boot();
        static::created(function($order)
        {

//            if (!empty($question->notify_to)) {
//                $question->notify(new QuestionSubmitted($question));
//            }
        });
    }



}
