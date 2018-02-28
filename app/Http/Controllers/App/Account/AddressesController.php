<?php


namespace App\Http\Controllers\App\Account;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\MessageBag;
use App\Entities\City;
use App\Entities\District;
use App\Entities\Country;

class AddressesController extends Controller
{

    private $city;
    private $province;
    private $country;

    public function __construct(City $city,
                                District $province,
                                Country $country)
    {
        $this->middleware('auth');
        $this->city = $city;
        $this->province = $province;
        $this->country = $country;
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
        $this->validateAddressRequest($request);
        $this->addressUpdateOrCreate($user, $request);
        flash('Successfully updated')->success();
        return redirect()->to('/account/address');

    }



    public function store(Request $request)
    {
        $user = auth()->user();
        $this->validateAddressRequest($request);
        $this->addressUpdateOrCreate($user, $request);
        flash('Successfully added')->success();
        return redirect()->to('/account/address');
    }


    public function delete($id)
    {
        $data = auth()->user()->addresses->find($id);
        $data->delete();
        return redirect()->back();
    }


    public function makeDefault($id, Request $request)
    {

        $user = auth()->user();
        $this->addressUpdateOrCreate($user, $request);

        foreach ($user->addresses as $data) {
            if ($data->id !== $id) {
                continue;
            }
            $this->addressUpdateOrCreate($user, $request);
        }

        return redirect()->back();
    }




    protected function validateAddressRequest($request)
    {
      return $request->validate([
          'address_name' => 'required|string|max:255',
          'address_phone' => 'required',
          'address_line_1' => 'required|string|max:255',
          'address_line_2' => 'nullable|string|max:255',
          'address_province' => 'required|string|max:255',
          'address_postcode' => 'required|string|max:255',
          'address_city' => 'required|string|max:255',
      ], [
          'address_name.required' => 'Name is required',
          'address_phone.required' => 'Phone is required',
          'address_line_1.required' => 'Line 1 is required',
          'address_province.required' => 'District is required',
          'address_postcode.required' => 'Postcode is required',
          'address_city.required' => 'City is required',
      ]);
    }


    protected function addressUpdateOrCreate($user, $request)
    {

      $cityData = $this->city->find($request->get('address_city'));
      $provinceData = $this->province->find($request->get('address_province'));
      $countryData = $this->country->find(18);

      return $user->addresses()->updateOrCreate([
        'addressable_id' => $user->id,
        'addressable_type' => 'App\Entities\User'
      ], [
        'name' => $request->get('address_name'),
        'phone' => $request->get('address_phone'),
        'address1' => $request->get('address_line_1'),
        'address2' => $request->get('address_line_2'),
        'city' => $cityData->name,
        'city_id' => $cityData->id,
        'district' => $provinceData->name,
        'district_id' => $provinceData->id,
        'postcode' => $request->get('address_postcode'),
        'country' => $countryData->nice_name,
        'country_id' => $countryData->id,
        'default' => true,
      ]);
    }

}
