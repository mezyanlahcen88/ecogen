@extends('layouts.new_base_layout')

@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.user_form_manage_users') }}
    {{ trans('translation.user_form_users_list') }}
@stop

@section('css')
    @include('layouts.includes.datatable_css')
@endsection

@section('page-header')

    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.user_form_manage_users'),
        'subtitle' => trans('translation.user_form_users_list'),
        'route' => route('users.create'),
        'text' => trans('translation.user_action_add'),
        'permission' => 'particular-create',
        'icon' => 'las la-plus',
        'routeTrashed' => route('users.trashed'),
        'textTrashed' => trans('translation.user_form_users_list_trashed'),
        'permission'=>'user-create',
        'iconTrashed'=>'las la-trash-alt',
    ])
@endsection



@section('card-body')
    @include('users.table')
@endsection


@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ asset('assets/libs/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/pages/select2.init.js') }}"></script>
@endsection
