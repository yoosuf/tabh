<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAttachment;

class Product extends Model
{
    use HasAttachment;
    protected $guarded = [];

    public function partner()
    {
        return $this->belongsTo(Partner::class);
    }

    
}
