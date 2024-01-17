@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.reglement_form_manage_reglements') }} | {{ trans('translation.reglement_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.reglement_form_manage_deleted_reglements'),
        'subtitle' => trans('translation.reglement_form_deleted_reglements_list'),
        'route' => route('reglements.index'),
        'text' => trans('translation.reglement_form_reglements_list'),
        'permission' => 'reglement-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('reglements.trashedTable',[
        'model'=>'reglement',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
