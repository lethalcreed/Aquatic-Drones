@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Add a drone</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::open(['route' => 'drones.add'])}}
                    <fieldset class="uk-fieldset">

                        <div class="uk-margin">
                            {{Form::label('name', 'The drones name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('status', 'The drones status', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('status', ['Idle' => 'Idle', 'Error' => 'Error', 'Busy' => 'Busy', 'Maintenance' => 'Maintenance'], null,['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('settings', 'The settings profile that needs to be linked to this drone', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('settings', $settings, null,['class' => 'uk-select'])}}
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
