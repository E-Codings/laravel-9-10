@extends('master')
@section('title')
    Add | Employee
@endsection

@section('content')
<div class="masthead">
    <div class="container">
      <div class="row mt-5 py-5">
        <div class="col-12 text-center">
          <h1 class="fw-light">Add Employee Page</h1>
          <div class="col-6 mx-auto bg-dark p-4 text-light text-start">
            <form action="/createEmployee" method="POST">
                @csrf
                <div class="d-flex flex-wrap">
                    <div class="col-6 p-2">
                        <label for="">Name:</label>
                        <input type="text" name="name" class="form-control my-2" placeholder="Name" id="">
                    </div>
                    <div class="col-6 p-2">
                        <label for="">Gender</label>
                        <select name="gender" class="form-select my-2" id="">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="col-6 p-2">
                        <label for="">Position</label>
                        <select name="position" class="form-select my-2" id="">
                            <option value="Web Developer">Web Developer</option>
                            <option value="Mobile Developer">Mobile Developer</option>
                            <option value="UX/UI Design">UX/UI Design</option>
                        </select>
                    </div>
                    <div class="col-6 p-2">
                        <label for="">Salary:</label>
                        <input type="text" name="salary" placeholder="Salary" class="form-control my-2" id="">
                    </div>
                    <div class="col-12">
                        <label for="">Address</label>
                        <textarea name="address" id="" class="form-control my-2" rows="5" style="resize: horizontal" placeholder="Address"></textarea>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success">Submit</button>
                </div>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
