@extends('layouts.base_layout')
@section('title')
{{env('APP_NAME')}} | {{ trans('translation.user_form_manage_users') }}, {{ trans('translation.user_form_users_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection

@section('page-header')
@include('components.new_breadcrumb', [
    'title' => trans('translation.user_form_manage_deleted_users'),
    'subtitle' => trans('translation.user_form_users_list_deleted'),
    'route' => route('users.index'),
    'text' => trans('translation.user_form_users_list'),
    'permission'=>'user-create',
    'icon'=>'lab la-stack-exchange',
])
@endsection

@section('card_body')
@include('users.trashedTable')
@endsection
@section('js')
@include('layouts.includes.datatable_js')
<script src="{{ asset('assets/custom_js/modal_edit.js')}}"></script>
<script src="{{ asset('assets/custom_js/delete.js') }}"></script>

@endsection
