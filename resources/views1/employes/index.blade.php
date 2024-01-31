@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.employe_form_manage_employes') }} |
    {{ trans('translation.employe_form_employes_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.employe_form_manage_employes'),
        'subtitle' => trans('translation.employe_form_employes_list'),
        'route' => route('employes.create'),
        'text' => trans('translation.employe_action_add'),
        'permission' => 'employe-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('employes.trashed'),
    'textTrashed' => trans('translation.employe_form_deleted_employes_list'),
    'permission'=>'employe-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('employes.table',[
        'model'=>'employe',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

