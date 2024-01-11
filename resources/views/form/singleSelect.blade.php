<div class="{{ $cols }} my-1" id="{{ $divID ?? '' }}">
    <div class="form-group">
        @if ($isReload)
            <div class="d-flex justify-content-between">
                <label for="{{ $column }}"> {{ trans('translation.' . $label) }} &nbsp; <span
                        class="{{ $optional }}">*</span></label>
                @include('components.reload_create', [
                    'route_name' => route('countries.index'),
                    'reload_route' => route('reload.getCountries'),
                    'reloadClass' => 'reloadCountries',
                ])
            </div>
        @else
            <label for="{{ $column }}"> {{ trans('translation.' . $label) }} &nbsp; <span
                    class="{{ $optional }}">*</span></label>
        @endif

        <select class="js-example-basic-single" name="{{ $column }}" id="{{ $id ?? '' }}">
            <option value="" >{{ trans('translation.general_general_select') }}</option>

                @foreach ($options as $key => $value)
                @if ($object)
                    <option value="{{ $key }}" {{ $key == $object->$column ? 'selected' : '' }}>
                        {{ $value }}
                    </option>
                    @else
                    <option value="{{ $key }}">
                        {{ $value }}
                    </option>
            @endif

                @endforeach


        </select>
    </div>
    @error($column)
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
    <div>
        <span class="text-danger error" id="error_{{ $column }}"></span>
    </div>
    <span id="{{ $column }}-error" class="help-block error-help-block"></span>
</div>
