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
                        <h3 class="uk-card-title">Customer Managment</h3>
                        <p>These are the current customers.</p>
                    </div>
                    <div class="uk-card-body">

                        {!! Form::open(['method'=>'GET','url'=>'customers','class'=>'navbar-form navbar-left','role'=>'search'])  !!}
                        <div uk-grid>
                            <div class="uk-width-2-3">
                                <input class="uk-input uk-width-1-1" name="search" placeholder="Search..."
                                       value="{{$search}}">
                            </div>
                            <div class="uk-width-1-3">
                                <a class="uk-button uk-button-default" href="{{route('customers.list')}}">
                                    Clear
                                </a>
                                <button class="uk-button uk-button-primary">
                                    Search
                                </button>
                            </div>
                        </div>
                        {!! Form::close() !!}
                        <a href="{{route('customers.add')}}" class="uk-icon-link"><span
                                    uk-icon="icon: plus-circle"></span>
                            Add a Customer</a>
                        <table class="uk-table uk-table-hover uk-table-divider uk-table-justify">
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
                            @foreach($customerList as $customer)
                                <tr>
                                    <td>
                                        {{$customer['id']}}
                                    </td>
                                    <td>
                                        {{$customer['name']}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/customers/edit/{{$customer['id']}}" class="uk-icon-link"
                                           uk-icon="icon: pencil"></a>
                                        <a href="{{url('/')}}/customers/delete/{{$customer['id']}}" class="uk-icon-link"
                                           uk-icon="icon: trash"
                                           onclick="return confirm('Are you sure you want to delete {{$customer['name']}}? \nAll of the linked users wil not be deleted')"></a>
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
