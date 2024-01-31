@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.commands_form_manage_commands') }} |
    {{ trans('translation.commands_form_commands_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.commands_form_manage_commands'),
        'subtitle' => trans('translation.commands_form_commands_list'),
        'route' => route('commands.create'),
        'text' => trans('translation.commands_action_add'),
        'permission' => 'commands-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('commands.trashed'),
    'textTrashed' => trans('translation.commands_form_deleted_commands_list'),
    'permission'=>'commands-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
@include('commands.command_filter')
    @include('commands.table',[
        'model'=>'commands',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ asset('assets/custom_js/getCommandIndex.js') }}"></script>
    <script src="{{ asset('assets/custom_js/delete_advanced.js') }}"></script>
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

