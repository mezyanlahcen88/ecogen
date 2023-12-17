@extends('translation::layout')

@section('body')

    <div class="panel w-1/2">

        <div class="panel-header">

            {{ __('translation::translation.add_language') }}

        </div>

        <form action="{{ route('languages.store') }}" method="POST">

            <fieldset>

                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="panel-body p-4">

                    @include('translation::forms.text', ['field' => 'name', 'label' => __('translation::translation.language_name'), ])

                    @include('translation::forms.text', ['field' => 'locale', 'label' => __('translation::translation.locale'), ])

                </div>

            </fieldset>

            <div class="panel-footer flex flex-row-reverse">

                <button class="button button-blue" id="savellang">
                    {{ __('translation::translation.save') }}
                </button>

            </div>

        </form>

    </div>

@endsection
@section('js')
<script>
  $(document).ready(function () {
        $('input[name="locale"]').on('blur', function () {
            var locale = $(this).val();
            if (locale) {
                $.ajax({
                    url: "{{ URL::to('country') }}/",
                    type: "post",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="state"]').empty();

                        $.each(data, function (key, value) {
                            $('select[name="state"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            } else {
                console.log('AJAX load did not work');
            }
        });
    });


</script>
@endsection

