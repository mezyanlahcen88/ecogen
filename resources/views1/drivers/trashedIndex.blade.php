@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.driver_form_manage_drivers') }} | {{ trans('translation.driver_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.driver_form_manage_deleted_drivers'),
        'subtitle' => trans('translation.driver_form_deleted_drivers_list'),
        'route' => route('drivers.index'),
        'text' => trans('translation.driver_form_drivers_list'),
        'permission' => 'driver-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('drivers.trashedTable',[
        'model'=>'driver',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
