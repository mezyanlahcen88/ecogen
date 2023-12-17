 <div class="{{ $field->getClass() }}">
     <div class="form-group">
         <label for="{{ $field->getKey() }}">{{ $field->getLabel() }} &nbsp;
             <span class="text-danger">*</span></label>
         <textarea class="{{ $field->getFieldClass() }}" rows="{{ $field->getRows() }}"
             cols="{{ $field->getCols() }}"id="{{ $field->getKey() }}" name="{{ $field->getKey() }}"
             placeholder="{{ $field->getPlaceholder() }}" style="height: 213px">{{ $field->getValue() }}</textarea>
     </div>

     @if ($errors->has($field->getKey()))
         <span class="text-danger">{{ $errors->first($field->getKey()) }}</span>
     @endif
 </div>
