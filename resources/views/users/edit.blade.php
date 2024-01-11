@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.transportcompanie_form_manage_transport_users') }}
    {{ trans('translation.transportcompanie_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
    <link href="{{ asset('assets/libs/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.user_form_manage_users'),
        'subtitle' => trans('translation.user_action_add'),
        'route' => route('users.index'),
        'routeSeconde' => '',
        'text' => trans('translation.user_form_users_list'),
        'permission' => 'users-list',
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


        <form action="{{route('users.store')}}" method="post" id="userForm">
            @csrf
            <div class="row">
            {{-- first card body --}}

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
                            'column_value' => $object->first_name,
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
                            'column_value' => $object->last_name,
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
                            'column_value' => $object->email,
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
                            'column_value' => $object->phone,
                            'readonly' => 'false',
                        ])
                        {{-- @include('form.input', [
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
                                                ]) --}}
                    </div>
            </div>
        </div>

        <div class="col-3">
            <div class="card card-body">
                <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                    <img src="{{ getUserPicture(Auth::user()->picture) }}"
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
                    'options' => $roles,
                ])
            </div>
        </div>
    </div>
    <div class="col-lg-12">
        <div class="text-start">
            <button type="submit" class="btn btn-primary">{{ trans('translation.general_general_save') }}</button>
        </div>
    </div>
    </form>

    </div>
@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreUserRequest') !!}

@endsection
