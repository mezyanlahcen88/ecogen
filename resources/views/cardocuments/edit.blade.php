@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.cardocuments_form_manage_cardocuments') }} | {{ trans('translation.cardocuments_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.cardocuments_form_manage_cardocuments'),
        'subtitle' => trans('translation.cardocuments_action_add'),
        'route' => route('car-documents.index'),
        'text' => trans('translation.cardocuments_form_cardocuments_list'),
        'permission' => 'cardocuments-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
        <form action="{{route('car-documents.update',$object->id)}}" method="post" id="userForm" enctype="multipart/form-data">
            @csrf
             @method('PUT')
             <div class="row">
                <div class="col-9">
                    <div class="card">
                        <div class="card-header bg-primary text-white between-center">
                            <h6 class="card-title mb-0 text-white">informations de la documents</h6>

                        </div>
                        <div class="card-body">

                            <div class="row">
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-4 ',
                                    'column' => 'car_id',
                                    'isReload' => false,
                                    'label' => 'cardocuments_form_car_id',
                                    'optional' => 'text-danger',
                                    'divID' => 'car_id',
                                    'options' => $cars,
                                    'object' => $object,
                                ])
                                @include('form.singleSelect', [
                                    'cols' => 'col-md-4 ',
                                    'column' => 'nature',
                                    'isReload' => false,
                                    'label' => 'cardocuments_form_nature',
                                    'optional' => 'text-danger',
                                    'divID' => 'nature',
                                    'options' => $documents,
                                    'object' => $object,
                                ])
                                <div class="col-md-4">
                                    <div>
                                        <label class="form-label my-1">{{ trans('translation.cardocuments_form_start_date') }}
                                            &nbsp;<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" data-provider="flatpickr" data-enable-time
                                            data-date-format="Y-m-d"
                                            placeholder="{{ Carbon\Carbon::now()->format('d-m-Y H:i') }}" name="start_date" value="{{$object->start_date}}">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div>
                                        <label class="form-label my-1">{{ trans('translation.cardocuments_form_end_date') }}
                                            &nbsp;<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" data-provider="flatpickr" data-enable-time
                                        data-date-format="Y-m-d"
                                        placeholder="{{ Carbon\Carbon::now()->format('d-m-Y H:i') }}" name="end_date" value="{{$object->end_date}}">
                                    </div>
                                </div>

                                @include('form.singleSelect', [
                                    'cols' => 'col-md-4 ',
                                    'column' => 'tranche',
                                    'isReload' => false,
                                    'label' => 'cardocuments_form_tranche',
                                    'optional' => 'text-danger',
                                    'divID' => 'tranche',
                                    'options' => $tranches,
                                    'object' => $object,
                                ])

                                @include('form.singleSelect', [
                                    'cols' => 'col-md-4',
                                    'column' => 'status',
                                    'isReload' => false,
                                    'label' => 'cardocuments_form_status',
                                    'optional' => 'text-danger',
                                    'divID' => 'statusDiv',
                                    'options' => $etats,
                                    'object' => $object,
                                ])

                                <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                    <div class="form-group">
                                        <label for="content">{{ trans('translation.garanty_form_comment') }} &nbsp;
                                            <span class="text-secondary">*</span></label>
                                        <textarea class="form-control ckeditor" name="comment" id="comment" style="height: 213px">{{$object->comment}}</textarea>
                                    </div>
                                    @error('comment')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="col-lg-12">
                                    <div class="text-start">
                                        <button type="submit"
                                            class="btn btn-primary">{{ trans('translation.general_general_update') }}</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h6 class="card-title mb-0 text-white">Piece Jointe</h6>
                        </div>
                        <div class="card-body mx-auto">
                            <div class="profile-user position-relative d-inline-block   mb-4">
                                <img src="{{ URL::asset(getPicture($object->picture,'documents')) }}"
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
                            @error('picture')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
        </div>
@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StoreCarDocumentsRequest') !!}

@endsection
