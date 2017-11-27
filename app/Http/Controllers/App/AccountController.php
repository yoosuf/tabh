<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 11/27/17
 * Time: 3:08 PM
 */

namespace App\Http\Controllers\App;


use App\Http\Controllers\Controller;

class AccountController extends Controller
{


    public function __construct()
    {
    }


    public function index()
    {
        return view('app.account.orders');
    }
}