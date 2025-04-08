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
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
          </table>
        </div>
      </div>
    </div>
</div>
@endsection
