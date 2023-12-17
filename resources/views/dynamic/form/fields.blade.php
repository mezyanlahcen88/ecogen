@foreach ($allRows as $rows)
    <div class="row mb-3">
        @foreach ($rows as $key => $field)
            @if ($field->getType() == 'text' || $field->getType() == 'email' || $field->getType() == 'password')
                @include('tools.form.input', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif
            @if ($field->getType() == 'textarea')
                @include('tools.form.textarea', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif
            @if ($field->getType() == 'hidden')
                @include('tools.form.hidden', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif

            @if ($field->getType() == 'select')
                @include('tools.form.select', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif

            @if ($field->getType() == 'radio')
                @include('tools.form.radio', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif

            @if ($field->getType() == 'checkbox')
                @include('tools.form.checkbox', [
                    'fields' => $field,
                    'key' => $key,
                ])
            @endif
        @endforeach
    </div>
@endforeach
