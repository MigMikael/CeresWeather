@extends('template')

@section('page_title', 'Plant Detail')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2 col-xs-12 col-xs-offset-0">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>{{ $plant->created_at }}</h1>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <img src="{{ url('plant/original_image/'.$plant->id) }}"
                             style="width: 250px; height: 250px" class="thumbnail">
                    </div>
                    <div class="col-md-6">
                        <img src="{{ url('plant/process_image/'.$plant->id) }}"
                             style="width: 250px; height: 250px" class="thumbnail">
                    </div>
                </div>
                <div class="panel-footer">
                    <a href="{{ url()->previous() }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>
@stop