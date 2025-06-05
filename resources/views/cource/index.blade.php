@extends('master_dashboard')
@section('title')
    Cource | List
@endsection

@section('content-title')
    <span class="page-title-icon bg-gradient-primary text-white me-2">
        <i class="mdi mdi-account-multiple-plus-outline"></i>
    </span> List Cource
@endsection

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Cource</a></li>
    <li class="breadcrumb-item active" aria-current="page">
        List Cource <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
    </li>
@endsection

@section('content-body')
    <table class="table table-hover table-light text-center" id="show-table">
        <thead>
            <tr>
                <th colspan="6">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="col-3 d-flex justify-content-start">
                            <button data-url="{{route('create.cource')}}" id="btn-open-create" data-modal-title="Create Cource Form" class="btn btn-primary">Create Cource</button>
                        </div>
                        <div class="col-8 d-flex justify-content-end">
                            <form class="col-8 d-flex" action="{{ route('index.user') }}">
                                <input type="text" name="search" id="search_txt" placeholder="Search Name..."
                                    class="form-control me-2">
                                <button class="btn btn-primary me-2">Search</button>
                                <a href="{{ route('index.user') }}" class="btn btn-secondary">Clear</a>
                            </form>
                        </div>
                    </div>
                </th>
            </tr>
            <tr>
                <th>N<sup>o</sup></th>
                <th>Title</th>
                <th>Price</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>

            <tr>
                <td colspan="6">
                    <div class="d-flex col-12 justify-content-end">
                        {{-- @for ($i = 1; $i <= $total_pages; $i++) --}}
                        <button id="btn-page" data-page-number="1" class="btn btn-page btn-secondary p-2 me-2">1</button>
                        {{-- @endfor --}}
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
