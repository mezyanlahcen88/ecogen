@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.supplier_form_manage_suppliers') }} | {{ trans('translation.supplier_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.supplier_form_manage_deleted_suppliers'),
        'subtitle' => trans('translation.supplier_form_deleted_suppliers_list'),
        'route' => route('suppliers.index'),
        'text' => trans('translation.supplier_form_suppliers_list'),
        'permission' => 'supplier-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('suppliers.trashedTable',[
        'model'=>'supplier',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
