@extends('template')

@section('page_title', 'Weather')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
            <div class="jumbotron" style="text-align: center;">
                <h1>Weather Data</h1>
                <p>Weather data from openweather's current weather data api </p>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Weather</th>
                    <th>Description</th>
                    <th>Detail</th>
                </tr>
                </thead>
                <tbody>
                @foreach($weathers as $weather)
                <tr>
                    <td>{{ $weather->id }}</td>
                    <td>{{ $weather->created_at }}</td>
                    <td>{{ $weather->weather_main }}</td>
                    <td>{{ $weather->weather_description }}</td>
                    <td>
                        <a href="{{ url('weather/'.$weather->id) }}" target="_blank">View</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop