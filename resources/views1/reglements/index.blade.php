@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.reglement_form_manage_reglements') }} |
    {{ trans('translation.reglement_form_reglements_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.reglement_form_manage_reglements'),
        'subtitle' => trans('translation.reglement_form_reglements_list'),
        'route' => route('reglements.create'),
        'text' => trans('translation.reglement_action_add'),
        'permission' => 'reglement-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('reglements.trashed'),
    'textTrashed' => trans('translation.reglement_form_deleted_reglements_list'),
    'permission'=>'reglement-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('reglements.table',[
        'model'=>'reglement',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

