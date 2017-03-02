<?php

namespace App\Http\Controllers;

use App\Weather;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GraphController extends Controller
{
    public function index()
    {
        $weathers = Weather::where('created_at', '>=', Carbon::today())->get();
        return view('graph', ['weathers' => $weathers]);
    }
}
