<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class ProfileController extends ApiController
{
    /**
     * Create a new ProfileController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }



    public function me()
    {

    }


    /**
     * @param $id
     * @param Request $request
     */
    public function update($id, Request $request)
    {

    }
}
