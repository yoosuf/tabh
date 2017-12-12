<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class LineItem extends Model
{

    protected $guarded = [];
  
    /**
      * Get the user that owns the phone.
      */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
