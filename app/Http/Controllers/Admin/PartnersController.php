<?php

namespace App\Http\Controllers\Admin;


use App\Entities\Country;
use App\Entities\Partner;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PartnersController extends Controller
{
    protected $partner;

    public function __construct(Partner $partner)
    {
        $this->middleware('admin');

        $this->partner = $partner;

    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $data = $this->partner->orderBy('id', 'desc')->paginate($limit);
        return view('admin.settings.partners.index', get_defined_vars());
    }


    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request)
    {
        $countries = [];
        $address = [];
        return view('admin.settings.partners.create', get_defined_vars());
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
            'partner_website' => 'nullable|url|max:255',
            'partner_status' => 'required|boolean',

            'partner_api' => 'nullable|url|max:255',
            'partner_api_key' => 'nullable|string|max:255',
            'partner_min_discount_amount' => 'nullable|numeric',
            'partner_discount_percentage' => 'nullable|numeric',


            'address_name' => 'nullable|string|max:255',
            'address_phone' => 'nullable|required',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_postcode' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',


        ], [
            'partner_name.required' => 'Partner name is required',
            'partner_email.required' => 'Email is required',
            'partner_email.email' => 'Email must be a valid email address.',
            'partner_phone.required' => 'Phone is required',
            'partner_website.required' => 'website is required',

            'address_name.required' => 'Name is required',
            'address_phone.required' => 'Phone is required',
            'address_line_1.required' => 'Line 1 is required',
            'address_line_2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);

        $partnerData = [
            'api' => $request->get('partner_api'),
            'api_key' => $request->get('partner_api_key'),
            'min_discount_amount' => $request->get('partner_min_discount_amount'),
            'discount_percentage' => $request->get('partner_discount_percentage'),
            'min_delivery_amount' => $request->get('partner_min_delivery_amount'),
            'delivery_charge' => $request->get('partner_delivery_charge'),
        ];


        $partner = Partner::create([
            'name' => $request->get('partner_name'),
            'email' => $request->get('partner_email'),
            'phone' => $request->get('partner_phone'),
            'website' => $request->get('partner_website'),
            'preferences' => $partnerData,
            'is_active' => $request->get('partner_status')

        ]);
        $addressData = [
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_line1'),
            'address2' => $request->get('address_line2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
        ];

        $partner->address()->updateOrCreate(['addressable_id' => $partner->id, 'addressable_type' => 'App\Entities\Partner'], $addressData);

        flash('Successfully created')->success();
        return redirect()->route('admin.partners.edit', ['id' => $partner->id]);
    }


    public function edit($id)
    {

        $item = Partner::findOrFail($id);
        $address = $item->address;
        $countries = Country::get();
        return view('admin.settings.partners.edit', get_defined_vars());

    }

    public function update($id, Request $request)
    {

        $item = Partner::findOrFail($id);


        $request->validate([
            'partner_name' => 'required|string|max:255',
            'partner_email' => 'required|email|max:255|unique:partners,email,' . $id,
            'partner_phone' => 'nullable|max:255|unique:partners,phone,' . $id,
            'partner_website' => 'nullable|url|max:255',
            'partner_status' => 'required|boolean',
            'partner_api' => 'nullable|url|max:255',
            'partner_api_key' => 'nullable|string|max:255',
            'partner_min_discount_amount' => 'nullable|numeric',
            'partner_discount_percentage' => 'nullable|numeric',

            'address_name' => 'nullable|string|max:255',
            'address_phone' => 'nullable',
            'address_line_1' => 'nullable|string|max:255',
            'address_line_2' => 'nullable|string|max:255',
            'address_city' => 'nullable|string|max:255',
            'address_postcode' => 'nullable|string|max:255',
            'address_country' => 'nullable|string|max:255',
            'address_province' => 'nullable|string|max:255',


        ], [
            'partner_name.required' => 'Partner name is required',
            'partner_email.required' => 'Email is required',
            'partner_email.email' => 'Email must be a valid email address.',
            'partner_phone.required' => 'Phone is required',
            'partner_website.required' => 'Phone is required',
            'address_first_name.required' => 'First name is required',
            'address_last_name.required' => 'Last name is required',
            'address_phone.required' => 'Phone is required',
            'address_line1.required' => 'Line 1 is required',
            'address_line2.required' => 'Line 2 is required',
            'address_city.required' => 'City is required',
            'address_postcode.required' => 'Postcode is required',
            'address_province.required' => 'Province is required',
            'address_country.required' => 'Country is required',
        ]);


        $partnerData = [
            'api' => $request->get('partner_api'),
            'api_key' => $request->get('partner_api_key'),
            'min_discount_amount' => $request->get('partner_min_discount_amount'),
            'discount_percentage' => $request->get('partner_discount_percentage'),
            'min_delivery_value' => $request->get('partner_min_delivery_value'),
            'delivery_charge' => $request->get('partner_delivery_charge'),
        ];



        $item->name = $request->get('partner_name');
        $item->email = $request->get('partner_email');
        $item->phone = $request->get('partner_phone');
        $item->website = $request->get('partner_website');
        $item->preferences = $partnerData;
        $item->is_active = $request->get('partner_status');


        $item->update();

        $addressData = [
            'name' => $request->get('address_name'),
            'phone' => $request->get('address_phone'),
            'address1' => $request->get('address_line1'),
            'address2' => $request->get('address_line2'),
            'city' => $request->get('address_city'),
            'postcode' => $request->get('address_postcode'),
            'province' => $request->get('address_province'),
            'country' => $request->get('address_country'),
            'default' => true,
        ];

        $item->address()->updateOrCreate(['addressable_id' => $item->id, 'addressable_type' => 'App\Entities\Partner'], $addressData);

        flash('Successfully updated')->success();
        return redirect()->back();

    }

    public function destroy($id, Request $request)
    {

    }

}