@extends('layouts.main_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.category_form_manage_categories') }} |
    {{ trans('translation.category_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.category_form_manage_categories'),
        'subtitle' => trans('translation.category_action_add'),
        'route' => route('categories.index'),
        'text' => trans('translation.category_form_categories_list'),
        'permission' => 'category-list',
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


    <form action="{{ route('categories.update', $object->id) }}" method="post" id="userForm" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">

            <div class="col-9">
                <div class="card card-body">

                    <div class="row">
                        @include('form.input', [
                            'cols' => 'col-md-6',
                            'column' => 'name',
                            'model' => 'category',
                            'optional' => 'text-danger',
                            'input_type' => 'text',
                            'class_name' => '',
                            'column_id' => 'name',
                            'column_value' => $object->name,
                            'readonly' => 'false',
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'parent_id',
                            'isReload' => false,
                            'label' => 'category_form_parent_id',
                            'optional' => 'text-danger',
                            'divID' => 'parent_id',
                            'options' => $categories,
                        ])
                        @include('form.singleSelect', [
                            'cols' => 'col-md-6 ',
                            'column' => 'menu',
                            'isReload' => false,
                            'label' => 'category_form_menu',
                            'optional' => 'text-danger',
                            'divID' => 'menu',
                            'options' => $menus,
                            'object' => false,
                        ])
          <div class="col-md-6">
            <div class="form-check form-switch form-switch-md checkboxstyle" dir="ltr">
                <input type="checkbox" class="form-check-input " id="customSwitchsizelg"
                     name="stockable" value="1" >
                <label class="form-check-label" for="customSwitchsizelg">{{ trans('translation.category_form_stockable') }}</label>
            </div>
        </div>

                    </div>
                </div>
            </div>

            <div class="col-3">
                <div class="card card-body">
                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                        <img src="{{ URL::asset(getPicture($object->picture,'categories')) }}"
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
    {!! JsValidator::formRequest('App\Http\Requests\StoreCategoryRequest') !!}

@endsection
