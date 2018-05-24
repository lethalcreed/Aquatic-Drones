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
                        <h3 class="uk-card-title">Harbor Managment</h3>
                        <p>These are the current harbors. You can add new drones and edit existing harbors</p>
                    </div>
                    <div class="uk-card-body">
                        <a href="{{route('harbors.add')}}" class="uk-icon-link"><span uk-icon="icon: plus-circle"></span>
                            Add a Harbor</a>
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
                                    Description
                                </th>
                                <th>
                                    Berth
                                </th>
                                <th>
                                    Longtitude
                                </th>
                                <th>
                                    Latitude
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($harborsList as $harbor)
                                <tr>
                                    <td>
                                        {{$harbor['id']}}
                                    </td>
                                    <td>
                                        {{$harbor['name']}}
                                    </td>
                                    <td>
                                        {{$harbor['description']}}
                                    </td>
                                    <td>
                                        {{$harbor['berth']}}
                                    </td>
                                    <td>
                                        {{$harbor['longitude']}}
                                    </td>
                                    <td>
                                        {{$harbor['latitude']}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/harbors/edit/{{$harbor['id']}}" class="uk-icon-link"
                                           uk-icon="icon: pencil"></a>
                                        <a href="{{url('/')}}/harbors/delete/{{$harbor['id']}}" class="uk-icon-link"
                                           uk-icon="icon: trash"
                                           onclick="return confirm('Are you sure you want to delete {{$harbor['name']}}?')"></a>
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
