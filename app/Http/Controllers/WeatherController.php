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
<<<<<<< HEAD
        $request->validate([
            'city' => 'required|string|alpha'
        ], [
            'city.required' => 'City is required',
            'city.string' => 'City must be a string',
            'city.alpha' => 'City must contain only letters'
        ]);
        
=======
>>>>>>> d67b024 (Resolved merge conflicts)
        $defaultCity = 'Omsk';
        $city = $request->input('city', $city) ?: $defaultCity;

        $weather = $this->weatherService->getWeather($city);


        // return view('weather.show', compact('weather'));
        return view('welcome', [
            'weather' => $weather,
            'city' => $city, // Always set city to ensure it's defined in the view
        ]);
    }
}
