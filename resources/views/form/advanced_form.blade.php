<form method="POST" action="{{ $action }}">
    @csrf

    @foreach ($form as $row => $rowDivs)
        <div class="row">
            @foreach ($rowDivs as $attribut => $attributValues)
            <div class="form-group {{ $attributValues['col'] }}">
                <label for="{{ $attribut }}">{{ $attributValues['libelle'] }}</label>

                @if ($attributValues['type'] === 'input')
                    <input type="text" name="{{ $attribut }}" class="{{ $attributValues['class'] }}" value="{{ $attributValues['value'] }}">
                @elseif ($attributValues['type'] === 'select')
                    <select name="{{ $attribut }}" id="{{ $attributValues['id'] }}" class="{{ $attributValues['class'] }}">
                        @foreach ($attributValues['options'] as $option)
                            <option value="{{ $option->id }}">{{ $option->gender }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
            @endforeach
        </div>

    @endforeach


    <div class="form-group mt-1">
        <button type="submit" class="btn btn-primary">{{ $submit }}</button>
    </div>
</form>
