<?php


namespace App\Http\Controllers\Admin;


use App\Entities\Country;
use App\Entities\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnersController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }


    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $data = Partner::paginate($limit);
        return view('admin.settings.partners.index', compact('data'));
    }


    public function create(Request $request)
    {

        $countries  = [];
        return view('admin.settings.partners.create', compact('countries'));
    }


    public function show($id, Request $request)
    {

    }


    public function store(Request $request)
    {
        $request->validate([
            'partner_name' => 'required|string|max:255',
            'partner_email' => 'required|email|max:255|unique:partners,email',
            'partner_phone' => 'required|max:255|unique:partners,phone',
            'partner_website' => 'required|max:255',

            'address_first_name' => 'nullable|max:255',
            'address_last_name' => 'nullable|max:255',
            'address_phone' => 'nullable|max:255',
            'address_address_1' => 'nullable|max:255',
            'address_address_2' => 'nullable|max:255',
            'address_city' => 'nullable|max:255',
            'address_postcode' => 'nullable|max:255',
            'address_province' => 'nullable|max:255',
            'address_country' => 'nullable|max:255',


        ], [
            'partner_name.required' => 'Partner name is required',
            'partner_email.required' => 'Email is required',
            'partner_email.email' => 'Email must be a valid email address.',
            'partner_phone.required' => 'Phone is required',
            'partner_website.required' => 'Phone is required',
            'address_first_name.required' => 'First name is required',
            'address_last_name.required' => 'Last name is required',
            'address_phone.required' => 'Phone is required',
            'address_address_1.required' => 'Line 1 is required',
            'address_address_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);
        $partner = Partner::create([
            'name' => $request->get('partner_name'),
            'email' => $request->get('partner_email'),
            'phone' => $request->get('partner_phone'),
            'website' => $request->get('partner_website'),
        ]);
        $partner->address()->create([
            'first_name' => $request->get('address_first_name'),
            'last_name' => $request->get('address_last_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_address_1'),
            'address2' => $request->get('address_address_2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
        ]);
        return redirect()->back();
    }


    public function edit($id)
    {

        $item = Partner::findOrFail($id);
        $countries = Country::get();
        return view('admin.settings.partners.edit', get_defined_vars());

    }

    public function update($id, Request $request)
    {

        $item = Partner::findOrFail($id);
        $countries = Country::get();

        $item->name     = $request->get('partner_name');
        $item->phone    = $request->get('partner_email');
        $item->email    = $request->get('partner_phone');
        $item->website  = $request->get('partner_website');
        $item->update();

        $addressData = [
            'first_name' => $request->get('address_first_name'),
            'last_name' => $request->get('address_last_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_address_1'),
            'address2' => $request->get('address_address_2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
        ];

        $item->address()->updateOrCreate(['addressable_id' => $item->id, 'addressable_type' => 'App\Entities\Partner'], $addressData);
        return redirect()->back();

    }

    public function destroy($id, Request $request)
    {

    }

}