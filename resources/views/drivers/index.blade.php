@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.driver_form_manage_drivers') }} |
    {{ trans('translation.driver_form_drivers_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.driver_form_manage_drivers'),
        'subtitle' => trans('translation.driver_form_drivers_list'),
        'route' => route('drivers.create'),
        'text' => trans('translation.driver_action_add'),
        'permission' => 'driver-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('drivers.trashed'),
    'textTrashed' => trans('translation.driver_form_deleted_drivers_list'),
    'permission'=>'driver-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('drivers.table',[
        'model'=>'driver',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

