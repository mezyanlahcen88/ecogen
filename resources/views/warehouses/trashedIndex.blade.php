@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.warehouse_form_manage_warehouses') }} | {{ trans('translation.warehouse_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.warehouse_form_manage_deleted_warehouses'),
        'subtitle' => trans('translation.warehouse_form_deleted_warehouses_list'),
        'route' => route('warehouses.index'),
        'text' => trans('translation.warehouse_form_warehouses_list'),
        'permission' => 'warehouse-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('warehouses.trashedTable',[
        'model'=>'warehouse',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
