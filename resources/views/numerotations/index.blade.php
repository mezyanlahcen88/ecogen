@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.numerotation_form_manage_numerotations') }} |
    {{ trans('translation.numerotation_form_numerotations_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.numerotation_form_manage_numerotations'),
        'subtitle' => trans('translation.numerotation_form_numerotations_list'),
        'route' => route('numerotations.create'),
        'text' => trans('translation.numerotation_action_add'),
        'permission' => 'numerotation-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('numerotations.trashed'),
    'textTrashed' => trans('translation.numerotation_form_deleted_numerotations_list'),
    'permission'=>'numerotation-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('numerotations.table',[
        'model'=>'numerotation',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

