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
                        <h3 class="uk-card-title">Settings Managment</h3>
                        <p>These are the current settings.</p>
                    </div>
                    <div class="uk-card-body">
                        <a href="{{route('settings.add')}}" class="uk-icon-link"><span uk-icon="icon: plus-circle"></span>
                            Add a Profile</a>

                        <table class="uk-table uk-table-hover uk-table-devider uk-table-justify" style="border-collapse:collapse;">
                            <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Name
                                </th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($settingsList as $setting)
                                <tr>
                                    <td>
                                        {{$setting['id']}}
                                    </td>
                                    <td>
                                        {{$setting['name']}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/settings/view/{{$setting['id']}}" class="uk-icon-link"
                                           uk-icon="icon: more"></a>
                                        <a href="{{url('/')}}/settings/edit/{{$setting['id']}}" class="uk-icon-link"
                                           uk-icon="icon: pencil"></a>
                                        <a href="{{url('/')}}/settings/delete/{{$setting['id']}}" class="uk-icon-link"
                                           uk-icon="icon: trash"
                                           onclick="return confirm('Are you sure you want to delete {{$setting['name']}}?')"></a>
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