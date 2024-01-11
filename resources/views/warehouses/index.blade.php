@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.warehouse_form_manage_warehouses') }} |
    {{ trans('translation.warehouse_form_warehouses_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.warehouse_form_manage_warehouses'),
        'subtitle' => trans('translation.warehouse_form_warehouses_list'),
        'route' => route('warehouses.create'),
        'text' => trans('translation.warehouse_action_add'),
        'permission' => 'warehouse-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('warehouses.trashed'),
    'textTrashed' => trans('translation.warehouse_form_deleted_warehouses_list'),
    'permission'=>'warehouse-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('warehouses.table',[
        'model'=>'warehouse',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

