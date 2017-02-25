<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Weather extends Model
{
    public $timestamps = true;

    protected $table = 'weathers';

    protected $fillable = [
        'temp_min',
        'temp_max',
        'humidity',
        'humidity_sensor',
        'clouds',
        'wind_speed',
        'weather_main',
        'weather_description',
        'weather_icon',
    ];
}
