@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Add a Harbor</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::open(['route' => 'harbors.store'])}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}

                        <div class="uk-margin">
                            {{Form::label('name', 'The harbors name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('description', 'The harbors description', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('description', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('berth', 'The harbors berth', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('berth', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('longitude', 'Harbors berth longitude', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('longitude', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('latitude', 'Harbors berth latitude', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('latitude', null, ['class' => 'uk-input'])}}
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
