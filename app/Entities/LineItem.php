<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{


  
    /**
      * Get the user that owns the phone.
      */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
