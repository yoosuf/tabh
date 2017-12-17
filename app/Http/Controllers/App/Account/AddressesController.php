<?php


namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;

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


    public function create(Request $request)
    {
        return view('app.account.addresses.create');
    }


    public function edit($id, Request $request)
    {

        $data = auth()->user()->addresses->find($id);
        return view('app.account.addresses.edit', get_defined_vars());
    }


    public function update($id, Request $request)
    {
        $user = auth()->user();
        $data = $user->addresses->find($id);

        $addressData = [
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_address_1'),
            'address2' => $request->get('address_address_2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
        ];

        $data->update(['addressable_id' => $user->id, 'addressable_type' => 'App\Entities\User'], $addressData);

        return redirect()->back();
    }



    public function store(Request $request)
    {

        $user = auth()->user();

        $request->validate([
            'address_name' => 'required|string|max:255',
            'address_phone' => 'required',
            'address_line_1' => 'required|string|max:255',
            'address_line_2' => 'required|string|max:255',
            'address_city' => 'required|string|max:255',
            'address_postcode' => 'required|string|max:255',
            //'address_country' => 'required|string|max:255',
            'address_province' => 'required|string|max:255',
        ], [
            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_line_1.required' => 'Line 1 is required',
            'address_line_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);

        $user->addresses()->create([
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_line_1'),
            'address2' => $request->get('address_line_2'),
            'city' => $request->get('address_city'),
            'province' => $request->get('address_province'),
            'postcode' => $request->get('address_postcode'),
            'country' => $request->get('address_country'),
        ]);

        flash('Successfully added')->success();
        return redirect()->back();

    }


    public function delete($id)
    {
        $data = auth()->user()->addresses->find($id);
//        if(count(auth()->user()->addresses) > 1)
            $data->delete();
//        else
//        {
//            $errors = new MessageBag();
//
//            // add your error messages:
//            $errors->add('Not Possible', 'Delete not possible');
//
//            return redirect()->back()->withErrors($errors);
//
//        }
        return redirect()->back();
    }


    public function makeDefault($id, Request $request)
    {

        $user = auth()->user();
        $data = auth()->user()->addresses->find($id);

        $addressData = [
            'default' => true,
        ];

        $data->update(['addressable_id' => $user->id, 'addressable_type' => 'App\Entities\User'], $addressData);

        foreach ($user->addresses as $data) {

            if ($data->id !== $id) {
                continue;
            }


            $addressData = [
                'default' => false,
            ];


            $data->update(['addressable_id' => $user->id, 'addressable_type' => 'App\Entities\User'], $addressData);

        }

        return redirect()->back();


    }

}