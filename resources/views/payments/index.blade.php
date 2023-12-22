@extends('layouts.new_base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.payment_form_manage_payments') }} |
    {{ trans('translation.payment_form_payments_list') }}
@stop
@section('css')
    @include('layouts.includes.datatable_css')
@endsection
@section('page-header')
    @include('components.new_breadcrumb_with_trashed', [
        'title' => trans('translation.payment_form_manage_payments'),
        'subtitle' => trans('translation.payment_form_payments_list'),
        'route' => route('payments.create'),
        'text' => trans('translation.payment_action_add'),
        'permission' => 'payment-create',
        'icon' => 'las la-plus',
        'icon'=>'las la-plus',
    'routeTrashed' => route('payments.trashed'),
    'textTrashed' => trans('translation.payment_form_deleted_payments_list'),
    'permission'=>'payment-trashed',
    'iconTrashed'=>'las la-trash-alt',

    ])
@endsection


@section('card-body')
    @include('payments.table',[
        'model'=>'payment',
    ])
@endsection

@section('js')
    @include('layouts.includes.datatable_js')
    <script src="{{ URL::asset('/assets/js/app.min.js') }}"></script>
@endsection

