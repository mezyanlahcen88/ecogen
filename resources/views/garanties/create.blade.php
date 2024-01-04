@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.garanty_form_manage_garanties') }} |
    {{ trans('translation.garanty_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.garanty_form_manage_garanties'),
        'subtitle' => trans('translation.garanty_action_add'),
        'route' => route('clients.index'),
        'text' => trans('translation.client_form_clients_list'),
        'permission' => 'garanty-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <form action="{{ route('garanties.store') }}" method="post" id="garantyForm" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-9">
                <div class="card">
                    <div class="card-header bg-primary text-white between-center">
                        <h6 class="card-title mb-0 text-white">informations de la garantie</h6>

                    </div>
                    <div class="card-body">

                        <div class="row">
                            @include('form.singleSelect', [
                                'cols' => 'col-md-4 ',
                                'column' => 'parent_type',
                                'isReload' => false,
                                'label' => 'garanty_form_parent_type',
                                'optional' => 'text-danger',
                                'divID' => 'parent_type',
                                'options' => $parent_types,
                                'object' => false,
                            ])
                                   @include('form.singleSelect', [
                                    'cols' => 'col-md-4 ',
                                    'column' => 'parent_id',
                                    'isReload' => false,
                                    'label' => 'garanty_form_parent_id',
                                    'optional' => 'text-danger',
                                    'divID' => 'parent_id',
                                    'options' => [],
                                    'object' => false,
                                ])
                            @include('form.input', [
                                'cols' => 'col-md-4',
                                'column' => 'amount',
                                'model' => 'garanty',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => 'num_point',
                                'column_id' => 'amount',
                                'column_value' => old('amount'),
                                'readonly' => 'false',
                            ])
                            @include('form.singleSelect', [
                                'cols' => 'col-md-4 ',
                                'column' => 'type',
                                'isReload' => false,
                                'label' => 'garanty_form_type',
                                'optional' => 'text-danger',
                                'divID' => 'ville_id',
                                'options' => $garanties_types,
                                'object' => false,
                            ])
                            <div class="col-md-4">
                                <div>
                                    <label class="form-label my-1">{{ trans('translation.garanty_form_doe') }}</label>
                                    <input type="text" class="form-control" data-provider="flatpickr" data-enable-time
                                        data-date-format="Y-m-d"
                                        placeholder="{{ Carbon\Carbon::now()->format('d-m-Y H:i') }}" name="doe">
                                </div>
                            </div>
                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="content">{{ trans('translation.garanty_form_comment') }} &nbsp;
                                        <span class="text-secondary">*</span></label>
                                    <textarea class="form-control ckeditor" name="comment" id="comment" style="height: 213px">{{ old('comment') }}</textarea>
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
                                        class="btn btn-primary">{{ trans('translation.general_general_save') }}</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h6 class="card-title mb-0 text-white">Piece Jointes</h6>
                    </div>
                    <div class="card-body mx-auto">
                        <div class="profile-user position-relative d-inline-block  mb-4">
                            <img src="{{ URL::asset('assets/images/no_image.jpg') }}"
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
                    <div class="card-footer">
                                                    @include('form.input', [
                                'cols' => 'col-md-12',
                                'column' => 'document_ref',
                                'model' => 'garanty',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'document_ref',
                                'column_value' => old('document_ref'),
                                'readonly' => 'false',
                            ])
                    </div>
                </div>
            </div>
        </div>

        </form>

@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/num_point.js') }}"></script>
    <script src="{{ asset('assets/custom_js/region_ville.js') }}"></script>
    <script src="{{ asset('assets/custom_js/ville_secteur.js') }}"></script>
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>
    {{-- <script src="{{ asset('assets/custom_js/garanties/saveClient.js') }}"></script> --}}
    {!! JsValidator::formRequest('App\Http\Requests\StoreGarantyRequest') !!}
@endsection
