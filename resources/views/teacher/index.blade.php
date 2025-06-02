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
    <table class="table table-hover table-light text-center" id="show-table">
        <thead>
            <tr>
                <th colspan="5">
                    <div class="col-12 d-flex justify-content-end">
                        <form class="col-5 d-flex" action="{{route('index.user')}}">
                            <input type="text" name="search" id="search_txt" placeholder="Search Name..." class="form-control me-2">
                            <button class="btn btn-primary me-2">Search</button>
                            <a href="{{route('index.user')}}" class="btn btn-secondary">Clear</a>
                        </form>
                    </div>
                </th>
            </tr>
            <tr>
                <th>N<sup>o</sup></th>
                <th>Profile</th>
                <th>Full Name</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $index => $teacher)
                <tr>
                    <td>
                        {{ $index + 1 }}
                    </td>
                    <td>
                        <img src="{{ asset('assets/images/teacher/' . $teacher->profile) }}" alt="">
                    </td>
                    <td>{{ $teacher->fullName() }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>
                        <a href="{{ route('edit.user', $teacher->id) }}" class="btn btn-warning"> {!! icon_edit() !!}
                            Edit</a>
                        <button class="btn btn-danger" id="btn-remove" data-id="{{ $teacher->id }}">
                            {!! icon_remove() !!}Remove</button>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="5">
                    <div class="d-flex col-12 justify-content-end">
                        @for ($i = 1; $i <= $total_pages; $i++)
                            <a href="?page={{ $i }}" class="btn btn-secondary p-2 me-2">{{ $i }}</a>
                        @endfor
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
@push('script-path')
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const search = urlParams.get('search');
    if(search){
        $('#search_txt').val(search);
    }

</script>
@endpush
