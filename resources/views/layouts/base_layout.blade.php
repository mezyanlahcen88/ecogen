@extends('layouts.main_layout')
@section('content')
<div class="row mt-n3">
    <div class="col-lg-12">
            @yield('card_header')

         <div class="card">
            @yield('card_body')

           </div>

        <!-- end col -->
    </div>
    <!-- end col -->
</div>
<!-- end row -->
@endsection
