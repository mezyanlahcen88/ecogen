@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.brand_form_manage_brands') }} |
    {{ trans('translation.brand_form_brands_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.brand_form_manage_brands'),
        'subtitle' => trans('translation.brand_form_brands_list'),
        'route' => route('brands.create'),
        'text' => trans('translation.brand_action_add'),
        'permission' => 'brand-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('brands.trashed'),
    'textTrashed' => trans('translation.brand_form_deleted_brands_list'),
    'permission'=>'brand-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('brands.table',[
        'model'=>'brand',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

