<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $primaryKey = 'id';

    public $guarded = [];

    public $timestamps = false;


}
