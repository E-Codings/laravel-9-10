@extends('master')
@section('title')
    Add | Employee
@endsection

@section('content')
    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: "Updated",
                text: "Employee Updated",
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
            <div class="row mt-5 py-5">
                <div class="col-12 text-center">
                    <h1 class="fw-light">Update Employee Page</h1>
                    <div class="col-6 mx-auto bg-dark p-4 text-light text-start">
                        <form action="/updateEmployee/{{$employee->id}}" method="Post">
                            @method('PUT')
                            @csrf
                            {{-- {{ $errors }} --}}
                            <div class="d-flex flex-wrap">
                                <div class="col-6 p-2">
                                    <label for="">Name:</label>
                                    <input type="text" value="{{ $employee->name }}" name="name" class="form-control"
                                        placeholder="Name" id="">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 p-2">
                                    <label for="">Gender</label>
                                    <select name="gender" class="form-select" id="">
                                        <option value="Male" @if ($employee->gender == 'Male') selected @endif>Male
                                        </option>
                                        <option value="Female" @if ($employee->gender == 'Female') selected @endif>Female</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 p-2">
                                    <label for="">Position</label>
                                    <select name="position" class="form-select" id="">
                                        <option value="Web Developer" @if ($employee->position == 'Web Developer') selected @endif>Web Developer</option>
                                        <option value="Mobile Developer" @if ($employee->position == 'Mobile Developer') selected @endif>Mobile Developer</option>
                                        <option value="UX/UI Design" @if ($employee->position == 'UX/UI Design') selected @endif>UX/UI Design</option>
                                    </select>
                                    @error('position')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-6 p-2">
                                    <label for="">Salary:</label>
                                    <input type="text" name="salary" value="{{$employee->salary}}" placeholder="Salary" class="form-control"
                                        id="">
                                    @error('salary')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="col-12">
                                    <label for="">Address</label>
                                    <textarea name="address" id="" class="form-control" rows="5" style="resize: horizontal"
                                        placeholder="Address">{{$employee->address}}</textarea>
                                    @error('address')
                                        {{-- <span class="text-danger">Address is required</span> --}}
                                        <span class="text-danger">{{ __('Address is required') }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-end">
                                <button class="btn btn-success">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
