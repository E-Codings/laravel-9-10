@extends('master_dashboard')
@section('title')
    Teacher | Update
@endsection

@section('content-title')
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-account-multiple-plus-outline"></i>
    </span> Update Teacher
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        Update Teacher <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
    </li>
@endsection

@section('content-body')
    <div class="card col-8 mx-auto bg-white p-3 rounded rounded-4">
        <form action="{{route('update.user', $user->id)}}" method="post" class="row" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="col-6 my-2">
                <label for="first_name">First Name: </label>
                <input type="text" name="first_name" value="{{$user->first_name}}" placeholder="First Name" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="last_name">Last Name: </label>
                <input type="text" name="last_name" value="{{$user->last_name}}" placeholder="Last Name" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="gender">Gender: </label>
                <div class="d-flex my-2">
                    <div class="me-2">
                        <input type="radio" name="gender" {{$user->gender == "Male" ? "checked" : ''}} id="male" value="Male"> <label for="male">Male</label>
                    </div>
                    <div class="me-2">
                        <input type="radio" name="gender" id="female" {{$user->gender == "Female" ? "checked" : ''}} value="Female"> <label for="female">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-6 my-2">
                <label for="email">Email: </label>
                <input type="text" name="email" value="{{$user->email}}" placeholder="Email" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="profile">Profile: </label>
                <input type="file" name="profile" class="form-control my-2" id="profile">
                <input type="hidden" name="profile_name" value="{{$user->profile}}"  placeholder="Password" class="form-control my-2 " id="profile_name">
                <div class="preview-profile border border-1 border-dark mt-2" style="width: fit-content; cursor: pointer;">
                    <img src="{{ asset('assets/images/teacher/'.$user->profile) }}" id="show-profile" alt="" style="width:120px">
                </div>
            </div>
            <div class="col-12 my-2 d-flex justify-content-end">
                <a href="{{route("index.user")}}" class="btn btn-secondary me-2">Back</a>
                <button class="btn btn-primary me-2">Save</button>
            </div>

        </form>
    </div>
@endsection

