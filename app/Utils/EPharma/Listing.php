<?php

namespace App\Utils\EPharma;
use GuzzleHttp\Client;

class Listing
{
    protected $client;

    public function __construct()
    {
        $partner = \App\Entities\Partner::where('email', 'info@epharma.com.bd')->firstOrFail();

        $this->client = new Client([
            'base_uri' => $partner['preferences']['api'],
            'headers' => [
                'api-key' => $partner['preferences']['api_key'],
                'Content-Type' => 'multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW',
            ],
            'http_errors' => false,    //for not throwing exception
        ]);
    }

    public function districts()
    {
        $response = $this->client->get('/api/district-list');
        return json_decode($response->getBody()->getContents());
    }

    public function areas($district_id)
    {
        $response = $this->client->post('/api/area-list', [
            'form_params' => [
                'district_id' => $district_id
            ]
        ]);
        return json_decode($response->getBody()->getContents());
    }
}