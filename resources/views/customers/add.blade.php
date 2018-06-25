@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">
            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Add a Customer</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::open(['route' => 'customers.create'])}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}

                        <div class="uk-margin">
                            {{Form::label('name', 'Name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('description', 'Description', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::textarea('description', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('website', 'Website Url', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('website', 'https://',['class' => 'uk-input'])}}
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
