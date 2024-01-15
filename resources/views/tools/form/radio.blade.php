 <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
     <div class="row">
         <div class="{{ $field->getClass() }}">
             <div class="form-check form-radio-outline form-radio-primary">
                 <label for="{{ $field->getKey() }}">
                     {{ $field->getLabel() }} :
                 </label>
             </div>
         </div>
         <div class="{{ $field->getClass() }}">
             <div class="form-check form-radio-outline form-radio-primary ">
                 <input class="form-check-input" type="{{ $field->getType() }}" name="{{ $field->getKey() }}"
                     id="{{ $field->getKey() }}" {{ $field->getValue() == 1 ? 'checked' : '' }}>
                 <label class="form-check-label" for="{{ $field->getOptions()[1] }}">
                     {{ $field->getOptions()[1] }}
                 </label>
             </div>
         </div>
         <div class="{{ $field->getClass() }}">
             <div class="form-check form-radio-outline form-radio-secondary">
                 <input class="form-check-input" type="{{ $field->getType() }}" name="{{ $field->getKey() }}"
                     id="{{ $field->getKey() }}" {{ $field->getValue() == 0 ? 'checked' : '' }}>
                 <label class="form-check-label" for="{{ $field->getOptions()[0] }}">
                     {{ $field->getOptions()[0] }}
                 </label>
             </div>
         </div>
     </div>
 </div>
