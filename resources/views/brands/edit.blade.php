@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.brand_form_manage_brands') }} |
    {{ trans('translation.brand_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.brand_form_manage_brands'),
        'subtitle' => trans('translation.brand_action_add'),
        'route' => route('brands.index'),
        'text' => trans('translation.brand_form_brands_list'),
        'permission' => 'brand-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <form action="{{ route('brands.update', $object->id) }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-md-8">
                <div class="card card-body">
                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-12',
                            'column' => 'name',
                            'model' => 'brand',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name',
                            'column_value' => $object->name,
                            'readonly' => 'false',
                        ])
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                <img src="{{ URL::asset(getPicture($object->picture, 'brands')) }}"
                                    class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                                    alt="user-profile-image">
                                <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                    <input id="profile-img-file-input" type="file" class="profile-img-file-input"
                                        name="picture">
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
            </div>
        <div class="col-lg-12">
            <div class="text-start">
                <button type="submit" class="btn btn-primary">{{ trans('translation.general_general_update') }}</button>
            </div>
        </div>
    </div>
    </form>
    </div>
@endsection
@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreBrandRequest') !!}
@endsection
