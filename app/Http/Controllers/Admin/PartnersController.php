<?php


namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class PartnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


}