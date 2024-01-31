@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.employe_form_manage_employes') }} | {{ trans('translation.employe_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.employe_form_manage_deleted_employes'),
        'subtitle' => trans('translation.employe_form_deleted_employes_list'),
        'route' => route('employes.index'),
        'text' => trans('translation.employe_form_employes_list'),
        'permission' => 'employe-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('employes.trashedTable',[
        'model'=>'employe',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
