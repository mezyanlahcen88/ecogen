@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.supplier_form_manage_suppliers') }} |
    {{ trans('translation.supplier_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.supplier_form_manage_suppliers'),
        'subtitle' => trans('translation.supplier_action_add'),
        'route' => route('suppliers.index'),
        'text' => trans('translation.supplier_form_suppliers_list'),
        'permission' => 'supplier-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
        <form action="{{ route('suppliers.update', $object->id) }}" method="post" id="userForm">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header  bg-primary text-white">
                            <h6 class="card-title mb-0 text-white">Informations du supplier</h6>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'name_fr',
                                    'model' => 'supplier',
                                    'optional' => 'text-danger',
                                    'input_type' => 'text',
                                    'class_name' => '',
                                    'column_id' => 'name_fr',
                                    'column_value' => $object->name_fr,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6 rtl',
                                    'column' => 'name_ar',
                                    'model' => 'supplier',
                                    'optional' => 'text-danger',
                                    'input_type' => 'text',
                                    'class_name' => '',
                                    'column_id' => 'name_ar',
                                    'column_value' => $object->name_ar,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'ice',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'text',
                                    'class_name' => '',
                                    'column_id' => 'ice',
                                    'column_value' => $object->ice,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'phone',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'number',
                                    'class_name' => '',
                                    'column_id' => 'phone',
                                    'column_value' => $object->phone,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'fax',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'number',
                                    'class_name' => '',
                                    'column_id' => 'fax',
                                    'column_value' => $object->fax,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'email',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'email',
                                    'class_name' => '',
                                    'column_id' => 'email',
                                    'column_value' => $object->email,
                                    'readonly' => 'false',
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'region_id',
                                    'isReload' => false,
                                    'label' => 'supplier_form_region_id',
                                    'optional' => 'text-secondary',
                                    'divID' => 'region_id',
                                    'options' => $regions,
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'ville_id',
                                    'isReload' => false,
                                    'label' => 'supplier_form_ville_id',
                                    'optional' => 'text-secondary',
                                    'divID' => 'ville_id',
                                    'options' => [],
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'secteur_id',
                                    'isReload' => false,
                                    'label' => 'supplier_form_secteur_id',
                                    'optional' => 'text-secondary',
                                    'divID' => 'secteur_id',
                                    'options' => [],
                                    'object' => $object,
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-3',
                                    'column' => 'cd_postale',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'number',
                                    'class_name' => 'onlyNumber',
                                    'column_id' => 'cd_postale',
                                    'column_value' => $object->cd_postale,
                                    'readonly' => 'false',
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'type_supplier',
                                    'isReload' => false,
                                    'label' => 'supplier_form_type_supplier',
                                    'optional' => 'text-danger',
                                    'divID' => 'type_supplier',
                                    'options' => $supplier_types,
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'fonction',
                                    'isReload' => false,
                                    'label' => 'supplier_form_fonction',
                                    'optional' => 'text-secondary',
                                    'divID' => 'fonction',
                                    'options' => $fonctions,
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'parent_type',
                                    'isReload' => false,
                                    'label' => 'supplier_form_parent_type',
                                    'optional' => 'text-secondary',
                                    'divID' => 'parent_type',
                                    'options' => $parent_types,
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-3 ',
                                    'column' => 'parent_id',
                                    'isReload' => false,
                                    'label' => 'supplier_form_parent_id',
                                    'optional' => 'text-secondary',
                                    'divID' => 'parent_id',
                                    'options' => [],
                                    'object' => $object,
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'address',
                                    'model' => 'supplier',
                                    'optional' => 'text-danger',
                                    'input_type' => 'text',
                                    'class_name' => '',
                                    'column_id' => 'address',
                                    'column_value' => $object->address,
                                    'readonly' => 'false',
                                ])
                                @include('form.input', [
                                    'cols' => 'col-md-6',
                                    'column' => 'obs',
                                    'model' => 'supplier',
                                    'optional' => 'text-secondary',
                                    'input_type' => 'text',
                                    'class_name' => '',
                                    'column_id' => 'obs',
                                    'column_value' => $object->obs,
                                    'readonly' => 'false',
                                ])
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="text-start">
                        <button type="submit"
                            class="btn btn-primary">{{ trans('translation.general_general_update') }}</button>
                    </div>
                </div>
            </div>
        </form>
    @endsection
    @section('js')
        @include('layouts.includes.form_js')
        <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
        {{-- {!! JsValidator::formRequest('App\Http\Requests\StoreSupplierRequest') !!} --}}
    @endsection
