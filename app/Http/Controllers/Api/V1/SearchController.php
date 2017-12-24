<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends ApiController
{

    /**
     * Create a new SearchController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }



    public function index(Request $request) {

    }

    public function search(Request $request) {

    }






    private function searchQuery()
    {

    }


    private function seaarchResult()
    {

    }
}
