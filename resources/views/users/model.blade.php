<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Assign Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container"> 
                    <form action="/task/{{$task->task_id}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for='user_id'>UserName:</label>
                            <select name="user_id" id="user_id" class="form-control">
                                @foreach($users as $user)
                                    <option value="{{ $user->id }}">nam</option>
                                @endforeach
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label for="task_id">TaskName:</label>
                            <select name="task_id" id="task_id" class="form-control">
                                   <option value="{{ $task->task_id }}">{{ $task->task_name }}</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for='status'>Status:</label>
                            <select name='status' id='status' class="form-control">
                                <option value="To-do">To-do</option>
                                <option value="In-progess">In-progess</option>
                                <option value="Completed">Completed</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="assign_date">Created Date:</label>
                            <input type="date" id="assign_date" class="form-control" name="assign_date" required>
                        </div>
                        <div>
                            <input type="hidden" for="parent_id" id="parent_id" name="parent_id" value="">
                        </div>
                        <input type="hidden" name="selected_user_id" id="selected_user_id" value="">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>