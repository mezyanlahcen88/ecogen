@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.client_form_manage_clients') }} |
    {{ trans('translation.client_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.client_form_manage_clients'),
        'subtitle' => trans('translation.client_action_add'),
        'route' => route('clients.index'),
        'text' => trans('translation.client_form_clients_list'),
        'permission' => 'client-list',
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


    <form action="{{ route('clients.store') }}" method="post" id="clientForm">
        @csrf
        <div class="row">

            <div class="col-12">
                <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'name_fr',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name_fr',
                            'column_value' => old('name_fr'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'name_ar',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name_ar',
                            'column_value' => old('name_ar'),
                            'readonly' => 'false',
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'ice',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'ice',
                            'column_value' => old('ice'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'phone',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'phone',
                            'column_value' => old('phone'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'fax',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'fax',
                            'column_value' => old('fax'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'email',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'email',
                            'class_name' => '',
                            'column_id' => 'email',
                            'column_value' => old('email'),
                            'readonly' => 'false',
                        ])

                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'type_client',
                            'isReload' => false,
                            'label' => 'client_form_type_client',
                            'optional' => 'text-danger',
                            'divID' => 'type_client',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'fonction',
                            'isReload' => false,
                            'label' => 'client_form_fonction',
                            'optional' => 'text-danger',
                            'divID' => 'fonction',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-3 ',
                            'column' => 'region_id',
                            'isReload' => false,
                            'label' => 'client_form_region_id',
                            'optional' => 'text-danger',
                            'divID' => 'region_id',
                            'options' => $regions,
                            'object' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-3 ',
                            'column' => 'ville_id',
                            'isReload' => false,
                            'label' => 'client_form_ville_id',
                            'optional' => 'text-danger',
                            'divID' => 'ville_id',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-3 ',
                            'column' => 'secteur_id',
                            'isReload' => false,
                            'label' => 'client_form_secteur_id',
                            'optional' => 'text-danger',
                            'divID' => 'secteur_id',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-3',
                            'column' => 'cd_postale',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'cd_postale',
                            'column_value' => old('cd_postale'),
                            'readonly' => 'false',
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-3 ',
                            'column' => 'parent_type',
                            'isReload' => false,
                            'label' => 'client_form_parent_type',
                            'optional' => 'text-danger',
                            'divID' => 'parent_type',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-3 ',
                            'column' => 'parent_id',
                            'isReload' => false,
                            'label' => 'client_form_parent_id',
                            'optional' => 'text-danger',
                            'divID' => 'parent_id',
                            'options' => [],
                            'object' => false,
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'address',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'address',
                            'column_value' => old('address'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'address',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'address',
                            'column_value' => old('address'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'obs',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'obs',
                            'column_value' => old('obs'),
                            'readonly' => 'false',
                        ])

                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h6 class="card-title mb-0 text-white">Garantie informations</h6>
                    </div>
                    <div class="card-body">
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'garanty_img',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'FILE',
                            'class_name' => '',
                            'column_id' => 'garanty_img',
                            'column_value' => old('garanty'),
                            'readonly' => 'false',
                        ])


                        {{-- <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{ URL::asset('assets/images/no_image.jpg') }}"
                            class="  rounded-circle avatar-xl img-thumbnail user-profile-image" alt="user-profile-image">
                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                            <input id="profile-img-file-input" type="file" class="profile-img-file-input" name="picture">
                            <label for="profile-img-file-input" class="profile-photo-edit avatar-xs">
                                <span class="avatar-title rounded-circle bg-light text-body">
                                    <i class="ri-camera-fill"></i>
                                </span>
                            </label>
                        </div>
                    </div> --}}
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'garanty',
                            'model' => 'client',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'garanty',
                            'column_value' => old('garanty'),
                            'readonly' => 'false',
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
    <script src="{{ asset('assets/custom_js/region_ville.js') }}"></script>
    <script src="{{ asset('assets/custom_js/ville_secteur.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreClientRequest') !!}
@endsection
