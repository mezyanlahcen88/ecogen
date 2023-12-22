@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.car_form_manage_cars') }} | {{ trans('translation.car_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.car_form_manage_cars'),
        'subtitle' => trans('translation.car_action_add'),
        'route' => route('cars.index'),
        'text' => trans('translation.car_form_cars_list'),
        'permission' => 'car-list',
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


        <form action="{{route('cars.update',$object->id)}}" method="post" id="userForm">
            @csrf
             @method('PUT')
             <div class="row">

                <div class="col-12">
                    <div class="card card-body">

                        <div class="row">

                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'matricule',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'matricule',
                                'column_value' => $object->matricule,
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'marque',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'marque',
                                'column_value' => $object->marque,
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'type',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'type',
                                'column_value' => $object->type,
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'dae',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'date',
                                'class_name' => '',
                                'column_id' => 'dae',
                                'column_value' => $object->dae,
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'nbplace',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'number',
                                'class_name' => '',
                                'column_id' => 'nbplace',
                                'column_value' => $object->nbplace,
                                'readonly' => 'false',
                            ])
                            @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'consommation',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'number',
                                'class_name' => '',
                                'column_id' => 'consommation',
                                'column_value' => $object->consommation,
                                'readonly' => 'false',
                            ])
                             @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'tonnage',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'number',
                                'class_name' => '',
                                'column_id' => 'tonnage',
                                'column_value' => $object->tonnage,
                                'readonly' => 'false',
                            ])
                             @include('form.input', [
                                'cols' => 'col-md-6',
                                'column' => 'obs',
                                'model' => 'car',
                                'optional' => 'text-danger',
                                'input_type' => 'text',
                                'class_name' => '',
                                'column_id' => 'obs',
                                'column_value' => $object->obs,
                                'readonly' => 'false',
                            ])


                        </div>
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreCarRequest') !!}

@endsection
