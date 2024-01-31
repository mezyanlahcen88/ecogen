@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.exercice_form_manage_exercices') }} | {{ trans('translation.exercice_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.exercice_form_manage_deleted_exercices'),
        'subtitle' => trans('translation.exercice_form_deleted_exercices_list'),
        'route' => route('exercices.index'),
        'text' => trans('translation.exercice_form_exercices_list'),
        'permission' => 'exercice-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('exercices.trashedTable',[
        'model'=>'exercice',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
