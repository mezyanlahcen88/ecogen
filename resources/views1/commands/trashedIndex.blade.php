@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.commands_form_manage_commands') }} | {{ trans('translation.commands_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.commands_form_manage_deleted_commands'),
        'subtitle' => trans('translation.commands_form_deleted_commands_list'),
        'route' => route('commands.index'),
        'text' => trans('translation.commands_form_commands_list'),
        'permission' => 'commands-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('commands.trashedTable',[
        'model'=>'commands',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
