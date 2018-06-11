@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">
            <div class="uk-card uk-card-default">
                <div class="uk-card-header">
                    <h3 class="uk-card-title">Edit a Customer</h3>
                </div>
                <div uk-grid>
                    <div class="uk-width-1-2">
                        <div class="uk-card-body">
                            {{Form::model($customer, ['route' => 'customers.update'])}}
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
                                        {{Form::text('website', null,['class' => 'uk-input'])}}
                                    </div>
                                </div>

                                {{Form::submit('Save', ['class' => 'uk-button uk-button-primary'])}}
                                <button type="button" class="uk-button uk-button-default"
                                        onclick="window.history.go(-1)">
                                    Cancel
                                </button>
                            </fieldset>
                            {{Form::close()}}
                        </div>
                    </div>
                    <div class="uk-width-1-2">
                        <h3>Choose users to link</h3>
                        <table class="uk-table">
                            @foreach($users as $user)
                                <tr>
                                    <td>
                                        {{$user->id}}
                                    </td>
                                    <td>
                                        {{$user->name}}
                                    </td>
                                    <td>
                                        {{$user->email}}
                                    </td>
                                    <td>
                                        {!! Form::checkbox('users[]', $user->id, $user->linked, ['id' => 'users', 'class' => 'uk-checkbox']) !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
