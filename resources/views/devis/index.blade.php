@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.devis_form_manage_devis') }} |
    {{ trans('translation.devis_form_devis_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
     @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.devis_form_manage_devis'),
        'subtitle' => trans('translation.devis_form_devis_list'),
        'route' => route('devis.create'),
        'text' => trans('translation.devis_action_add'),
        'permission' => 'devis-create',
        'icon' => 'las la-plus',
        'icon' => 'las la-plus',
        'routeTrashed' => route('devis.trashed'),
        'textTrashed' => trans('translation.devis_form_deleted_devis_list'),
        'permission' => 'devis-trashed',
        'iconTrashed' => 'las la-trash-alt',
    ])
@endsection


@section('card-body')
    <div id="contenuDynamique">
        @include('devis.devis_filter')

        @include('devis.table', [
            'model' => 'devis',
        ])
    </div>

@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('assets/custom_js/categories_scategories.js') }}"></script>
    <script src="{{ asset('assets/custom_js/delete_advanced.js') }}"></script>
    <script src="{{ asset('assets/custom_js/getProductIndex.js') }}"></script>
    <script src="{{ asset('assets/custom_js/yajra datatables/devis_datatable.js') }}"></script>

@endsection
