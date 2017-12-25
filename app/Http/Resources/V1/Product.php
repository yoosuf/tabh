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
            "title" => (string) $this->title,
            "generic_name" => (string) $this->generic_name,
            "description" =>(string) $this->body_html,
            "vendor" => (string) $this->vendor,
            "product_type" => (string) $this->product_type,
            "price" => (string) $this->price,
            "packsize" => (string) $this->packsize,
            "created_at" => (string) $this->created_at->toDateTimeString(),
            "provider" => new Partner($this->partner),
        ];
    }



}
