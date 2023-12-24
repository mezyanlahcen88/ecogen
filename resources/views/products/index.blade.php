@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.product_form_manage_products') }} |
    {{ trans('translation.product_form_products_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.product_form_manage_products'),
        'subtitle' => trans('translation.product_form_products_list'),
        'route' => route('products.create'),
        'text' => trans('translation.product_action_add'),
        'permission' => 'product-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('products.trashed'),
    'textTrashed' => trans('translation.product_form_deleted_products_list'),
    'permission'=>'product-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('products.table',[
        'model'=>'product',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

