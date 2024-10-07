<?php

namespace App\Services;
use GuzzleHttp\Client;






class WeatherService
{
    protected $client;
    protected $apiKey;

    public function __construct()
    {
        $this->client = new Client();
        $this->apiKey = env('WEATHER_API_KEY');
    }


    public function getWeather($city)
    {
        $response = $this->client->get("http://api.openweathermap.org/data/2.5/weather", [
            'query' => [
                'q' => $city,
                'appid' => $this->apiKey,
                'units' => 'metric',
                'timeout' => 60, 
                'connect_timeout' => 60 
            ],
            [
                'curl' => [
                    CURLOPT_IPRESOLVE => CURL_IPRESOLVE_V4,
            ]
          ]
        ]);

        return json_decode($response->getBody()->getContents());
    }
}