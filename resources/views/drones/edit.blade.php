@extends('layouts.app')

@section('content')
    <script>
        settingsModalShown = false;
        $(document).ready(function () {
            if ($('#yes').is(':checked')) {
                $('#settingsModal').toggle('fast', function () {
                    settingsModalShown = true;
                });
            }
        });

        function toggleSettingsModal(checkbox) {
            if ($('#yes').is(':checked') && settingsModalShown === false) {
                $('#settingsModal').toggle('slow', function () {
                    settingsModalShown = true;
                });
            } else {
                if ($('#no').is(':checked') && settingsModalShown === true) {
                    $('#settingsModal').toggle('slow', function () {
                        settingsModalShown = false;
                    });
                }
            }
            console.log('current state after toggle: ' + settingsModalShown);
        }
    </script>

    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Edit a drone</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::model($drone, ['route' => 'drones.update'])}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}
                        <div class="uk-margin">
                            {{Form::label('name', 'The drones name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('harbor', 'The drones default harbor', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('harbor', $drone['harbors'], $drone['harbor_id'],['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('status', 'The drones status', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('status', ['Idle' => 'Idle', 'Error' => 'Error', 'Busy' => 'Busy', 'Maintenance' => 'Maintenance'], null,['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('overwrite_standard_settings', 'Overwrite standard drone settings?', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::radio('overwrite_standard_settings', 1, null,['class' => 'uk-radio', 'id' => 'yes', 'onclick' => 'toggleSettingsModal(this);'])}}
                                Yes
                                {{Form::radio('overwrite_standard_settings', 0, null,['class' => 'uk-radio', 'id' => 'no', 'onclick' => 'toggleSettingsModal(this);'])}}
                                No
                            </div>
                        </div>

                        <div id="settingsModal" style="display: none">

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

                        </div>
                        {{Form::submit('Save', ['class' => 'uk-button uk-button-primary'])}}
                        <button type="button" class="uk-button uk-button-default" onclick="window.history.go(-1)">cancel</button>
                    </fieldset>
                    {{Form::close()}}
                </div>
            </div>

        </div>
    </div>

@endsection
