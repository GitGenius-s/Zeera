<div id="task_import" class="modal fade" role="dialog">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="d-flex modal-header justify-content-between">
                <h4 class="modal-title">Edit task</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="/importTask" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label for="exampleInputEmail1" class="form-label">Import the file</label> <br>
                        <input type="file" name="file"></input>
                        <input type="submit" name="submit" class="btn btn-success">
                        <button class="btn btn-primary" class="close" data-dismiss="modal"   data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>

            {{-- <div class="modal-footer">
                <button class="btn btn-primary" class="close" data-dismiss="modal"   data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
            </div> --}}
        </div>
    </div>
</div>