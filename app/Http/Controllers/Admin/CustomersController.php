<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Order;
use App\Entities\User;
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
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $data = User::paginate($limit);
        return view('admin.customers.index', compact('data'));
    }

    public function create(Request $request)
    {

    }



    public function store(Request $request)
    {

    }


    public function show($id, Request $request)
    {

    }

    public function edit($id,  Request $request)
    {
        $data = User::findOrFail($id);
        $orders = Order::get();
        return view('admin.customers.edit', compact('data', 'orders'));
    }

    public function update($id, Request $request)
    {

    }

    public function destroy($id, Request $request)
    {

    }

}