@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.brand_form_manage_brands') }} | {{ trans('translation.brand_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.brand_form_manage_brands'),
        'subtitle' => trans('translation.brand_action_add'),
        'route' => route('brands.index'),
        'text' => trans('translation.brand_form_brands_list'),
        'permission' => 'brand-list',
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


        <form action="{{route('brands.store')}}" method="post" id="userForm" enctype="multipart/form-data">
            @csrf
            <div class="row">

        <div class="col-12">
            <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'name',
                            'model' => 'brand',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name',
                            'column_value' => old('name'),
                            'readonly' => 'false',
                        ])
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'picture',
                            'model' => 'brand',
                            'optional' => 'text-secondary',
                            'input_type' => 'file',
                            'class_name' => '',
                            'column_id' => 'picture',
                            'column_value' => old('picture'),
                            'readonly' => 'false',
                        ])
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreBrandRequest') !!}
@endsection
