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
        $data = User::with('primaryAddress')->paginate($limit);
        return view('admin.customers.index', compact('data'));
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
            'address_first_name' => 'required|string|max:255',
            'address_last_name' => 'required|string|max:255',
            'address_customer_phone' => 'required',
            'address_address_1' => 'required|string|max:255',
            'address_address_2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'customer_name.required' => 'Name is required',
            'customer_email.required' => 'Email is required',
            'customer_email.email' => 'Email must be a valid email address.',
            'customer_phone.required' => 'Phone is required',
            'address_first_name.required' => 'First name is required',
            'address_last_name.required' => 'Last name is required',
            'address_customer_phone.required' => 'Phone is required',
            'address_address_1.required' => 'Line 1 is required',
            'address_address_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);


//        $user  = User::create([
//            'first_name' => $faker->firstName,
//            'last_name' => $faker->lastName,
//            'email' => $faker->email,
//        ]);
//
//
//        $address = [
//            'first_name' => $user->firstName,
//            'last_name' => $user->lastName,
//            'phone' => $faker->phoneNumber,
//            'address1' => $faker->streetName,
//            'address2' => $faker->streetAddress,
//            'city' => $faker->city,
//            'province' => $faker->streetAddress,
//            'postcode' => $faker->postcode,
//            'country' => $faker->country,
//            'default' => 1,
//        ];
//
//        $user->addresses()->create($address);


    }


    public function show($id, Request $request)
    {
        $data = User::findOrFail($id);
        $orders = Order::get();
        return view('admin.customers.show', compact('data', 'orders'));

    }

    public function edit($id,  Request $request)
    {
        $item = User::with('primaryAddress')->findOrFail($id);
        $countries = Country::get();
        return view('admin.customers.edit', get_defined_vars());
    }

    public function update($id, Request $request)
    {


        $request->validate([
            'customer_name' => 'required|string|max:255',
            'customer_email' => 'required|string|email|max:255|unique:users,email,'.$request->id,
            'customer_phone' => 'nullable|max:255|unique:users,phone,'.$request->id,
            'address_first_name' => 'required|string|max:255',
            'address_last_name' => 'required|string|max:255',
            'address_customer_phone' => 'required',
            'address_address_1' => 'required|string|max:255',
            'address_address_2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|max:255',
            'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'customer_name.required' => 'Name is required',
            'customer_email.required' => 'Email is required',
            'customer_email.email' => 'Email must be a valid email address.',
            'customer_phone.required' => 'Phone is required',
            'address_first_name.required' => 'First name is required',
            'address_last_name.required' => 'Last name is required',
            'address_customer_phone.required' => 'Phone is required',
            'address_address_1.required' => 'Line 1 is required',
            'address_address_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);




    }

    public function destroy($id, Request $request)
    {

    }

}