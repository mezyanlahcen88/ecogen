@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.payment_form_manage_payments') }} | {{ trans('translation.payment_action_edit') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')

@endsection
@section('page-header')
    @include('components.new_breadcrumb', [
        'title' => trans('translation.payment_form_manage_deleted_payments'),
        'subtitle' => trans('translation.payment_form_deleted_payments_list'),
        'route' => route('payments.index'),
        'text' => trans('translation.payment_form_payments_list'),
        'permission' => 'payment-list',
        'icon' => 'lab la-stack-exchange',
    ])
@endsection

@section('card_body')
    @include('payments.trashedTable',[
        'model'=>'payment',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
@endsection
