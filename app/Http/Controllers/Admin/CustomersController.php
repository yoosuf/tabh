<?php

namespace App\Http\Controllers\Admin;

use App\Entities\Country;
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
        $data = User::with(['primaryAddress', 'orders'])->paginate($limit);



        return view('admin.customers.index', get_defined_vars());
    }

    public function create(Request $request)
    {
        return view('admin.customers.create');

    }



    public function store(Request $request)
    {


        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|string|email|max:255|unique:users',
            'customer_phone' => 'required|string|max:255|unique:users',


            'address_name' => 'required|string|max:255',
            'address_phone' => 'required',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'customer_name.required' => 'Name is required',
            'customer_email.required' => 'Email is required',
            'customer_email.email' => 'Email must be a valid email address.',
            'customer_phone.required' => 'Phone is required',


            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_line_1.required' => 'Line 1 is required',
            'address_line_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);


        $user  = User::create([
            'name' => $request->get('customer_name'),
            'phone' =>$request->get('customer_phone'),
            'email' => $request->get('customer_email'),
        ]);


        $address = [
            'name' => $request->get('customer_name'),
            'phone' => $request->get('customer_name'),
            'address1' => $request->get('address_address_1'),
            'address2' => $request->get('address_address_2'),
            'city' => $request->get('address_city'),
            'province' => $request->get('address_province'),
            'postcode' => $request->get('address_postcode'),
            'country' => $request->get('address_country'),
            'default' => 1,
        ];

        $user->addresses()->create($address);


        flash('Successfully created')->success();
        return redirect()->route('admin.customers.edit', ['id' => $user->id]);
    }


    public function show($id, Request $request)
    {
        $data = User::findOrFail($id);
        $orders = Order::get();
        return view('admin.customers.show', compact('data', 'orders'));

    }

    public function edit($id,  Request $request)
    {
        $item = User::findOrFail($id);
        $countries = Country::get();
        $address = $item->primaryAddress()->get();
        return view('admin.customers.edit', get_defined_vars());
    }

    public function update($id, Request $request)
    {


        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'customer_phone' => 'nullable|max:255|unique:users,phone,'.$request->id,


            'address_name' => 'required|string|max:255',
            'address_phone' => 'required',
            'address_line1' => 'required|string|max:255',
            'address_line2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',

        ], [
            'customer_name.required' => 'Name is required',
            'customer_email.required' => 'Email is required',
            'customer_email.email' => 'Email must be a valid email address.',
            'customer_phone.required' => 'Phone is required',

            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_line1.required' => 'Line 1 is required',
            'address_line2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);


        flash('Successfully updated')->success();
        return redirect()->back();


    }

    public function destroy($id, Request $request)
    {

    }

}