@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.brand_form_manage_brands') }} | {{ trans('translation.brand_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.brand_form_manage_deleted_brands'),
        'subtitle' => trans('translation.brand_form_deleted_brands_list'),
        'route' => route('brands.index'),
        'text' => trans('translation.brand_form_brands_list'),
        'permission' => 'brand-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('brands.trashedTable',[
        'model'=>'brand',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
