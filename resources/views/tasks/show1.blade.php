@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col">
            <ul class="list-unstyled d-flex justify-content-center align-items-center">
                @foreach($users as $user)
                    <li class="mr-3"><button id="{{$user->email}}" class="btn btn-sm btn-light btn-outline-dark rounded-circle" onclick="temp(this)"></button></li>
                    <li class="mr-3">{{$user->email}}</li>
                @endforeach
                <li>
                    <button id="clickedButtonsList" class="btn btn-sm btn-light btn-outline-dark rounded-circle">Apply</button></li>
                    <div id="clickedButtons">
                        <h4>Clicked Buttons:</h4>
                        <ul id="clickedButtonsList" class="list-unstyled">
                            <!-- Display clicked buttons here -->
                        </ul>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<div id="user-info"></div>
<div id="assigns-list"></div>
<div id="tasks-list"></div>


{{-- <div class="container" style="padding-top: 5rem;">
    <h1>Priority</h1>
    <div class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Low</h3>
                    @foreach($lowPrioritiesTask as $task)
                    @if (!is_null($task->assign))
                        <p>hi</p>
                        @foreach($task->assign as $assign)
                            <div class="container p-3">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                @foreach($lowPrioritiesTask as $t1)
                                                    @if($assign->task_id===$t1->task_id)
                                                        {{$task->task_name}}
                                                    @endif
                                                @endforeach
                                                <button class="btn btn-sm btn-success float-end">Low</button>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                @foreach($users as $user)
                                                    @if($user->id===$assign->user_id)
                                                        {{$user->name}}
                                                    @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                @endforeach                
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>Medium</h3>
                    @foreach($mediumPrioritiesTask as $task)
                        <div class="container p-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            {{$task->task_name}}
                                            <button class="btn btn-sm btn-success float-end">Medium</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       
                    @endforeach
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <h3>High</h3>
                    @foreach($highPrioritiesTask as $task)
                        <div class="container p-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col">
                                            {{$task->task_name}}
                                            <button class="btn btn-sm btn-success float-end">High</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>       
                    @endforeach
                </div>
            </div>
        </div>
    </div> --}}

{{-- </div> --}}

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function temp(button) {
        var buttonValue = $(button).attr('id');
        var csrfToken = $('meta[name="csrf-token"]').attr('content'); // Get the CSRF token from the meta tag

        $.ajax({
            url: 'selva',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken // Include the CSRF token in the request headers
            },
            data: {
                buttonValue: buttonValue
            },
            success: function(response) {
                $('#user-info').html('<p>User: ' + response.user.name + '</p>');
                var assignsHtml = '<ul>';
                    response.assigns.forEach(function(assign) {
                       
                        var taskMatched = response.tasks.find(function(task) {
                            //   console.log(task.task_id === assign.task_id);
                            if(task.task_id === assign.task_id)
                            {
                                console.log('hi');
                                $('#assigns-list').html('<p>User: ' + task.task_name + '</p>');
                                assignsHtml += '<li>Assignment: ' + task.task_name+ ' - Task: ' + response.user.name + '</li>';
                            }
                        });
        
                    });
                assignsHtml += '</ul>';
                var assigns = response.assigns;
                var tasks = response.tasks;
            },
            error: function(xhr, status, error) {
                // console.log('aaa');
            }
        });
    }
</script>

@endsection
