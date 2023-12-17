<div class="form-group">
<label for={{$column_name}}>{{ $translated_label  }} &nbsp; <span class="{{$text_color}}">*</span></label>
 <textarea class="form-control ckeditor" name="{{$column_name}}" >{{$column_name_value}}</textarea>

</div>
@error($column_name)
<div id="emailHelp" class="form-text text-danger">
    <small>{{ $message }}</small>
</div>
@enderror
