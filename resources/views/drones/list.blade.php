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
                        <h3 class="uk-card-title">Drone Managment</h3>
                        <p>These are the current drones. You can add new drones and edit existing drones</p>
                    </div>
                    <div class="uk-card-body">
                        <a href="{{route('drones.add')}}" class="uk-icon-link"><span uk-icon="icon: plus-circle"></span>
                            Add a Drone</a>
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
                                    Status
                                </th>
                                <th>
                                    Settings Type
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($dronesList as $drone)
                                <tr>
                                    <td>
                                        {{$drone['id']}}
                                    </td>
                                    <td>
                                        {{$drone['name']}}
                                    </td>
                                    <td style="color: {{$drone['status_color']}}">
                                        {{$drone['status']}}
                                    </td>
                                    <td>
                                        {{$drone['settings_type']}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/drones/edit/{{$drone['id']}}" class="uk-icon-link"
                                           uk-icon="icon: pencil"></a>
                                        <a href="{{url('/')}}/drones/delete/{{$drone['id']}}" class="uk-icon-link"
                                           uk-icon="icon: trash"
                                           onclick="return confirm('Are you sure you want to delete {{$drone['name']}}?')"></a>
                                    </td>
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
