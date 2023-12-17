 <div class="{{ $field->getClass() }}">
     <div class="form-group">
         <label for="{{ $field->getKey() }}">{{ $field->getLabel() }}
             <span class="{{ $field->getRequired() ? 'text-danger' : 'text-secondary' }} ">*</span></label>
         <input class="{{ $field->getFieldClass() }}"
         {{-- {{ $field->getRequired() == true ? 'required' : '' }} --}}
             type="{{ $field->getType() }}" name="{{ $field->getKey() }}" id="{{ $field->getKey() }}"
             aria-describedby="helpId" placeholder="{{ $field->getPlaceholder() }}" value="{{ $field->getValue() }}">
     </div>

     @if ($errors->has($field->getKey()))
         <span class="text-danger">{{ $errors->first($field->getKey()) }}</span>
     @endif
 </div>
