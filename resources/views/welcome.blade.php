<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">

</head>
<body>
<video autoplay muted loop id="AquaticDrones">
    <source src="https://daks2k3a4ib2z.cloudfront.net/57f217ad80f54a0b096d897d/59f70296696c200001fc7386_Aquatic_Drones_fragmentn-transcode.mp4"
            type="video/mp4">
</video>

<div class="flex-center position-ref full-height">
    <div class="div-clear menu-bar">
        @if (Route::has('login'))
            <div class="top-right links">
                @if (Auth::check())
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ url('/login') }}">Login</a>
                @endif
            </div>
        @endif
    </div>

    <div class="content">
        <div class="main-content div-clear uk-card">
        <img src="http://uploads.webflow.com/57f217ad80f54a0b096d897d/57f218e6b0a162101f72b09d_aquatic_drones_white.svg" class="logo">
            <div class="uk-card-header main-content-head">
                TaskManager
            </div>
            <div class="uk-card-body main-content-body">
                <p>A task managment platform for Aquatic Drones</p>
            </div>
        </div>
    </div>
</div>
</body>
</html>
