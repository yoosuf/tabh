<?php

namespace App\Http\Controllers\Api\V1;


use App\Entities\City;
use App\Entities\District;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\City as CityResource;
use App\Http\Resources\V1\District as DistrictResource;

class LocationController  extends ApiController
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
        $this->city  = $city;
    }


    public function getDistricts()
    {
        $districts = $this->district->get();
        return DistrictResource::collection($districts);
    }



    public function getAreas($districtId)
    {
        $areas = $this->city->whereDistrictId($districtId)->get();
        return CityResource::collection($areas);
    }

}