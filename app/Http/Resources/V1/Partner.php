<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class Partner extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "name" => $this->name,
            "delivery_charge" => (string) $this->preferences['delivery_charge'],
            "min_delivery_value" => (string) $this->preferences['min_delivery_value'],
            "discount_percentage" => (string) $this->preferences['discount_percentage'],
            "min_discount_amount" => (string) $this->preferences['min_discount_amount'],
        ];
     
    }
}
