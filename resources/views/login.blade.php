@extends('master_auth')
@section('title')
Login
@endsection
@section('content')
 <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left p-5">
                <div class="brand-logo">
                  <img src="{{asset('assets/images/logo.svg')}}">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>
                <form class="pt-3" method="POST" action="{{route('loginSubmit')}}">
                    @csrf
                  <div class="form-group">
                    <input type="email" name="email" required class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Email">
                  </div>
                  <div class="form-group mb-1">
                    <input type="password" name="password" required class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password">
                  </div>
                  @if (Session::has('Error'))
                    <span class="text-danger" style="font-size: 10px">{{Session::get('Error')}}</span>
                  @endif
                  <div class="mt-3 d-grid gap-2">
                    <button class="btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                  </div>
                  </div>
                </form>
              </div>
            </div>
@endsection
