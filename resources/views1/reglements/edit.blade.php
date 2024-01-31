@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.reglement_form_manage_reglements') }} | {{ trans('translation.reglement_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.reglement_form_manage_reglements'),
        'subtitle' => trans('translation.reglement_action_add'),
        'route' => route('reglements.index'),
        'text' => trans('translation.reglement_form_reglements_list'),
        'permission' => 'reglement-list',
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


        <form action="{{route('reglements.update',$object->id)}}" method="post" id="userForm" enctype="multipart/form-data">
            @csrf
             @method('PUT')
            <div class="row">

        <div class="col-9">
            <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'first_name',
                            'model' => 'user',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'first_name',
                            'column_value' => old('first_name'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'last_name',
                            'model' => 'user',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'last_name',
                            'column_value' => old('last_name'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'email',
                            'model' => 'user',
                            'optional' => 'text-danger',
                            'input_type' => 'email',
                            'class_name' => '',
                            'column_id' => 'email',
                            'column_value' => old('email'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'phone',
                            'model' => 'user',
                            'optional' => 'text-danger',
                            'input_type' => 'email',
                            'class_name' => 'phone',
                            'column_id' => 'phone',
                            'column_value' => old('phone'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'password',
                            'model' => 'user',
                            'optional' => 'text-danger',
                            'input_type' => 'password',
                            'class_name' => '',
                            'column_id' => 'password',
                            'column_value' => old('password'),
                            'readonly' => 'false',
                        ])
                                                @include('form.input', [
                                                    'cols' => 'col-md-6',
                                                    'column' => 'password_confirmation',
                                                    'model' => 'user',
                                                    'optional' => 'text-danger',
                                                    'input_type' => 'password',
                                                    'class_name' => '',
                                                    'column_id' => 'confirm_password',
                                                    'column_value' => old('confirm_password'),
                                                    'readonly' => 'false',
                                                    // password_confirmation
                                                ])
                    </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                    <img src=""
                        class="  rounded-circle avatar-xl img-thumbnail user-profile-image"
                        alt="user-profile-image">
                    <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                        <input id="profile-img-file-input" type="file" class="profile-img-file-input" name="picture">
                        <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                            <span class="avatar-title rounded-circle bg-light text-body">
                                <i class="ri-camera-fill"></i>
                            </span>
                        </label>
                    </div>
                </div>
                @include('form.singleSelect', [
                    'cols' => 'col-md-12 ',
                    'column' => 'roles_name',
                    'isReload' => false,
                    'label' => 'user_form_role_name',
                    'optional' => 'text-danger',
                    'divID' => 'roles_name',
                    'options' => [],
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreReglementRequest') !!}

@endsection
