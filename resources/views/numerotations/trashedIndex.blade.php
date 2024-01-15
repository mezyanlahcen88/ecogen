@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.numerotation_form_manage_numerotations') }} | {{ trans('translation.numerotation_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.numerotation_form_manage_deleted_numerotations'),
        'subtitle' => trans('translation.numerotation_form_deleted_numerotations_list'),
        'route' => route('numerotations.index'),
        'text' => trans('translation.numerotation_form_numerotations_list'),
        'permission' => 'numerotation-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('numerotations.trashedTable',[
        'model'=>'numerotation',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
