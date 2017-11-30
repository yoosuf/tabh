<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Partner extends Model
{
    use Notifiable;



    protected $guarded = [];




    public function products()
    {
        return $this->hasMany(Product::class);
    }

}
