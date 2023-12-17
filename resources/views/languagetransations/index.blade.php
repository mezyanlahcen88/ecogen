@extends('layouts.base_layout')
@section('title')
{{ trans('translation.translation_form_translation_list') }}
@stop
@section('css')
@include('layouts.includes.datatable_css')

@endsection

@section('page-header')
@include('components.new_breadcrumb', [
    'title' => trans('translation.language_form_language_list'),
    'subtitle' => trans('translation.translation_form_translation_list'),
    'route' => route('systemLanguages.index'),
    'text' => trans('translation.language_form_language_list'),
    'permission'=>'company-create',
    'icon'=>'lab la-stack-exchange'

])
@endsection

@section('card_body')
{{-- <form action="{{route('systemLanguages.filterByKeyWord',$objects[0]->language_id ?? $id)}}"  method="GET" >
    <div class="card-header d-flex justify-content-between">
        <div class="title ">
            <h4 class="card-title mb-0">{{trans('translation.translation_form_translation_list')}}</h4>
        </div>
 <div class="w-50 d-flex ">
    <div class="input-group " >
        <input type="text" class="form-control search" placeholder="{{ trans('translation.general_general_keyword') }}" name="keyword" value="{{request()->keyword}}">
        <button class="btn btn-primary"><i class="ri-search-2-line"></i></button>
    </div>


 </div>


    </div>
    </form> --}}
@include('languagetransations.table')

@endsection

@section('js')
@include('layouts.includes.datatable_js')
<script>
    $(document).on('blur', '.savetranslation', function(e) {
            e.preventDefault();
            $id = $(this).attr('data-id');
            $inputvalue = $(this).val();
            $routeName = $(this).attr('data-route-name');
            $csrf = $("#generate_csrf").attr('content');
            console.log($id, $inputvalue, $routeName);
            $.ajax({
                url: $routeName,
                type: "post",
                data: {
                    id: $id,
                    value: $inputvalue,
                    _token: $csrf,
                },
                async: true,
                success: function(response) {
                    Toastify({
                        text: response.label + " updated with success",
                        duratiov: 3000,
                        style: {
                            background: "linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(64,81,137,1) 38%, rgba(0,212,255,1) 100%)"
                        }
                    }).showToast();
                }
            });

        })
</script>
@endsection

