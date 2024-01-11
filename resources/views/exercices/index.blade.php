@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.exercice_form_manage_exercices') }} |
    {{ trans('translation.exercice_form_exercices_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.exercice_form_manage_exercices'),
        'subtitle' => trans('translation.exercice_form_exercices_list'),
        'route' => route('exercices.create'),
        'text' => trans('translation.exercice_action_add'),
        'permission' => 'exercice-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('exercices.trashed'),
    'textTrashed' => trans('translation.exercice_form_deleted_exercices_list'),
    'permission'=>'exercice-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('exercices.table',[
        'model'=>'exercice',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

