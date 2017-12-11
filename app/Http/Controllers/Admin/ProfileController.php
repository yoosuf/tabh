<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function edit(Request $request)
    {


        $data = auth()->user();

        return view('admin.account.profile.edit', get_defined_vars());
    }


    public function update(Request $request)
    {

        $user = $request->user();

        $request->validate([
            'full_name' => 'required|max:256',
            'customer_email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'customer_phone' => 'required|max:20|unique:users,phone,'.$user->id
        ]);
    }

}