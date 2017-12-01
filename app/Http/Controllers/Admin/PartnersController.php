<?php


namespace App\Http\Controllers\Admin;


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
            'partner_email' => 'required|string|max:255',
            'partner_phone' => 'required|max:255|unique:users',
            'partner_logo' => 'image',
        ], [
            'partner_name.required' => 'Partner name is required',
            'partner_email.required' => 'Email is required',
            'partner_email.email' => 'Email must be a valid email address.',
            'partner_phone.required' => 'Phone is required',
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