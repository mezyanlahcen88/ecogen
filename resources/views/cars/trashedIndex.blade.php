@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.car_form_manage_cars') }} | {{ trans('translation.car_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.car_form_manage_deleted_cars'),
        'subtitle' => trans('translation.car_form_deleted_cars_list'),
        'route' => route('cars.index'),
        'text' => trans('translation.car_form_cars_list'),
        'permission' => 'car-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('cars.trashedTable',[
        'model'=>'car',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
