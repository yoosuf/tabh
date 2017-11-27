<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 11/27/17
 * Time: 7:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



}