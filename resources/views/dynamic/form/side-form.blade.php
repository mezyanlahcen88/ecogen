@if (isset($card['rowsImage']))
    @foreach ($card['rowsImage'] as $rows)
        <div class="row">
            @foreach ($rows as $key => $field)
                @if ($field->getType() == 'file')
                    @include('tools.form.image', [
                        'fields' => $field,
                        'key' => $key,
                    ])
                @endif
            @endforeach
        </div>
    @endforeach
@endif
