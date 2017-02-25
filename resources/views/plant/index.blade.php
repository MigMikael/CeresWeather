@extends('template')

@section('page_title', 'Plant')

@section('content')
    <div class="row">
        <div class="col-md-10 col-md-offset-1 col-xs-12 col-xs-offset-0">
            <div class="jumbotron" style="text-align: center;">
                <h1>Plant Data</h1>
                <p>plant picture from raspberry pi camera</p>
            </div>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Date</th>
                    <th>Original Image</th>
                    <th>Process Image</th>
                    <th>Compare</th>
                </tr>
                </thead>
                <tbody>
                @foreach($plants as $plant)
                    <tr>
                        <td>{{ $plant->id }}</td>
                        <td>{{ $plant->created_at }}</td>
                        <td>
                            <a href="{{ url('plant/original_image/'.$plant->id) }}" target="_blank">View</a>
                        </td>
                        <td>
                            <a href="{{ url('plant/process_image/'.$plant->id) }}" target="_blank">View</a>
                        </td>
                        <td>
                            <a href="{{ url('plant/'.$plant->id) }}" target="_blank">Compare</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop