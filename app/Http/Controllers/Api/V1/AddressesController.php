<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class AddressesController extends ApiController
{

    /**
     * Create a new AddressesController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index(Request $request) {

    }


    public function store(Request $request)
    {

    }

    public function show(Request $request)
    {

    }


    public function update($id, Request $request)
    {

    }


    public function destroy($id, Request $request)
    {

    }



    public function setDefault($id, Request $request)
    {

    }
}
