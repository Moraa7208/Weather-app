<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;



Route::get('/', [WeatherController::class, 'show']);

<<<<<<< HEAD
=======
Route::post('/weather/{city?}', [WeatherController::class, 'show'])->name("city.store");
>>>>>>> d67b024 (Resolved merge conflicts)
