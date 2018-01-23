<?php

namespace App\Utils\EPharma;
use GuzzleHttp\Client;

class Auth
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => config('services.e_pharma.url'),
            'headers' => [
                'API_KEY' => config('services.e_pharma.api_key'),
                'Content-Type' => 'application/x-www-form-urlencoded',
            ],
            'http_errors' => false,    //for not throwing exception
        ]);
    }

    public function token()
    {
        $response = $this->client->post('token', [
            'form_params' => [
                'grant_type' => 'password',
                'username' => config('services.e_pharma.username'),
                'password' => config('services.e_pharma.password'),
            ]
        ]);
        return [
            'body' => json_decode($response->getBody()->getContents()),
            'statusCode' => $response->getStatusCode()
        ];
    }
}