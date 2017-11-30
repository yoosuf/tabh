<?php


namespace App\Entities;


use Illuminate\Database\Eloquent\Model;

class AuthProvider  extends Model
{


    public $guarded = [];

    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }


}