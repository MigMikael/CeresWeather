<!DOCTYPE html>
<html lang="en">
<head>
    <title>@yield('page_title')</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('/') }}">Demetor</a>
        </div>
        <ul class="nav navbar-nav">
            <li @if(Request::is('weather'))class="active" @endif>
                <a href="{{ url('weather') }}">Weather</a>
            </li>
            <li @if(Request::is('plant'))class="active" @endif>
                <a href="{{ url('plant') }}">Plant</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    @yield('content')
</div>

</body>
</html>