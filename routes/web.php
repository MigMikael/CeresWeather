<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('weather', 'WeatherController@index');
Route::get('weather/{id}', 'WeatherController@show');

Route::get('plant', 'PlantController@index');
Route::get('plant/{id}', 'PlantController@show');
Route::get('plant/original_image/{id}', 'PlantController@getOriginalPlantImage');
Route::get('plant/process_image/{id}', 'PlantController@getProcessPlantImage');

Route::get('test_url', 'BotController@testUrl');

Route::get('graph', 'GraphController@index');

