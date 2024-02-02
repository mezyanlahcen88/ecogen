@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.product_form_manage_products') }} |
    {{ trans('translation.product_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.product_form_manage_products'),
        'subtitle' => trans('translation.product_action_add'),
        'route' => route('products.index'),
        'text' => trans('translation.product_form_products_list'),
        'permission' => 'product-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <form action="{{ route('products.update', $object->id) }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-9">
                <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'product_code',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'product_code',
                            'column_value' => $object->product_code,
                            'readonly' => true,
                        ])
    <div class="col-lg-6">
        <div>
            <label class="form-label my-1">Date de crétation</label>
            <input type="text" class="form-control" data-provider="flatpickr" data-date-format="Y-m-d H:i:S"  name="created_at" value="{{$object->created_at}}" name="created_at" readonly>
        </div>
    </div>
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'name_fr',
                            'model' => 'product',
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
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name_ar',
                            'column_value' => $object->name_ar,
                            'readonly' => 'false',
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-4 ',
                            'column' => 'category_id',
                            'isReload' => false,
                            'label' => 'product_form_category_id',
                            'optional' => 'text-danger',
                            'divID' => 'category_id',
                            'options' => $categories,
                            'object' => $object,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-4 ',
                            'column' => 'scategory_id',
                            'isReload' => false,
                            'label' => 'product_form_scategory_id',
                            'optional' => 'text-danger',
                            'divID' => 'scategory_id',
                            'options' => $scategories,
                            'object' => $object,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-4 ',
                            'column' => 'brand_id',
                            'isReload' => false,
                            'label' => 'product_form_brand_id',
                            'optional' => 'text-danger',
                            'divID' => 'brand_id',
                            'options' => $brands,
                            'object' => $object,
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'buy_price',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'buy_price',
                            'column_value' => $object->buy_price,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'price_unit',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'price_unit',
                            'column_value' => $object->price_unit,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'price_gros',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'price_gros',
                            'column_value' => $object->price_gros,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'price_reseller',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'price_reseller',
                            'column_value' => $object->price_reseller,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'latest_price',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'latest_price',
                            'column_value' => $object->latest_price,
                            'readonly' => false,
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'remise',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'remise',
                            'column_value' => $object->remise,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'tva',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'tva',
                            'column_value' => $object->tva,
                            'readonly' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'min_stock',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'min_stock',
                            'column_value' => $object->min_stock,
                            'readonly' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'unite',
                            'isReload' => false,
                            'label' => 'product_form_unite',
                            'optional' => 'text-danger',
                            'divID' => 'unite',
                            'options' => $units,
                            'object' => $object,
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'bar_code',
                            'model' => 'product',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'bar_code',
                            'column_value' => $object->bar_code,
                            'readonly' => false,
                        ])


                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card card-body">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{ URL::asset(getPicture($object->picture,'products')) }}"
                            class="  rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input" name="picture">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div>

                </div>
                <div class="card card-body">
                    <div class="between-center">
                        <div class="form-check form-switch form-switch-md" dir="ltr">
                            <input type="checkbox" class="form-check-input" id="customSwitchsizelg" value="{{$object->stockable}}"
                                name="stockable" {{$object->stockable ? 'checked' : ''}}>
                            <label class="form-check-label" for="customSwitchsizelg">Agir sur le stock</label>
                        </div>
                    </div>

                    @include('form.singleSelect', [
                        'cols' => 'col-md-12 ',
                        'column' => 'warehouse_id',
                        'isReload' => false,
                        'label' => 'product_form_warehouse_id',
                        'optional' => 'text-danger',
                        'divID' => 'warehouse_id',
                        'options' => $warehouses,
                        'object' => $object,
                    ])
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="text-start">
                <button type="submit" class="btn btn-primary">{{ trans('translation.general_general_update') }}</button>
            </div>
        </div>
    </form>

    </div>
@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\UpdateProductRequest') !!}

@endsection
