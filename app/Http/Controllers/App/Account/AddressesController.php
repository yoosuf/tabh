<?php


namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AddressesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');

    }


    public function index(Request $request)
    {

        $data = auth()->user()->addresses;
        return view('app.account.addresses.index', get_defined_vars());
    }

    public function edit(Request $request)
    {

        $data = auth()->user()->addresses;
        return view('app.account.addresses.index', get_defined_vars());
    }


    public function update($id, Request $request)
    {
        $data = auth()->user()->addresses->find($id);

    }



    public function store(Request $request)
    {

        $user = auth()->user();

        $user->addresses()->create([
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_line_1'),
            'address2' => $request->get('address_line_2'),
            'city' => $request->get('address_city'),
            'province' => $request->get('address_postcode'),
            'postcode' => $request->get('address_country'),
            'country' => $request->get('address_province'),
        ]);

        return response()->json(['message' => 'created'], 202);

    }


    public function delete($id)
    {
        $data = auth()->user()->addresses->find($id);
        $data->delete();
        return response()->json(['message' => 'deleted'], 202);
    }


    private function makeDefault()
    {
        //            'default' => $request->get(''),



    }

}