<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;

class RegisterController extends ApiController
{
    /**
     * Create a new RegisterController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['register']]);
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register(Request $request)
    {
        return view('app.account.password.edit');
    }


}