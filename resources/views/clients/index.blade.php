@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.client_form_manage_clients') }} |
    {{ trans('translation.client_form_clients_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.client_form_manage_clients'),
        'subtitle' => trans('translation.client_form_clients_list'),
        'route' => route('clients.create'),
        'text' => trans('translation.client_action_add'),
        'permission' => 'client-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('clients.trashed'),
    'textTrashed' => trans('translation.client_form_deleted_clients_list'),
    'permission'=>'client-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('clients.table',[
        'model'=>'client',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

