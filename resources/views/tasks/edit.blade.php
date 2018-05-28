@extends('layouts.app')

@section('content')

    <div class="uk-section">
        <div class="uk-container uk-container-expand">

            <div class="uk-card uk-card-default uk-width-1-2@m uk-align-center">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Edit a task</h3>
                </div>
                <div class="uk-card-body">
                    {{Form::model($task, ['route' => 'tasks.update'])}}
                    <fieldset class="uk-fieldset">
                        {{Form::hidden('id', null)}}
                        <div class="uk-margin">
                            {{Form::label('name', 'The task name', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('name', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('description', 'The tasks description', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::text('description', null,['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('priority', 'The tasks priority', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('priority', ['High' => 'High', 'Medium' => 'Medium', 'Low' => 'Low'], null,['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('start_date', 'The tasks start date', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::date('start_date', null, ['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('start_time', 'The start of the operational timeframe of the task', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::time('start_time', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('end_date', 'The tasks end date', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::date('end_date', null, ['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('end_time', 'The end of the operational timeframe of the task', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::time('end_time', null, ['class' => 'uk-input'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('drone', 'The drone that needs to perform this task', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('drone', $task['drones'], null,['class' => 'uk-select'])}}
                            </div>
                        </div>

                        <div class="uk-margin">
                            {{Form::label('route', 'The route the drone must follow', ['class' => 'uk-form-label'])}}
                            <div class="uk-form-controls">
                                {{Form::select('route', $task['routes'], null,['class' => 'uk-select'])}}
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
