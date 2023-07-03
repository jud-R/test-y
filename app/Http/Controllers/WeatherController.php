<?php

namespace App\Http\Controllers;

use App\Models\City;
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
            if (isset ($weatherData['forecast']))
            {

                $cityWeather = City::firstOrCreate(['name' => $city]);


                $forecastToday = $weatherData['forecast']['forecastday'][0]['hour'][12];
                $forecastTomorrow = $weatherData['forecast']['forecastday'][1]['hour'][12];
    
                $weather= new Weather();
                $weather->city_id = $cityWeather->id;
                $weather->today = $forecastToday['condition']['text'];
                $weather->tomorrow = $forecastTomorrow['condition']['text'];
                $weather->save();
    
                return response()->json(['ok']);
            } else
            {
                return response()->json(['status' => 'failed', 'message' => 'Ville inconnue']);
            }
        } else {
        return response()->json(['status' => 'failed', 'message' => 'erreur']);
    }
}

}