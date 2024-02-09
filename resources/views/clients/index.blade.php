@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.client_form_manage_clients') }} |
    {{ trans('translation.client_form_clients_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.client_form_manage_clients'),
        'subtitle' => trans('translation.client_form_clients_list'),
        'route' => route('clients.create'),
        'text' => trans('translation.client_action_add'),
        'permission' => 'client-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('clients.trashed'),
    'textTrashed' => trans('translation.client_form_deleted_clients_list'),
    'permission'=>'client-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('clients.table',[
        'model'=>'client',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ asset('assets/custom_js/delete_advanced.js') }}"></script>
    <script>
        var table = $('#datatable').DataTable({
            serverSide: true,
            ajax: '/get-devis-json',
            'columns': [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false
                },
                {
                    data: 'code_devis'
                },
                {
                    data: 'product_code'
                },
                {
                    data: 'name_fr'
                },
                {
                    data: 'category.name'
                },
                {
                    data: 'scategory.name'
                },
                {
                    data: 'active',
                    searchable: true,
                    visible: false
                },
                {
                    data: 'archive',
                    searchable: true,
                    visible: true,
                    orderable: true
                },
                {
                    data: 'created_at'
                },
                {
                    data: 'actions'
                },

            ],
            pagingType: 'full_numbers',
            initComplete: function() {
                $('#archive').change(function() {
                    console.log('Status select filter changed');

                    table.column(7).search($(this).val()).draw();
                });
                $('#status').change(function() {
                    console.log('Status select filter changed');
                    table.column(5).search($(this).val()).draw();
                });
            }


        });

        function reload_table() {
            console.log('btn clicked');
            $('#datatable').DataTable().ajax.reload();
        }
    </script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

