@extends('template')

@section('page_title', 'Weather Detail')

@section('content')
    <div class="row">
        <div class="col-md-4 col-md-offset-4 col-xs-12 col-xs-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $weather->created_at }}</h1>
                </div>
                <div class="panel-body">
                    <div class="col-md-12 col-md-offset-0">
                        <img src="{{ 'http://openweathermap.org/img/w/'.$weather->weather_icon.'.png' }}"
                             style="width: 200px; height: 200px" class="thumbnail">
                    </div>
                    <h3>Min Temperature :<b>{{ $weather->temp_min }}</b></h3>
                    <h3>Max Temperature :<b>{{ $weather->temp_max }}</b></h3>
                    <h3>Humidity :<b>{{ $weather->humidity }} %</b></h3>
                    <h3>Humidity(Sensor) :<b>{{ $weather->humidity_sensor }}</b></h3>
                    <h3>Clouds :<b>{{ $weather->clouds }} %</b></h3>
                    <h3>Wind Speed :<b>{{ $weather->wind_speed }} m/s</b></h3>
                </div>
                <div class="panel-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@stop