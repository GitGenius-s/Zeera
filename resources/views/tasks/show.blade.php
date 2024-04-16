@extends('layouts.app')

@section('content')
@include('tasks.model')
@include('tasks.importModal')
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <button type='button' class="btn btn-primary" name = "task-import" data-toggle="modal" data-target="#task_import">Task import</button>
                    <a href="/exportTask" class="btn btn-secondary">Export Task</a>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#createTaskModal">Create Task</button>
                </li>
            </ul>
        </div>
    </div>
</nav>

@include('tasks.model');
            
@if ($tasks!==null)
<div class="container">
    <h3>Task-list</h3>
    <div class="card">
        <div class="card-body">
            <div class="row">
                 <div class="col-3">
                    Task Name
                 </div>
                 <div class="col-3">
                   Description
                </div>
                <div class="col-3">
                    Due date
                 </div>
           </div>
        </div>
    </div>
</div>
    @foreach ($tasks as $task) 
            <div class="container text-decoration-none">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col text-decoration-none">
                                <a href="/task/{{$task['parent']['task_id']}}">  {{ $task['parent']['task_name'] }}</a>
                            </div>
                            <div class="col text-decoration-none">
                            {{ $task['parent']['description'] }}
                            </div>
                            <div class="col text-decoration-none">
                                {{ $task['parent']['due_date']}}
                            </div>
                            <div class="col">
                                <button type="button" class="btn btn-primary" onclick="onClickSubTaskAssignTaskID({{$task['parent']['task_id']}})" data-toggle="modal" data-target="#createTaskModal">Create Subtask</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @foreach($task['subTask'] as $arr)
            <div class="container-fluid" style="max-width: 70%; margin-right:200px">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <a href="/task/{{$arr['task_id']}}">{{ $arr['task_name'] }}</a>
                            </div>
                            <div class="col-3">
                                {{ $arr['description'] }}
                            </div>
                            <div class="col-3">
                                {{ $arr['due_date'] }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @endforeach

    {{-- <div class="row">
        <div class="col-12 d-flex justify-content-center pt-4">
            {{$datas->links()}}
        </div>
    </div> --}}
@else 
    <div class="container">
       No tasks are found!!....
    </div>
@endif

<script>
    function onClickSubTaskAssignTaskID(id){
        document.getElementById('parent_id').value = id;
    }

</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


@endsection