@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.cardocuments_form_manage_cardocuments') }} |
    {{ trans('translation.cardocuments_form_cardocuments_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.cardocuments_form_manage_cardocuments'),
        'subtitle' => trans('translation.cardocuments_form_cardocuments_list'),
        'route' => route('car-documents.create'),
        'text' => trans('translation.cardocuments_action_add'),
        'permission' => 'cardocuments-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('car-documents.trashed'),
    'textTrashed' => trans('translation.cardocuments_form_deleted_cardocuments_list'),
    'permission'=>'cardocuments-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('cardocuments.table',[
        'model'=>'cardocuments',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

