@extends('template')

@section('title', 'Graph')

@section('content')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Hour', 'Temp_Min', 'Temp_Max'],
                @foreach($weathers as $weather)
                ['{{ $weather->created_at }}', {{ $weather->temp_min }}, {{ $weather->temp_max }}],
                @endforeach
            ]);

            var options = {
                title: 'Temperature',
                curveType: 'none',
                legend: { position: 'bottom' }
            };

            var chart = new google.visualization.LineChart(document.getElementById('line_chart'));

            chart.draw(data, options);
        }
    </script>
    <div class="row col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
        <div id="line_chart" style="height: 400px;border: solid"></div>
    </div>
@stop