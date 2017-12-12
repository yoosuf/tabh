<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use Notifiable;

    protected $guarded = [];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'preferences' => 'array',
    ];


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function line_items()
    {
        return $this->hasMany(LineItem::class);
    }

    public function address()
    {
        return $this->morphOne(Address::class, 'addressable');
    }

}
