@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.employe_form_manage_employes') }} |
    {{ trans('translation.employe_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.employe_form_manage_employes'),
        'subtitle' => trans('translation.employe_action_add'),
        'route' => route('employes.index'),
        'text' => trans('translation.employe_form_employes_list'),
        'permission' => 'employe-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection
@section('content')
    <form action="{{ route('employes.store') }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-12">
                <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'first_name',
                            'model' => 'employe',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'first_name',
                            'column_value' => old('first_name'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'last_name',
                            'model' => 'employe',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'last_name',
                            'column_value' => old('last_name'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-4',
                            'column' => 'doe',
                            'model' => 'employe',
                            'optional' => 'text-danger',
                            'input_type' => 'date',
                            'class_name' => '',
                            'column_id' => 'doe',
                            'column_value' => old('doe'),
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
        </div>
    </form>


@endsection

@section('js')
    @include('layouts.includes.form_js')
    <script src="{{ asset('assets/custom_js/validate_number.js') }}"></script>
    {!! JsValidator::formRequest('App\Http\Requests\StoreEmployeRequest') !!}
@endsection
