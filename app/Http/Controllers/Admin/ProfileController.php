<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
            'full_name' => 'required|max:256',
            'email' => 'required|string|email|max:255|unique:admins,email,' . $user->id,
        ]);

        $user->name = $request->get('full_name');
        $user->email = $request->get('email');
        $user->save();
        return redirect()->route('admin.account.profile')->with('status', 'Successfully updated');

    }

}
