<?php

namespace App\Utils\EPharma;
use GuzzleHttp\Client;

class Drug
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.e_pharma.url'),
            'headers' => [
                'api-key' => config('services.e_pharma.api_key'),
                'Content-Type' => 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW',
            ],
            'http_errors' => false,    //for not throwing exception
        ]);
    }

    public function list($page = 0, $name = '')
    {
        $url = "api/product-list?page=$page";
        if ($name != '') {
            $url = $url . "&name=$name";
        }
        $response = $this->client->get($url);
        return json_decode($response->getBody()->getContents());
    }

    public function checkout($data)
    {
        $response = $this->client->post('api/telenor-checkout', [
            'form_params' => $data
        ]);
        return json_decode($response->getBody()->getContents());
    }

    public function orderStatus($order_id)
    {
        $response = $this->client->post('api/order-status', [
            'form_params' => [
                'order_id' => $order_id,
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }

    public function cancelOrder($order_id)
    {
        $response = $this->client->post('api/cancel-order', [
            'form_params' => [
                'order_id' => $order_id,
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }
}