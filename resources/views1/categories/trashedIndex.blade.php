@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.category_form_manage_categories') }} | {{ trans('translation.category_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.category_form_manage_deleted_categories'),
        'subtitle' => trans('translation.category_form_deleted_categories_list'),
        'route' => route('categories.index'),
        'text' => trans('translation.category_form_categories_list'),
        'permission' => 'category-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('categories.trashedTable',[
        'model'=>'category',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
