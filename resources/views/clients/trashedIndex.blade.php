@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.client_form_manage_clients') }} | {{ trans('translation.client_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.client_form_manage_deleted_clients'),
        'subtitle' => trans('translation.client_form_deleted_clients_list'),
        'route' => route('clients.index'),
        'text' => trans('translation.client_form_clients_list'),
        'permission' => 'client-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('clients.trashedTable',[
        'model'=>'client',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
