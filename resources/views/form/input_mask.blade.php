    <div class="{{ $cols }} my-1">
        <div class="input-group">

            <input type="{{ $input_type }}"
                class="form-control {{ $class_name ?? '' }} @error($column) is-invalid @enderror"
                name="{{ $column }}" id="{{ $column_id ?? '' }}" aria-describedby="helpId"
                placeholder="{{ trans('translation.' . $model . '_form_' . $column . '_placeholder') }}"
                value="{{ $column_value }}" {{ $attribute ?? '' }}>
            <span class="input-group-text" id="basic-addon2">Amount</span>
        </div>
        @error($column)
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
