<?php
/**
 * Created by PhpStorm.
 * User: yoosuf
 * Date: 11/27/17
 * Time: 7:08 PM
 */

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }



    public function index(Request $request)
    {
        return view('admin.customers.index');

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