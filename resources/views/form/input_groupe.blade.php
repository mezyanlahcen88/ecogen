<div class="form-group">
    <label for={{ $column_name }}>{{ $translated_label }} &nbsp;
        <span class="{{ $text_color }}">*</span></label>
        <div class="input-group">
            <span class="input-group-text" id="inputGroup-sizing-default">{{$signe}}</span>
            <input type="{{ $input_type }}" class="form-control {{ $class_name ?? '' }} @error('first_name') is-invalid @enderror" name="{{ $column_name }}"
            id="{{ $column_id ?? '' }}" aria-describedby="helpId" placeholder="{{ $column_name_placeholder }}"
            value="{{ $column_name_value }}" {{ $attribute ?? '' }}aria-describedby="inputGroup-sizing-default">
        </div>
   
</div>
@error($column_name)
<span class="invalid-feedback" role="alert">
    <strong>{{ $message }}</strong>
</span>
@enderror
