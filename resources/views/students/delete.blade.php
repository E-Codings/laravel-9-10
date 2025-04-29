<form action="" method="post" enctype="multipart/form-data">
    @csrf

    <div class="row">
        <div class="col-12 p-2">
            <label for="" class="h4">Are you sure that you want to remove?</label>
            <input type="hidden" name="remove_id" id="" class="form-control" value="{{$id}}">
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Create</button>
    </div>
</form>
