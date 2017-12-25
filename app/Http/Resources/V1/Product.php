<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\Resource;

class Product extends Resource
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
            "id" => $this->id,
            "title" => $this->title,
            "generic_name" => $this->generic_name,
            "description" => $this->body_html,
            "vendor" => $this->vendor,
            "product_type" => $this->product_type,
            "price" => $this->price,
            "packsize" => $this->packsize,
            "created_at" => $this->created_at,
            "provider" => new Partner($this->partner),
        ];
    }



}
