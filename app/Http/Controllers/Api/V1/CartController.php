<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends ApiController
{

    /**
     * Create a new CartController instance.
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


    public function update($id, Request $request)
    {

    }


    public function destroy($id, Request $request)
    {

    }
}
