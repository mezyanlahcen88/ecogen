         <div class="{{ $field->getClass() }}">
             <div class="form-check form-radio-outline form-radio-primary">
                 <label for="{{ $field->getKey() }}">
                     {{ $field->getLabel() }}:
                 </label>
             </div>
         </div>
         <div class="{{ $field->getClass() }}">
             <div class="form-group">
                 <div class="form-check form-switch form-switch-success">
                     <input class="form-check-input" type="{{ $field->getType() }}" role="switch"
                         name="{{ $field->getKey() }}" id="{{ $field->getKey() }}"
                         {{ $field->getValue() == 1 ? 'checked' : '' }}>
                     <label class="form-check-label"
                         for="{{ $field->getKey() }}">{{ $field->getValue() == 1 ? trans('translation.payment_setting_form_enable') : trans('translation.payment_setting_form_disable') }}</label>
                 </div>
             </div>
         </div>
