@extends('layouts.base_layout')
@section('title')
  {{env('APP_NAME')}} | {{ trans('translation.setting_form_manage_settings') }}

@endsection
@section('css')
@include('layouts.includes.form_js')
@endsection
@section('content')
@include('components.breadcrumb',[
    'title' => trans('translation.setting_form_settings_list'),
    'subtitle' => trans('translation.setting_form_manage_settings'),
])
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                @include('settings.edit_form')
            </div><!--end card-->
        </div>
        <!--end col-->
    </div><!--end row-->

    </div>
@endsection
@section('script')

@include('layouts.includes.form_js')
<script src="{{ URL::asset('assets/js/pages/form-wizard.init.js') }}"></script>
<script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
{!! JsValidator::formRequest('App\Http\Requests\StoreSettingRequest'); !!}


@endsection
