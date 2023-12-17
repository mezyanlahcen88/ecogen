@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.car_form_manage_cars') }} |
    {{ trans('translation.car_form_cars_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.car_form_manage_cars'),
        'subtitle' => trans('translation.car_form_cars_list'),
        'route' => route('cars.create'),
        'text' => trans('translation.car_action_add'),
        'permission' => 'car-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('cars.trashed'),
    'textTrashed' => trans('translation.car_form_deleted_cars_list'),
    'permission'=>'car-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('cars.table',[
        'model'=>'car',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

