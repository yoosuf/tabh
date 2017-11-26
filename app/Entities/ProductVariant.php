<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{



  /**
    * Get the user that owns the phone.
    */
    public function order()
    {
        return $this->belongsTo(Product::class);
    }
}
