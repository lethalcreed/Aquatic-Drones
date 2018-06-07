@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Edit a Profile</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::model($setting, ['route' => 'settings.update'])}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}

                        <div class="uk-margin">
                            {{Form::label('name', 'Name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('wind_speed', 'Wind Speed', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('wind_speed', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('operation_time_start', 'Start', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('operation_time_start', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('operation_time_end', 'End', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('operation_time_end', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('wave_height', 'Wave Height', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('wave_height', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('ship_limit', 'Ship Limit', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('ship_limit', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_level', 'Water Level', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('water_level', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_current', 'Water Current', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('water_current', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('water_temperature', 'Water Temperature', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('water_temperature', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('sun_intensity', 'Sun Intensity', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('sun_intensity', null,['class' => 'uk-input'])}}
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
