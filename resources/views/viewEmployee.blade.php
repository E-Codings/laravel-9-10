@extends('master')
@section('title')
    View | Employee
@endsection

@section('content')
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
                            <button class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
