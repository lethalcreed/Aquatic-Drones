@extends('layouts.app')

@section('content')
    <div class="uk-section">
        <div class="uk-container uk-container-expand">
            <div class="uk-width-1-2@m uk-align-center">
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
                <div class="uk-card uk-card-default">

                    <div class="uk-card-header">
                        <h3 class="uk-card-title">User Managment</h3>
                        <p>These are the current users.</p>
                    </div>
                    <div class="uk-card-body">

                        {!! Form::open(['method'=>'GET','url'=>'users','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                        <div uk-grid>
                            <div class="uk-width-2-3">
                                <input class="uk-input uk-width-1-1" name="search" placeholder="Search..." value="{{$search}}">
                            </div>
                            <div class="uk-width-1-3">
                                <a class="uk-button uk-button-default" href="{{route('users.list')}}">
                                    Clear
                                </a>
                                <button class="uk-button uk-button-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <a href="{{route('users.add')}}" class="uk-icon-link"><span uk-icon="icon: plus-circle"></span>
                            Add a User</a>
                        <table class="uk-table uk-table-hover uk-table-devider uk-table-justify">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Client
                                </th>
                                <th>
                                    Operator
                                </th>
                                <th>
                                    Admin
                                </th>
                                <th></th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($usersList as $user)
                                <tr>
                                    <form action="{{ route('users.list.assign') }}" method="post">
                                        <td>
                                            {{$user['id']}}
                                        </td>
                                        <td>
                                            {{$user['name']}}
                                        </td>
                                        <td>
                                            {{ $user->email }} <input type="hidden" name="email"
                                                                      value="{{ $user->email }}">
                                        </td>
                                        <td><input type="checkbox" class="uk-checkbox"
                                                   {{ $user->hasRole('Client') ? 'checked' : ''}} name="role_client">
                                        </td>
                                        <td><input type="checkbox" class="uk-checkbox"
                                                   {{ $user->hasRole('Operator') ? 'checked' : ''}} name="role_operator">
                                        </td>
                                        <td><input type="checkbox" class="uk-checkbox"
                                                   {{ $user->hasRole('Admin') ? 'checked' : ''}} name="role_admin"></td>
                                        <td>
                                            <button class="uk-button uk-button-primary uk-button-small"
                                                    onclick="return confirm('Do you want to apply these role changes to user {{$user['name']}}')">
                                                Assign Roles
                                            </button>
                                        </td>
                                        {{ csrf_field() }}
                                        <td>
                                            <a href="{{url('/')}}/users/edit/{{$user['id']}}" class="uk-icon-link"
                                               uk-icon="icon: pencil"></a>
                                            <a href="{{url('/')}}/users/delete/{{$user['id']}}" class="uk-icon-link"
                                               uk-icon="icon: trash"
                                               onclick="return confirm('Are you sure you want to delete {{$user['name']}}?')"></a>
                                        </td>
                                    </form>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
