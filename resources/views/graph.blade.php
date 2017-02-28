@extends('template')

@section('title', 'Graph')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Time', 'Temp_Min', 'Temp_Max'],
                @foreach($weathers as $weather)
                ['{{ date('G.i', strtotime($weather->created_at)) }}', {{ $weather->temp_min }}, {{ $weather->temp_max }}],
                @endforeach
            ]);

            var options = {
                title: 'Temperature {{ date('F d, Y', strtotime($weathers[0]->created_at)) }}',
                curveType: 'none',
                legend: { position: 'bottom' },
                //backgroundColor: '#FAFAFA'
            };



            var data2 = google.visualization.arrayToDataTable([
                ['Time', 'Humidity', 'Sensor Humidity'],
                    @foreach($weathers as $weather)
                ['{{ date('G.i', strtotime($weather->created_at)) }}', {{ $weather->humidity }}, {{ $weather->humidity_sensor }}],
                @endforeach
            ]);

            var options2 = {
                title: 'Humidity {{ date('F d, Y', strtotime($weathers[0]->created_at)) }}',
                hAxis: {title: 'Time',  titleTextStyle: {color: '#333'}},
                vAxis: {minValue: 0}
            };



            var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
            chart.draw(data, options);

            var chart2 = new google.visualization.AreaChart(document.getElementById('area_chart'));
            chart2.draw(data2, options2);
        }
    </script>

    <div class="row col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <div class="jumbotron card-header">
            <h1>Visualization data</h1>
            <p>change the way our analysts work with data - look at data differently, more imaginatively</p>
        </div>
    </div>
    <div class="row col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <div id="line_chart" style="height: 400px"></div>
    </div>

    <div class="row col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
        <div id="area_chart" style="height: 400px"></div>
    </div>
@stop