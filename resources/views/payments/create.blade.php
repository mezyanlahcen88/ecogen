@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.payment_form_manage_payments') }} | {{ trans('translation.payment_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.payment_form_manage_payments'),
        'subtitle' => trans('translation.payment_action_add'),
        'route' => route('payments.index'),
        'text' => trans('translation.payment_form_payments_list'),
        'permission' => 'payment-list',
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


        <form action="{{route('payments.store')}}" method="post" id="userForm" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-9">
                    <div class="card card-body">
                        <div class="row">
                            @include('form.input', [
                                'cols' => 'col-md-4',
                                'column' => 'reglement',
                                'model' => 'payment',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'reglement',
                                'column_value' => old('reglement'),
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-4',
                                'column' => 'compte',
                                'model' => 'payment',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'compte',
                                'column_value' => old('compte'),
                                'readonly' => 'false',
                            ])

                            @include('form.input', [
                                'cols' => 'col-md-4',
                                'column' => 'nature',
                                'model' => 'payment',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'nature',
                                'column_value' => old('nature'),
                                'readonly' => 'false',
                            ])
                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="content">{{ trans('translation.payment_form_comment') }} &nbsp;
                                        <span class="text-secondary">*</span></label>
                                    <textarea class="form-control ckeditor" name="comment" id="comment" style="height: 213px">{{ old('title') }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card card-body">
                        <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
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
                        </div>
                        @error('picture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

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
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StorePaymentRequest') !!}
@endsection
