<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Invite extends Model
{

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
