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
                                            <a href="{{ route('tasks.list') }}"><span uk-icon="icon: location"></span>
                                                Routes (W.I.P.)</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('users.list') }}"><span uk-icon="icon:user"></span>
                                                Users</a>
                                        </li>
                                        <li>
                                            <a href="{{route('customers.list')}}"><span uk-icon="icon: world"></span> Customers</a>
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
