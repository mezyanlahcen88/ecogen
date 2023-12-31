@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.cardocuments_form_manage_cardocuments') }} | {{ trans('translation.cardocuments_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.cardocuments_form_manage_deleted_cardocuments'),
        'subtitle' => trans('translation.cardocuments_form_deleted_cardocuments_list'),
        'route' => route('car-documents.index'),
        'text' => trans('translation.cardocuments_form_cardocuments_list'),
        'permission' => 'cardocuments-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('cardocuments.trashedTable',[
        'model'=>'cardocuments',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
