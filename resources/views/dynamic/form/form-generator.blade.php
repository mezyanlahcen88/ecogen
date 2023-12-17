@foreach ($allForms as $form)
    <form {{ isset($action) ? "action=$action" : '' }} method="post" autocomplete="on" id="{{ $formId ?? null }}"
        @if (isset($isMultipart) && $isMultipart) enctype="multipart/form-data" @endif>
        @csrf
        @method($method)
        <div class="row">
            @foreach ($form['cards'] as $card)
                <div class="{{ $card['class'] }}" id="{{ isset($card['idCard']) ? $card['idCard'] : '' }}">
                    <div class="card mb-2">
                        @if (isset($card['title']))
                            <div class="card-header bg-primary">
                                <h6 class="card-title mb-0 text-white">{{ $card['title'] }}</h6>
                            </div>
                        @endif
                        <div class="row">
                            <!-- FORM FIELDS -->
                            <div @if (isset($card['rowsImage'])) class="col-md-9" @else class="col-md-12" @endif>
                                {{-- <div class="card"> --}}
                                <div class="card-body p-0">
                                    <div class="row">
                                        <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                                            <div class="example p-3">
                                                @if ($card['rowsFields'])
                                                    @include('dynamic.form.fields', [
                                                        'allRows' => $card['rowsFields'],
                                                    ])
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- </div> --}}
                            </div>
                            @if (isset($card['rowsImage']))
                                <!-- SIDE FORM -->
                                <div class="col-md-3">
                                    <div class="card-body p-0">
                                        <div class="row">
                                            <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                                                <div class="example p-3">
                                                    @if ($card)
                                                        @include('dynamic.form.side-form')
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-lg-12">
            <div class="text-start mb-2">
                @if (isset($form['submit']))
                    {{-- <button type="submit" id="{{ $formFields['submit']['id'] ?? '' }}"
                    class="btn btn-primary">{{ trans('translation.general_general_save') }}</button> --}}
                    <button type="submit" id="{{ $btnAdd ?? null }}"
                        class="btn btn-primary">{{ isset($labelBtn) ? $labelBtn : null }}</button>
                @else
                    <button type="submit"
                        class="btn btn-primary">{{ trans('translation.general_general_save') }}</button>
                @endif
            </div>
        </div>
    </form>
@endforeach
