<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $request->validate(['password' => 'required|string|min:6|confirmed']);

        $requestData = $request->only('current_password', 'password', 'password_confirmation');
        $current_password = auth()->guard('admin')->user()->password;
        if (Hash::check($requestData['current_password'], $current_password)) {
            $obj_user = auth()->guard('admin')->user();
            $obj_user->password = Hash::make($requestData['password']);;
            $obj_user->save();
            return redirect()->back()->with('status', 'Password has been changed');
        } else {
            return redirect()->back()->with('danger', 'Please enter correct current password');
        }
    }

}
