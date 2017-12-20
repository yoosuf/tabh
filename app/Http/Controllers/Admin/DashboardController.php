<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    public function __construct()
    {
         $this->middleware('admin');
    }


    public function index(Request $request)
    {

        return view('admin.dashboard', get_defined_vars());

    }


    public function create(Request $request)
    {

    }


    public function show($id, Request $request)
    {

    }


    public function store(Request $request)
    {

    }


    public function edit($id)
    {

    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}