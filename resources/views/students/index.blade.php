@extends('students.master_student')
@section('title')
    View | Students
@endsection

@section('content')
    <table class="table table-dark table-hover text-center">
        <thead>
            <tr>
                <th>N<sup>o</sup></th>
                <th>Image</th>
                <th>Full Name</th>
                <th>Gender</th>
                <th>Course</th>
                <th>Phone Number</th>
                <th>Is Active</th>
            </tr>
        </thead>
    </table>
@endsection
