@extends('layouts.base_layout')
@section('title')
{{env('APP_NAME')}} | {{ trans('translation.language_form_manage_languages') }} {{ trans('translation.language_form_language_list') }}
@stop
@section('css')
@include('layouts.includes.datatable_css')
@endsection
{{-- @section('page-header')
@include('components.breadcrumb', [
'title' => trans('translation.general_general_configuration'),
'subtitle' => trans('translation.language_form_manage_languages'),
])
@endsection
@section('card_header')
<div class="card-header d-flex justify-content-between">
    <h5 class="card-title mb-0">{{trans('translation.language_form_language_list'),}}</h5>
</div>
@stop --}}
@section('page-header')
@include('components.new_breadcrumb', [
    'title' => trans('translation.language_form_manage_languages'),
    'subtitle' => trans('translation.language_form_language_list'),
    'route' => 'javascript: void(0);',
    'text' => trans('translation.language_form_language_list'),
    'permission'=>'company-create',
    'icon'=>'lab la-stack-exchange'

])
@endsection
@section('card_body')
@include('languages.table')
@endsection
@section('js')
@include('layouts.includes.datatable_js')
<script>
$(document).on('click', '.status', function () {
    $id = $(this).attr('data-id');
    $routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    $.ajax({
        url:$routeName,
        type: "POST",
        data: {
            id: $id,
            _token: $csrf
        },
        async: true,
        success: function (response)
        {
            if(response.code == 200) {
                if(response.status){
                    Swal.fire(
                        'Super!',
                        response.lang +' a été activé avec succès',
                        'success'
                    )
                }else{
                    Swal.fire(
                        'Super!',
                        response.lang +' a été desactivé avec succès',
                        'success'
                    )
                }
            }
        }
    });
});
$(document).on('click', '.default', function () {
    $id = $(this).attr('data-id');
    $routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    $.ajax({
        url:$routeName,
        type: "POST",
        data: {
            id: $id,
            _token: $csrf
        },
        async: true,
        success: function (response)
        {
            if(response.code == 200) {
                Swal.fire(
                        'Super!',
                        response.lang + ' est la langage par default ',
                        'success'
                    )
location.reload();
            }
        }
    });
});
</script>
@endsection
