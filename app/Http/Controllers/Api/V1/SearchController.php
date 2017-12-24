<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;

class SearchController extends ApiController
{

    /**
     * Create a new SearchController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['index', 'search']]);
    }


    public function index(Request $request) {

    }

    public function suggestion(Request $request) {

    }




    private function searchQuery()
    {

    }


    private function seaarchResult()
    {

    }
}
