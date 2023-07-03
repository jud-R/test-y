<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function show($city)
    {
        $apiKey = env('WEATHER_API_KEY');

        $response = Http::get("http://api.weatherapi.com/v1/forecast.json?key={$apiKey}&q={$city}&days=2&lang=fr");

        if($response->successful()){

            $weatherData = $response->json();

            $forecastToday = $weatherData['forecast']['forecastday'][0]['hour'][12];
            $forecastTomorrow = $weatherData['forecast']['forecastday'][1]['hour'][12];

            $weather= new Weather();

            return response()->json([
                'today' => $forecastToday['condition']['text'],
                'tomorrow' => $forecastTomorrow['condition']['text'],
            ]);

        } else {
        return response()->json('marche pas');
    }
}

}