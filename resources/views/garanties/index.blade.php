@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.garanty_form_manage_garanties') }} |
    {{ trans('translation.garanty_form_garanties_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.garanty_form_manage_garanties'),
        'subtitle' => trans('translation.garanty_form_garanties_list'),
        'route' => route('garanties.create'),
        'text' => trans('translation.garanty_action_add'),
        'permission' => 'garanty-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('garanties.trashed'),
    'textTrashed' => trans('translation.garanty_form_deleted_garanties_list'),
    'permission'=>'garanty-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('garanties.table',[
        'model'=>'garanty',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

