@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.warehouse_form_manage_warehouses') }} |
    {{ trans('translation.warehouse_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.warehouse_form_manage_warehouses'),
        'subtitle' => trans('translation.warehouse_action_add'),
        'route' => route('warehouses.index'),
        'text' => trans('translation.warehouse_form_warehouses_list'),
        'permission' => 'warehouse-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')

    <form action="{{ route('warehouses.update', $object->id) }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                @include('form.input', [
                    'cols' => 'col-md-12',
                    'column' => 'name',
                    'model' => 'warehouse',
                    'optional' => 'text-danger',
                    'input_type' => 'text',
                    'class_name' => '',
                    'column_id' => 'name',
                    'column_value' => $object->name,
                    'readonly' => 'false',
                ])
                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                    <div class="form-group">
                        <label for="content">{{ trans('translation.numerotation_form_comments') }} &nbsp;
                            <span class="text-secondary">*</span></label>
                        <textarea class="form-control ckeditor" name="address" id="comments" style="height: 213px">{{ $object->address }}</textarea>
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

    </div>
@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreWarehouseRequest') !!}

@endsection
