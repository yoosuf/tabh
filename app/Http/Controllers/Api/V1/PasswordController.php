<?php

namespace App\Http\Controllers\Api\V1;


use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PasswordController extends ApiController
{
    /**
     * Create a new PasswordController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }



    public function edit(Request $request)
    {
        return view('app.account.password.edit');
    }


    public function update(Request $request)
    {

//        $validator = $request->validate([
//            'current_password' => 'required|max:20',
//            'password' => 'required|string|min:6|max:20',
//            'password_confirmation' => 'required|same:password'
//        ]);


//        $validator->after(function($validator) use ($request) {
//            $check = auth()->validate([
//                'email'    => auth()->user()->email,
//                'password' => $request->current_password
//            ]);
//
//            if (!$check):
//                $validator->errors()->add('current_password',
//                    'Your current password is incorrect, please try again.');
//            endif;
//        });
//
//        if ($validator->fails()):
//            return redirect('account/password')
//                ->withErrors($validator)
//                ->withInput();
//        endif;
//
//        $this->user->password = bcrypt($request->password);
//        $this->user->save();



        $request->validate(
            ['password' => 'required|string|min:6|confirmed',]
        );


        $requestData = $request->only('current_password', 'password', 'password_confirmation');



        $current_password = Auth::user()->password;
        if(Hash::check($requestData['current_password'], $current_password))
        {
            $user_id = $request->user()->id;
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($requestData['password']);;
            $obj_user->save();
            flash('Password has been changed')->success();
            return redirect()->back();
        }
        else
        {
//            $error = array('current-password' => 'Please enter correct current password');
//            return response()->json(array('error' => $error), 400);

            flash('Please enter correct current password')->error();
            return redirect()->back();
        }


    }
}