 <div class="{{ $field->getClass() }}">
     <div class="form-group" autocomplete="false">

         <div class="d-flex justify-content-between">
             <label for="{{ $key }}"> {{ $field->getLabel() }}
                 &nbsp; <span class="{{ $field->getRequired() ? 'text-danger' : 'text-secondary' }}">*</span></label>
             @if ($field->getReload())
                 @include('components.reload_create', [
                     'route_name' => $field->getReload()['route_name'],
                     'reload_route' => $field->getReload()['reload_route'],
                     'reloadClass' => $field->getReload()['reloadClass'],
                 ])
             @endif
         </div>

         <select name="{{ $key }}" onchange="console.log($(this).val())"
             {{ $field->getIsMultiple() ? 'multiple' : '' }} class="js-example-basic-single">
             <option selected="{{ $field->getType() }}">
                 {{ trans('translation.general_general_select') }}
             </option>
             @foreach ($field->getOptions() as $optionKey => $optionValue)
                 <option value="{{ $optionKey }}" {{ $field->getValue() == $optionKey ? 'selected' : '' }}>
                     {{ $optionValue }}
                 </option>
             @endforeach



         </select>
         @error($key)
             <div id="error" class="form-text text-danger">
                 {{ $message }}
             </div>
         @enderror
     </div>
 </div>
