<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;

class GraphController extends Controller
{
    public function index()
    {
        $weathers = Weather::all();
        return view('graph', ['weathers' => $weathers]);
    }
}
