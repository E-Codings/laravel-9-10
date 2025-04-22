@extends('master')
@section('title')
    View | Employee
@endsection

@section('content')
@if (Session::has('removeSuccess'))
        <script>
            Swal.fire({
                title: "Removed",
                text: "Employee Removed",
                icon: "success"
            });
        </script>
    @endif
    @if ($errors->any())
        <script>
            Swal.fire({
                title: "Errors",
                text: "Please verify agian",
                icon: "error"
            });
        </script>
    @endif
<div class="masthead">
    <div class="container">
      <div class="row mt-5 pt-5">
        <div class="col-12 text-center">
          <h1 class="fw-light">View Employee Page</h1>
          <table class="table table-hover table-dark text-center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Position</th>
                    <th>Address</th>
                    <th>Salary</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->gender }}</td>
                        <td>{{ $employee->position }}</td>
                        <td>{{ $employee->address }}</td>
                        <td>{{ $employee->salary }}</td>
                        <td>{{ $employee->created_at }}</td>
                        <td>{{ $employee->updated_at }}</td>
                        <td>
                            <a href="/update/{{$employee->id}}" class="btn btn-warning">Update</a>
                            <button class="btn btn-danger" id="btn-delete" data-remove-id="{{$employee->id}}" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Remove Employee</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="/remove" method="POST">
            @method('DELETE')
            @csrf
            <label for="" class="h5">Are you sure that you want to remove?</label>
            <input type="hidden" name="remove_id" id="remove_id">
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger">Save</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection

@push('add-script')
    <script>
        $(document).ready(function(){
            $(document).on('click','#btn-delete',function(){
                let removeId = $(this).data('remove-id');
                $('#remove_id').val(removeId);
            })
        });
    </script>
@endpush
