@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.garanty_form_manage_garanties') }} | {{ trans('translation.garanty_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.garanty_form_manage_deleted_garanties'),
        'subtitle' => trans('translation.garanty_form_deleted_garanties_list'),
        'route' => route('garanties.index'),
        'text' => trans('translation.garanty_form_garanties_list'),
        'permission' => 'garanty-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('garanties.trashedTable',[
        'model'=>'garanty',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
