@extends('layouts.main_layout')
@section('content')
    <div class="row">
        <div class="col-xxl-12" id="table_layout">
            <div class="card" id="companyList">
            @yield('card-header')
            @yield('card-body')
            </div>
        </div>

        <div class="col-xxl-3 d-none" id="view_layout">
            <div class="card" id="company-view-detail">
            @yield('right')
            </div>
        </div>
    </div>
@endsection
