@extends('master_dashboard')
@section('title')
    Teacher | List
@endsection

@section('content-title')
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-account-multiple-plus-outline"></i>
    </span> List Teacher
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        List Teacher <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
    </li>
@endsection

@section('content-body')
    <table class="table table-hover">
        <thead>
            <tr>
                <th>No</th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
@endsection
