<?php

namespace App\Http\Controllers\App\Account;

use App\Entities\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit(Request $request)
    {
        return view('app.account.password.edit');
    }

    public function update(Request $request)
    {
        $request->validate(['password' => 'required|string|min:6|confirmed']);

        $requestData = $request->only('current_password', 'password', 'password_confirmation');
        $current_password = Auth::user()->password;
        if (Hash::check($requestData['current_password'], $current_password)) {
            $user_id = $request->user()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($requestData['password']);;
            $obj_user->save();
            flash('Password has been changed')->success();
            return redirect()->back();
        } else {
            flash('Please enter correct current password')->error();
            return redirect()->back();
        }
    }
}
