@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">View {{$setting['name']}}</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::model($setting)}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}

                        <div class="uk-margin">
                            {{Form::label('name', 'Name')}}
                            <div>
                                {{$setting['name']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('wind_speed', 'Wind Speed')}}
                            <div>
                                {{$setting['wind_speed']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('operation_time_start', 'Start')}}
                            <div>
                                {{$setting['operation_time_start']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('operation_time_end', 'End')}}
                            <div>
                                {{$setting['operation_time_end']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('wave_height', 'Wave Height')}}
                            <div>
                                {{$setting['wave_height']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('ship_limit', 'Ship Limit')}}
                            <div>
                                {{$setting['ship_limit']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_level', 'Water Level')}}
                            <div>
                                {{$setting['water_level']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_current', 'Water Current')}}
                            <div>
                                {{$setting['water_current']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_temperature', 'Water Temperature')}}
                            <div>
                                {{$setting['water_temperature']}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('sun_intensity', 'Sun Intensity')}}
                            <div>
                                {{$setting['sun_intensity']}}
                            </div>
                        </div>

                        <button type="button" class="uk-button uk-button-default" onclick="window.history.go(-1)">
                            back
                        </button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection
