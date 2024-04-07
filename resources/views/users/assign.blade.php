@foreach($assigns as $assign)
<div class="container text-decoration-none">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-3">
                    {{$assign->user->name}}
                </div>
                <div class="col-3">
                    {{$assign->status}}
                </div>
                <div class="col-3">
                    {{$assign->assign_date}}
                </div>
                <div class="col-3">
                    <button type="button" class="btn btn-primary" onclick="populateHiddenFields({{$assign->user_id}},{{$assign->task_id}})" data-toggle="modal" data-target="#createTaskModal1">Edit</button>
                    @include('users.edit')
                    <button type="button" class="btn btn-danger" onclick="deleteRecord({{$assign->user_id}},{{$assign->task_id}})">Delete</button>
                </div>
                {{-- <input type="hidden" name="task_id" id="task_id">
                <input type="hidden" name="user_id" id="user_id"> --}}
            </div>
        </div>
    </div>
</div>
<script>
    function populateHiddenFields(user_id,task_id) {
        // Get the task_id and user_id values from the button's data attributes or any other source
        var task_id = user_id // Update with the actual value
        var user_id = task_id; // Update with the actual value
        console.log(user_id);
        console.log(task_id);
        // Set the values of the hidden input fields
        document.getElementById('a_task_id').value = task_id;
        document.getElementById('a_user_id').value = user_id;
    }
</script>   
<script>
  function deleteRecord(user_id, task_id) {
    // Construct the data object with values
    let data = {
        user_id: user_id,
        task_id: task_id
    };


    $.ajax({
        url: '/deleteAssign',
        method: 'POST',
        data: data,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // Include CSRF token
        },
        success: function(response) {
            console.log('AAAAAAAAAAA')
            console.log(response)
            console.log('Record deleted successfully');
        },
        error: function(xhr, status, error) {
            console.error('Error deleting record:', error);
        }
    });
}
</script>
@endforeach