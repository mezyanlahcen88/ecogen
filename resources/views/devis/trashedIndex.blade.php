@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.devis_form_manage_devis') }} | {{ trans('translation.devis_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.devis_form_manage_deleted_devis'),
        'subtitle' => trans('translation.devis_form_deleted_devis_list'),
        'route' => route('devis.index'),
        'text' => trans('translation.devis_form_devis_list'),
        'permission' => 'devis-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('devis.trashedTable',[
        'model'=>'devis',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
