<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $weathers = Weather::orderBy('id', 'desc')->get();

        return view('weather.index', ['weathers' => $weathers]);
    }

    public function show($id)
    {
        $weather = Weather::findOrFail($id);
        return view('weather.show', ['weather' => $weather]);
    }

    public function store(Request $request)
    {
        $weather = $request->all();
        Weather::create($weather);

        return response()->json(['msg' => 'store weather data complete']);
    }
}
