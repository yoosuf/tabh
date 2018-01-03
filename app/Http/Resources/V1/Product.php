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
            "packsize" => (string) $this->packsize,
            "price" => number_format(((float)$this->price), 2, '.', ''),
            "provider" => new Partner($this->partner),
            "attachment" => isset($this->attachment) ? new Attachment($this->attachment) : json_decode("{}"),
        ];
    }



}
