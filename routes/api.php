<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

// Todo all route in this page must have 'api' before

Route::post('store/data/weather', 'WeatherController@store');
Route::post('store/data/plant', 'PlantController@store');


Route::post('bot', 'BotController@handleMessage');

