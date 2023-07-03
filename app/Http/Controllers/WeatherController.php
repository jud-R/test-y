<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function show($city)
    {
        return response()->json('il fait beau');
    }
}
