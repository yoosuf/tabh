<?php

namespace App\Http\Controllers\Api\V1;


use Illuminate\Http\Request;

class PasswordController extends ApiController
{
    /**
     * Create a new PasswordController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['change']]);
    }



    public function change(Request $request)
    {

    }


    public function update(Request $request)
    {

    }


}