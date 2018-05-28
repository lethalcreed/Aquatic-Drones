<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.js'></script>
    <link href='https://api.tiles.mapbox.com/mapbox-gl-js/v0.45.0/mapbox-gl.css' rel='stylesheet' />
    <script src='https://npmcdn.com/@turf/turf/turf.min.js'></script>
    <script src='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.js'></script>
    <link rel='stylesheet' href='https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-draw/v1.0.9/mapbox-gl-draw.css' type='text/css'/>
    <style>
     .full-height {
                height: 88vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }
            .marker {
                display: block;
                border: none;
                border-radius: 50%;
                cursor: pointer;
                padding: 0;
            }
            .mapboxgl-marker {
                width: 25px;
                height: 25px;
                border-radius: 50%;
                border:1px solid gray;
                background-color:yellow;
            }
            .slider {
    -webkit-appearance: none;
    width: 100%;
    height: 25px;
    background: #d3d3d3;
    outline: none;
    opacity: 0.7;
    -webkit-transition: .2s;
    transition: opacity .2s;
}

.slider:hover {
    opacity: 1;
}

.slider::-webkit-slider-thumb {
    -webkit-appearance: none;
    appearance: none;
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}

.slider::-moz-range-thumb {
    width: 25px;
    height: 25px;
    background: #4CAF50;
    cursor: pointer;
}
    </style>
</head>
<body>
<div id="app">
    <div class="uk-box-shadow-medium uk-navbar-container uk-navbar-primary" uk-navbar="mode: click">
        <div class="uk-container uk-container-expand uk-width-1-1">

            <nav class="uk-navbar">

                <div class="uk-navbar-left">
                    <!-- Branding Image -->
                    <a class="uk-navbar-item uk-logo" href="{{ route('dashboard') }}">
                        {{ config('app.name', 'TaskManager') }}
                    </a>
                </div>

                <div class="uk-navbar-right">
                    <ul class="uk-navbar-nav">
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">Login</a></li>
                        @else
                            <li>
                                <a href="#">{{ Auth::user()->name }}</a>
                                <div class="uk-navbar-dropdown">
                                    <ul class="uk-nav uk-navbar-dropdown-nav">
                                        <li>
                                            <a href="{{route('tasks.list')}}"><span uk-icon="icon:clock"></span>
                                                Tasks</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('drones.list') }}"><span uk-icon="icon:list"></span>
                                                Drones</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('settings.standard.edit') }}"><span
                                                        uk-icon="icon: settings"></span> Settings</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('drone.map') }}"><span uk-icon="icon: location"></span>
                                                Routes (W.I.P.)</a>
                                        </li>
                                        <li class="uk-nav-divider"></li>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                                <span uk-icon="icon: sign-out"></span>
                                                Logout
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                        @endif
                    </ul>
                </div>

            </nav>

        </div>
    </div>

    @yield('content')
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/uikit-icons.min.js') }}"></script>
</body>
</html>
