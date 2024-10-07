<?php

namespace App\Http\Controllers;
use App\Services\WeatherService;
use Illuminate\Http\Request;



class WeatherController extends Controller
{
    protected $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }


    public function show(Request $request,$city = null)
    {
        // $request->validate([
        //     'city' => 'required|string|alpha'
        // ]);
        
        $defaultCity = 'Omsk';
        $city = $request->input('city', $city) ?: $defaultCity;

        $weather = $this->weatherService->getWeather($city);


        return view('welcome', [
            'weather' => $weather,
            'city' => $city, 
        ]);
    }
}
