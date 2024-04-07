<div class="modal fade" id="createTaskModal1" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
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
                        @method("PATCH") 
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
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <input type="hidden" name="task_id" id="a_task_id" value="">
                        <input type="hidden" name="user_id" id="a_user_id" value="">               
                    </form>
                </div> 
            </div>
        </div>
    </div>
</div>