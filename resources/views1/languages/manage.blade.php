@extends('layouts.base_layout')
@section('title')
{{env('APP_NAME')}} | {{ trans('translation.language_form_manage_languages') }} {{ trans('translation.language_form_language_list') }}
@stop
@section('css')
@include('layouts.includes.datatable_css')
@endsection
@section('page-header')
@include('components.breadcrumb', [
'title' => trans('translation.general_general_configuration'),
'subtitle' => trans('translation.language_form_manage_languages'),
])
@endsection
@section('card_header')
@include('components.card_header_new_datatable',[
'card_header_text'=>trans('translation.language_form_language_list'),
'name_route'=>'systemLanguages.create',
'add_permission'=>'systemlanguage-create',
'add_text'=>trans('translation.language_action_add')
])
@stop
@section('card_body')

@include('languages.manageTable')

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

