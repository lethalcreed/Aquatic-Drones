@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Edit standard drone settings</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::model($settings, ['route' => 'settings.standard.update'])}}
                    <fieldset class="uk-fieldset">
                        <div class="uk-margin">
                            {{Form::label('operation_time_start', 'The start of the operational timeframe of the drone', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::time('operation_time_start', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('operation_time_end', 'The end of the operational timeframe of the drone', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::time('operation_time_end', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>


                        <div class="uk-margin">
                            {{Form::label('wind_speed', 'Maximum wind speed in KM/H', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('wind_speed', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('wave_height', 'Maximum wave height in M', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('wave_height', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('ship_limit', 'Maximum amount of ships on 1 KM2', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('ship_limit', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_level', 'Minimum water level relative to NAP', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('water_level', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_current', 'Maximum current in MS/S', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('water_current', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_temperature', 'Minimum water temperature in C', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('water_temperature', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('sun_intensity', 'Minimum sun intensity the drone needs in L', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::number('sun_intensity', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>
                        {{Form::submit('Save', ['class' => 'uk-button uk-button-primary'])}}
                        <button type="button" class="uk-button uk-button-default" onclick="window.history.go(-1)">
                            cancel
                        </button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection
