@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.category_form_manage_categories') }} |
    {{ trans('translation.category_form_categories_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.category_form_manage_categories'),
        'subtitle' => trans('translation.category_form_categories_list'),
        'route' => route('categories.create'),
        'text' => trans('translation.category_action_add'),
        'permission' => 'category-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('categories.trashed'),
    'textTrashed' => trans('translation.category_form_deleted_categories_list'),
    'permission'=>'category-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('categories.table',[
        'model'=>'category',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

