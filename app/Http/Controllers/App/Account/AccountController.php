<?php

namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('app.account.index');
    }


    public function create(Request $request)
    {

        return view('app.account.setup.create');
    }


    public function store(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }


    public function update(Request $request)
    {

    }
}