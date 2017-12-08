<?php

namespace App\Http\Controllers\App\Account;


use App\Entities\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AccountController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');

    }

    public function index()
    {
        return view('app.account.index');
    }


    public function create(Request $request)
    {

        return view('app.account.setup.create');
    }


    public function store(Request $request)
    {

    }

    public function edit(Request $request)
    {

    }


    public function update(Request $request)
    {
        $request->validate([
            'address_name' => 'required|string|max:255',
            'address_phone' => 'required',
            'address_address_1' => 'required|string|max:255',
            'address_address_2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            // 'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_address_1.required' => 'Line 1 is required',
            'address_address_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);




        $auth = auth()->user();
        $auth->primaryAddress()->create([
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_address_1'),
            'address2' => $request->get('address_address_2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
            'default' => true,
        ]);


        $user = User::find($auth->id);
        $user->is_complete = true;
        $user->save();
        

        
    }
}