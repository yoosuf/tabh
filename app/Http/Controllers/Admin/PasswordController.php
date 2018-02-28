<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit(Request $request)
    {
        return view('admin.account.password.edit');
    }

    public function update(Request $request)
    {

        $validator = $request->validate([
            'current_password' => 'required|max:20',
            'password' => 'required|string|min:6|max:20',
            'password_confirmation' => 'required|same:password'
        ]);
    }

}
