{{-- /**
 * Render a form input field with label, validation, and optional indicator.
 *
 * @param string $cols            The CSS classes for the container div.
 * @param string $column          The input field name and label "for" attribute.
 * @param string $model           The model name for translation.
 * @param string $optional        Indicates if the field is optional or required.
 * @param string $input_type      The type of input field (e.g., text, number, etc.).
 * @param string|null $class_name Optional CSS classes for the input field.
 * @param string $column_id       The ID for the input field.
 * @param string $column_value    The value to pre-fill in the input field.
 * @param string $attribute       Additional HTML attributes for the input field.
 * @param string $symbol          The symbol to display in the input field.
 * @param string|null $message    The validation error message for this field (if any).
 */ --}}
<div class="{{ $cols }} my-2">
    <label for={{ $column }}>{{ trans('translation.'.$model.'_form_'.$column) }} &nbsp;<span class="{{ $optional }}">*</span></label>
    <div class="input-group">
        <input
        type="{{ $input_type }}"
        class="form-control {{ $class_name ?? '' }}  @error($column) is-invalid @enderror"
        name="{{ $column }}"
        id="{{ $column_id ?? '' }}"
        placeholder="00.00"
        value="{{ $column_value }}"
        {{ $attribute ?? '' }}
        pattern="^([0-9]+\.[0-9]+)$"
        aria-describedby="basic-addon2"
        >
        <span class="input-group-text" id="basic-addon2">{{$symbol}}</span>
    </div>
    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div>
        <span class="text-danger error"  id="error_{{ $column }}"></span>
    </div>
</div>
