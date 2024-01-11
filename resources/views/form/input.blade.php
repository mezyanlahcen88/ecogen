<div class="{{$cols}} my-1 {{ $divID ?? '' }}">
<div class="form-group">
    <label for={{ $column }}>{{ trans('translation.'.$model.'_form_'.$column) }} &nbsp;<span class="{{ $optional }}">*</span></label>
    <input type="{{ $input_type }}" class="form-control {{ $class_name ?? '' }} @error($column) is-invalid @enderror" name="{{ $column }}"
        id="{{ $column_id ?? '' }}"
        aria-describedby="helpId"
        placeholder="{{ trans('translation.'.$model.'_form_'.$column.'_placeholder') }}"
        value="{{ $column_value }}"
        {{ $attribute ?? '' }}
        {{$readonly ?? ''}}>
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


