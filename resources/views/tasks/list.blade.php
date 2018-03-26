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
                        <h3 class="uk-card-title">Task Managment</h3>
                        <p>These are the current tasks. You can add new tasks and edit existing tasks</p>
                    </div>
                    <div class="uk-card-body">
                        <a href="{{route('tasks.add')}}" class="uk-icon-link"><span uk-icon="icon: plus-circle"></span>
                            Add a Task</a>
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
                                    Priority
                                </th>
                                <th>
                                    Start time
                                </th>
                                <th>
                                    End time
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasksList as $task)
                                <tr>
                                    <td>
                                        {{$task['id']}}
                                    </td>
                                    <td>
                                        {{$task['name']}}
                                    </td>
                                    <td style="color: {{$task['priority_color']}}">
                                        {{$task['priority']}}
                                    </td>
                                    <td>
                                        {{$task['start_time']}}
                                    </td>
                                    <td>
                                        {{$task['end_time']}}
                                    </td>
                                    <td>
                                        <a href="{{url('/')}}/tasks/edit/{{$task['id']}}" class="uk-icon-link"
                                           uk-icon="icon: pencil"></a>
                                        <a href="{{url('/')}}/tasks/delete/{{$task['id']}}" class="uk-icon-link"
                                           uk-icon="icon: trash"
                                           onclick="return confirm('Are you sure you want to delete {{$task['name']}}?')"></a>
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
