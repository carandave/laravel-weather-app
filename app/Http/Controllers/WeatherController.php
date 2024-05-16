<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class WeatherController extends Controller
{
    //
    public function weatherSearch(Request $request){
        $dataValidated = $request->validate([
            'search' => 'required',
        ]);

        $apiKey = 'f7c1c90ca2e7d90393d53358a0bf2fa1';

        $client = new Client();

        $response = $client->get("http://api.openweathermap.org/data/2.5/weather?q={$dataValidated['search']}&appid=$apiKey");
        $weatherData = json_decode($response->getBody(), true);

        $temperatureCelsius = $weatherData['main']['temp'];
        $weatherData['main']['temp'] = number_format($temperatureCelsius, 1) . '°C';
        // dd($weatherData);
        return view('admin.index', ['weatherData' => $weatherData]);

        

    }
}
