@extends('master_dashboard')
@section('title')
    Teacher | Create
@endsection

@section('content-title')
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-account-multiple-plus-outline"></i>
    </span> Create Teacher
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Teacher</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        Create Teacher <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
    </li>
@endsection

@section('content-body')
    <div class="card col-8 mx-auto bg-white p-3 rounded rounded-4">
        <form action="{{route('store.user')}}" method="post" class="row" enctype="multipart/form-data">
            @csrf
            <div class="col-6 my-2">
                <label for="first_name">First Name: </label>
                <input type="text" name="first_name" placeholder="First Name" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="last_name">Last Name: </label>
                <input type="text" name="last_name" placeholder="Last Name" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="gender">Gender: </label>
                <div class="d-flex my-2">
                    <div class="me-2">
                        <input type="radio" name="gender" id="male" value="Male"> <label for="male">Male</label>
                    </div>
                    <div class="me-2">
                        <input type="radio" name="gender" id="female" value="Female"> <label for="female">Female</label>
                    </div>
                </div>
            </div>
            <div class="col-6 my-2">
                <label for="email">Email: </label>
                <input type="text" name="email" placeholder="Email" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="password">Password: </label>
                <input type="text" name="password" placeholder="Password" class="form-control my-2 " id="">
            </div>
            <div class="col-6 my-2">
                <label for="profile">Profile: </label>
                <input type="file" name="profile" class="form-control my-2" id="profile">
                <input type="hidden" name="profile_name" placeholder="Password" class="form-control my-2 " id="profile_name">
                <div class="preview-profile border border-1 border-dark mt-2" style="width: fit-content; cursor: pointer;">
                    <img src="{{ asset('assets/images/Upload-Icon-Logo.png') }}" id="show-profile" alt="" style="width:120px">
                </div>
            </div>
            <div class="col-12 my-2 d-flex justify-content-end">
                <button class="btn btn-secondary me-2">Back</button>
                <button class="btn btn-primary me-2">Save</button>
            </div>

        </form>
    </div>
@endsection
@push('script-path')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.preview-profile', function() {
                $('#profile').click()
            })
            $(document).on('change', '#profile', function() {
                var formData = new FormData();
                // console.log( $('#profile'));
                // console.log( $('#profile')[0]);
                // console.log($('#profile')[0].files);
                // console.log($('#profile')[0].files[0]);
                var profile = $('#profile')[0].files[0];
                formData.append('profile', profile)

                $.ajax({
                    // url: '/upload-file'
                    url: "{{ route('uploadFile') }}",
                    method: 'POST',
                    headers:{
                        'X-CSRF-TOKEN': "{{ csrf_token() }}"
                    },
                    data: formData,
                    contentType: false,
                    processData: false,
                    caches: false,
                    success: function(response) {
                        console.log(response);
                        $('#show-profile').attr('src', '{{asset("assets/images/teacher/")}}'+"/"+response)
                        $('#profile_name').val(response);
                    }
                });
            })
        })
    </script>
@endpush
