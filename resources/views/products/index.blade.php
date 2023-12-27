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
@include('products.product_filter')
    @include('products.table',[
        'model'=>'product',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
<script>
        $('#datatable').DataTable({
            serverSide: true,
            ajax: '/get-products-json',
            'columns':[
                {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                {data:'picture'},
                {data:'product_code'},
                {data:'name_fr'},
                {data:'category.name'},
                {data:'scategory.name'},
                {data:'active', searchable: true,visible: true},
                {data:'archive',searchable: true,visible: true,orderable: true},
                {data:'created_at'},
                {data:'actions'},

            ],


        });

</script>
    <script src="{{ URL::asset('assets/js/pages/form-pickers.init.js') }}"></script>

    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

