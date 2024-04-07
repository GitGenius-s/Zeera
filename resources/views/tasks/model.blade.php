<div class="modal fade" id="createTaskModal" tabindex="-1" role="dialog" aria-labelledby="createTaskModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createTaskModalLabel">Create Task</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container"> 
                    <form action="/task-list" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="task_name">Task Name:</label>
                            <input type="text" id="task_name" name="task_name" value="{{ old('task_name') }}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="description">Description:</label>
                            <textarea id="description" name="description" value="{{ old('description') }}" class="form-control" rows="4" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="priority">Priority:</label>
                            <select id="priority" name="priority" class="form-control" required>
                                <option value="">Select the priority</option>
                                <option value="low">Low</option>
                                <option value="medium">Medium</option>
                                <option value="high">High</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="created_date">Created Date:</label>
                            <input type="date" id="created_date" class="form-control" name="created_date" required>
                        </div>
                        <div class="form-group">
                            <label for="due_date">Due Date:</label>
                            <input type="date" id="due_date" class="form-control" name="due_date" required>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success" >Submit</button>
                        </div>
                        <div>
                            <input type="hidden" for="parent_id" id="parent_id" name="parent_id" value="">
                        </div>
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>