<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class CartController extends ApiController
{

    /**
     * Create a new CartController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'store', 'update', 'destroy']]);
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


    public function search(Request $request)
    {

    }
}
