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
        $item = auth()->guard('admin')->user();
        return view('admin.account.profile.edit', get_defined_vars());
    }


    public function update(Request $request)
    {
        $user = auth()->guard('admin')->user();
        $request->validate([
            'name' => 'required|max:256',
            'email' => 'required|string|email|max:255|unique:admins,email,'.$user->id,
        ]);

        $user->name = $request->get('name');
        $user->name = $request->get('email');
        $user->save();

        flash('Successfully created')->success();
        return redirect()->route('admin.account.profile');

    }

}
