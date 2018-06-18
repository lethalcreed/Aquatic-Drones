@extends('layouts.app')

@section('content')

    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-align-center" uk-grid>
                @if (session('success'))
                    <div class="uk-alert-success" uk-alert>
                        {{ session('success') }}
                        <a class="uk-alert-close" uk-close></a>
                    </div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-1-3@m">
                        <div class="uk-card uk-card-body uk-card-default">
                            <h3 class="uk-card-title">Client Dashboard</h3>
                            <p>Welcome to the dashboard!</p>
                        </div>
                    </div>
                    <div class="uk-width-2-3@m">
                        <div class="uk-card uk-card-body uk-card-default">
                            <h4>Drone Log</h4>
                        </div>
                    </div>
                </div>
                <div class="uk-grid-match" uk-grid>
                    <div class="uk-width-1-2">
                        <div class="uk-card uk-card-body uk-card-default">
                            <h4>User activity</h4>
                        </div>
                    </div>
                    <div class="uk-width-1-2">
                        <div class="uk-card uk-card-primary">
                            <div class="uk-card-header">
                                <h3 class="uk-card-title">Weather forecast</h3>
                            </div>
                            <div class="uk-card-body" uk-grid>
                                <div class="uk-width-1-3">
                                    <h4>Today <img src="{{asset('/images/iconen-weerlive')}}/{{$weather->image}}.png">
                                    </h4>

                                    <ul class="uk-list uk-list-small">
                                        <li>Current Temp.: {{$weather->temp}} C</li>
                                        <li>Min. Temp.: {{$weather->d0tmin}} C</li>
                                        <li>Max. Temp.: {{$weather->d0tmax}} C</li>
                                        <li>Precipitation chance: {{$weather->d0neerslag}} %</li>
                                        <li>Wind speed: {{$weather->windkmh}} Km/H</li>
                                        <li>Wind direction: {{$weather->windr}}</li>
                                    </ul>
                                </div>
                                <div class="uk-width-1-3">
                                    <h4>Tomorrow</h4>
                                    <ul class="uk-list uk-list-small">
                                        <li>Min. Temp.: {{$weather->d1tmin}} C</li>
                                        <li>Max. Temp.: {{$weather->d1tmax}} C</li>
                                        <li>Precipitation chance: {{$weather->d1neerslag}} %</li>
                                        <li>Wind speed: {{$weather->d1windkmh}} Km/H</li>
                                        <li>Wind direction: {{$weather->d1windr}}</li>
                                    </ul>
                                </div>
                                <div class="uk-width-1-3">
                                    <h4>In 2 days</h4>
                                    <ul class="uk-list uk-list-small">
                                        <li>Min. Temp.: {{$weather->d2tmin}} C</li>
                                        <li>Max. Temp.: {{$weather->d2tmax}} C</li>
                                        <li>Precipitation chance: {{$weather->d2neerslag}} %</li>
                                        <li>Wind speed: {{$weather->d2windkmh}} Km/h</li>
                                        <li>Wind direction: {{$weather->d2windr}}</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
