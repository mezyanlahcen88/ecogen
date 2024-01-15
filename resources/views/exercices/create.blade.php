@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.exercice_form_manage_exercices') }} | {{ trans('translation.exercice_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.exercice_form_manage_exercices'),
        'subtitle' => trans('translation.exercice_action_add'),
        'route' => route('exercices.index'),
        'text' => trans('translation.exercice_form_exercices_list'),
        'permission' => 'exercice-list',
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


        <form action="{{route('exercices.store')}}" method="post" id="userForm">
            @csrf
            <div class="row">

                <div class="col-12">
                    <div class="card card-body">
                        <div class="row">
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'exercice',
                                'model' => 'exercice',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'exercice',
                                'column_value' => old('exercice'),
                                'readonly' => 'false',
                            ])
                                            @include('form.singleSelect', [
                                                'cols' => 'col-md-6 ',
                                                'column' => 'etat',
                                                'isReload' => false,
                                                'label' => 'exercice_form_etat',
                                                'optional' => 'text-danger',
                                                'divID' => 'etat',
                                                'options' =>$exercice_etats,
                                                'object' => false,
                                            ])

                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                                <div class="form-group">
                                    <label for="content">{{ trans('translation.exercice_form_obs') }} &nbsp;
                                        <span class="text-secondary">*</span></label>
                                    <textarea class="form-control ckeditor" name="obs" id="obs" style="height: 213px">{{ old('obs') }}</textarea>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreExerciceRequest') !!}
@endsection
