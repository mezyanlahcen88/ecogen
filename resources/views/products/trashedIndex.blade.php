@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.product_form_manage_products') }} | {{ trans('translation.product_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.product_form_manage_deleted_products'),
        'subtitle' => trans('translation.product_form_deleted_products_list'),
        'route' => route('products.index'),
        'text' => trans('translation.product_form_products_list'),
        'permission' => 'product-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('products.trashedTable',[
        'model'=>'product',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
