@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <!-- Button to trigger modal -->
                    <button type="button" class="btn btn-primary" onclick="onClickSubTaskAssignTaskID({{$task['parent']['task_id']}})" data-toggle="modal" data-target="#createTaskModal">Assign Task</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <h2>The assigned users for task-name:{{$task->task_name}}</h2>
    @include('users.model')
    @if($assigns!==null && count($assigns)>0)
        <div class="container text-decoration-none">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-3">
                            UserName
                        </div>
                        <div class="col-3">
                           Status
                        </div>
                        <div class="col-3">
                            AssignedDate
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('users.assign')
    @else
    <div class="container py-4 px-4">
        <h5>No users are assigned with the task name {{$task->task_name}}</h5>
    </div>
    @endif
</div>


<script>
    document.getElementById('user_id').addEventListener('change', function() {
        // Get the selected user_id
        var selectedUserId = this.value;
        
        // Set the value of the hidden input field to the selected user_id
        document.getElementById('selected_user_id').value = selectedUserId;
    });

</script>
@endsection