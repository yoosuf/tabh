<?php


namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }



    public function edit(Request $request)
    {
        return view('app.account.addresses.index');
    }


    public function update(Request $request)
    {

    }

}