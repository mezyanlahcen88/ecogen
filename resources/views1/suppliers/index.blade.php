@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.supplier_form_manage_suppliers') }} |
    {{ trans('translation.supplier_form_suppliers_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.supplier_form_manage_suppliers'),
        'subtitle' => trans('translation.supplier_form_suppliers_list'),
        'route' => route('suppliers.create'),
        'text' => trans('translation.supplier_action_add'),
        'permission' => 'supplier-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('suppliers.trashed'),
    'textTrashed' => trans('translation.supplier_form_deleted_suppliers_list'),
    'permission'=>'supplier-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('suppliers.table',[
        'model'=>'supplier',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

