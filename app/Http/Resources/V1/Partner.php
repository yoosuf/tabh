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




            "delivery_charge" => number_format(((float) $this->preferences['delivery_charge']), 2, '.', ''),
            "min_delivery_value" => number_format(((float) $this->preferences['min_delivery_value']), 2, '.', ''),
            "discount_percentage" => number_format(((float) $this->preferences['discount_percentage']), 2, '.', ''),
            "min_discount_amount" => number_format(((float) $this->preferences['min_discount_amount']), 2, '.', ''),
        ];

    }
}
