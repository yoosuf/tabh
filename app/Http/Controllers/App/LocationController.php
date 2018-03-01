<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Entities\City;
use App\Entities\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\City as CityResource;
use App\Http\Resources\V1\District as DistrictResource;

class LocationController extends Controller
{
    protected $district;
    protected $city;

    /**
     * Create a new AuthController instance.
     *
     * @param District $district
     * @param City $city
     */
    public function __construct(District $district, City $city)
    {
        $this->district = $district;
        $this->city = $city;
    }


    public function getDistricts(Request $request)
    {
        if ($request->ajax()) {
            $districts = $this->district->get();
            return DistrictResource::collection($districts);
        } else {
            return redirect()->to('/');
        }
    }

    public function getAreas($districtId, Request $request)
    {
        if ($request->ajax()) {
            $areas = $this->city->whereDistrictId($districtId)->get();
            return CityResource::collection($areas);
        } else {
            return redirect()->to('/');
        }
    }

}
