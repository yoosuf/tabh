<?php

namespace App\Http\Controllers\App;

class Address
{


    private $address;


    public function __construct(\App\Entities\Address $address)
    {
        $this->address = $address;
    }


    /**
     * @param $addressId
     * @return array
     */
    public function find($addressId)
    {
        $address = $this->address->firstOrFail($addressId);

        return [
            'name' => $address->name,
            'phone' => $address->phone,
            'address1' => $address->line1,
            'address2' => $address->line2,
            'city' => $address->city,
            'city_id' => $address->city_id,
            'postcode' => $address->postcode,
            'district' => $address->province,
            'district_id' => $address->district_id,
            'country' => $address->country,
            'country_id' => $address->country_id,
            'default' => $address->default,
        ];
    }

    /**
     * @param null $id
     * @param null $model
     * @param $data
     * @param bool $isDefault
     * @return
     */
    public function updateOrCreate($id = null, $model = null, $data, $isDefault = false)
    {
        return $this->address->updateOrCreate([
            'addressable_id' => $id,
            'addressable_type' => $model
        ],[
            'name' => $data['address_name'],
            'phone' => $data['address_phone'],
            'address1' => $data['address_line_1'],
            'address2' => $data['address_line_2'],
            'city' => $data['address_city'],
            'city_id' => $data['address_city_id'],
            'district' => $data['address_province'],
            'district_id' => $data['address_province_id'],
            'postcode' => $data['address_postcode'],
            'country' => $data['address_country'],
            'country_id' => $data['address_country_id'],
            'default' => $isDefault,
        ]);
    }


}