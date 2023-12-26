@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.driver_form_manage_drivers') }} |
    {{ trans('translation.driver_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.driver_form_manage_drivers'),
        'subtitle' => trans('translation.driver_action_add'),
        'route' => route('drivers.index'),
        'text' => trans('translation.driver_form_drivers_list'),
        'permission' => 'driver-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('drivers.update', $object->id) }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-9">
                <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'first_name',
                            'model' => 'driver',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'first_name',
                            'column_value' => $object->first_name,
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'last_name',
                            'model' => 'driver',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'last_name',
                            'column_value' => $object->last_name,
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'cin',
                            'model' => 'driver',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'cin',
                            'column_value' => $object->cin,
                            'readonly' => 'false',
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'dob',
                            'model' => 'driver',
                            'optional' => 'text-danger',
                            'input_type' => 'date',
                            'class_name' => '',
                            'column_id' => 'dob',
                            'column_value' => $object->dob,
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'permis_number',
                            'model' => 'driver',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'permis_number',
                            'column_value' => $object->permis_number,
                            'readonly' => 'false',
                        ])

                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'permis_type',
                            'isReload' => false,
                            'label' => 'driver_form_permis_type',
                            'optional' => 'text-danger',
                            'divID' => 'permis_type',
                            'options' => $permis_types,
                            'object' => $object,
                        ])
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="content">{{ trans('translation.driver_form_obs') }} &nbsp;
                                    <span class="text-secondary">*</span></label>
                                <textarea class="form-control ckeditor" name="obs" id="obs" style="height: 213px">{{ $object->obs }}</textarea>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card card-body">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{ URL::asset(getPicture($object->picture,'drivers')) }}"
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
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreDriverRequest') !!}

@endsection
