@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.role_form_manage_roles') }}
    {{ trans('translation.role_form_roles_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.role_form_manage_roles'),
        'subtitle' => trans('translation.role_form_roles_list'),
        'route' => route('roles.create'),
        'text' => trans('translation.role_action_add'),
        'permission' => 'role-create',
        'icon' => 'las la-plus',
    ])
@endsection
@section('card_body')
    @include('roles.table')
@endsection
@section('js')
    @include('layouts.includes.datatable_js')

@endsection
