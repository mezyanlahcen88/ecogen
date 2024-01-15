@extends('layouts.base_layout')
@section('title')
{{ trans('translation.configuration.language_translation') }}
@stop
@section('css')
@include('layouts.includes.form_css')
@endsection
@section('page-header')
@include('components.breadcrumb', [
'title' => trans('translation.general_general_configuration'),
'subtitle' => trans('translation.configuration.language_translation'),
])
@endsection
@section('card_header')
@include('components.card_header_form', [
'form_text' => trans('translation.configuration.language_translation'),
'name_route' => route('languages.index'),
])
@endsection
@section('card_body')
<div class="card-body">
    <div class="live-preview">
        <div class="row gy-4">
            <form action="#" method="post" autocomplete="off">
                @csrf
                @method('PUT')


                @foreach ($objects as $object)
                <div class="row mb-1">
                    <div class="col-1">
                        <input type="text" value="{{ $object->id }}" class="form-control w-100" readonly style="
        text-align: center;">
                    </div>
                    <div class="col-4">
                        <input type="text" class="form-control" value="{{ $object->label }}" readonly>

                    </div>
                    <div class="col-7">
                        <input type="text" class="form-control savetranslation" value="{{ $object->translation }}"
                            data-id="{{ $object->id }}" data-route-name="{{ route('languagetranslations.translate') }}">
                    </div>
                </div>
                @endforeach
                <div class="mt-4">
                    {{ $objects->links() }}
                </div>





                {{-- <button class="btn ripple btn-outline-primary mt-3" type="submit">{{ trans('translation.general_general_save')
                    }}</button> --}}
            </form>
        </div>
    </div>
</div>
@endsection
@section('js')
@include('layouts.includes.form_js')
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
                // method: 'PUT',
                data: {
                    id: $id,
                    value: $inputvalue,
                    _token: $csrf,
                },
                async: true,
                success: function(response) {
                    Toastify({
                        text: response.label + "updated with success",
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
