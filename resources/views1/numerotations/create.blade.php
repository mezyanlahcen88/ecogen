@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.numerotation_form_manage_numerotations') }} |
    {{ trans('translation.numerotation_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.numerotation_form_manage_numerotations'),
        'subtitle' => trans('translation.numerotation_action_add'),
        'route' => route('numerotations.index'),
        'text' => trans('translation.numerotation_form_numerotations_list'),
        'permission' => 'numerotation-list',
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


    <form action="{{ route('numerotations.store') }}" method="post" id="userForm">
        @csrf
        <div class="row">

            <div class="col-12">
                <div class="card card-body">
                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'doc_type',
                            'model' => 'numerotation',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'doc_type',
                            'column_value' => old('doc_type'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'prefix',
                            'model' => 'numerotation',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'prefix',
                            'column_value' => old('prefix'),
                            'readonly' => 'false',
                        ])

                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'increment_num',
                            'model' => 'numerotation',
                            'optional' => 'text-danger',
                            'input_type' => 'number',
                            'class_name' => '',
                            'column_id' => 'increment_num',
                            'column_value' => old('increment_num'),
                            'readonly' => 'false',
                        ])
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                            <div class="form-group">
                                <label for="content">{{ trans('translation.numerotation_form_comments') }} &nbsp;
                                    <span class="text-secondary">*</span></label>
                                <textarea class="form-control ckeditor" name="comments" id="comments" style="height: 213px">{{ old('title') }}</textarea>
                            </div>
                        </div>


                    </div>
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
    <script src="{{ asset('assets/custom_js/ckeditor.js') }}"></script>

    {!! JsValidator::formRequest('App\Http\Requests\StoreNumerotationRequest') !!}
@endsection
