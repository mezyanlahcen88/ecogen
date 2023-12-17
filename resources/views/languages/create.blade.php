@extends('layouts.base_layout')
@section('title')
    {{ env('APP_NAME') }} | {{ trans('translation.language_form_manage_languages') }} {{ trans('translation.language_action_add') }}
@stop
@section('css')
    @include('layouts.includes.form_css')
@endsection
@section('page-header')
    @include('components.breadcrumb', [
        'title' => trans('translation.general_general_configuration'),
        'subtitle' => trans('translation.language_form_manage_languages'),
    ])
@endsection
@section('card_header')
    @include('components.card_header_form', [
        'form_text' => trans('translation.language_action_add'),
        'name_route' => route('systemLanguages.index'),
    ])
@endsection
@section('card_body')
    <div class="card-body">
        <div class="live-preview">
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

            <div class="row gy-4">
                <form action="  {{ route('systemLanguages.store') }} " method="post" autocomplete="off">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                            <div class="form-group" autocomplete="false">
                                <label for="name"> {{ trans('translation.language_form_name') }} &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="name"
                                    aria-describedby="helpId" placeholder=" {{ trans('translation.language_form_name_placeholder') }}"
                                    value="{{ old('name') }}">
                            </div>
                            @error('name')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                            <div class="form-group" autocomplete="false">
                                <label for="locale"> {{ trans('translation.language_form_locale') }} &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="locale" id="locale"
                                    aria-describedby="helpId" placeholder=" {{ trans('translation.language_form_locale_placeholder') }}"
                                    value="{{ old('locale') }}">
                            </div>
                            @error('locale')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                            <div class="form-group" autocomplete="false">
                                <label for="direction"> {{ trans('translation.language_form_direction') }} &nbsp; <span
                                        class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="direction" id="direction"
                                    aria-describedby="helpId"
                                    placeholder=" {{ trans('translation.language_form_direction_placeholder') }}"
                                    value="{{ old('direction') }}">
                            </div>
                            @error('direction')
                                <p class="text-danger"><small>{{ $message }}</small></p>
                            @enderror
                        </div>
                    </div>
                    <button class="btn ripple btn-outline-primary mt-3"
                        type="submit">{{ trans('translation.general_general_save') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
    @include('layouts.includes.form_js')
    {!! JsValidator::formRequest('App\Http\Requests\StoreLanguageRequest') !!}

@endsection
