@extends('students.master_student')
@section('title')
    View | Students
@endsection

@section('content')
    @if(Session::has('success'))
        <script>
            show_toast('Success', "{{ Session::get('success') }}");
        </script>
    @endif
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
                <th>Active</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $index => $student)
                <tr>
                    <td>{{$index + 1}}</td>
                    <td><img src="{{asset('images/'.$student->profile)}}" alt="" width="100px"></td>
                    <td>{{$student->first_name.' '.$student->last_name}}</td>
                    <td>{{$student->gender}}</td>
                    <td>{{$student->course}}</td>
                    <td>{{$student->phone}}</td>
                    <td>{!! $student->isActive?'<i class="bi bi-check-circle"></i>':'' !!}</td>
                    <td>
                        <button class="btn btn-warning" data-action="show" data-modal-url="{{route('edit', ['id'=>$student->id])}}" data-title="Update Student"> Update </button>
                        <button href="#" class="btn btn-danger" data-action="show" data-title="Remove Student" data-modal-url="{{route('delete', ['id'=>$student->id])}}"> Delete </button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
