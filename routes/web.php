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

Route::get('bot/medium_original_image/{id}', 'PlantController@getMediumOriginalImage');
Route::get('bot/medium_process_image/{id}', 'PlantController@getMediumProcessImage');

Route::get('bot/small_original_image/{id}', 'PlantController@getSmallOriginalImage');
Route::get('bot/small_process_image/{id}', 'PlantController@getSmallProcessImage');

Route::get('test_url', 'BotController@testUrl');

