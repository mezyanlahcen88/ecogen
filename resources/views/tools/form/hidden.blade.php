<input class="{{ $field->getFieldClass() }}" {{ $field->getRequired() == true ? 'required' : '' }}
             type="{{ $field->getType() }}" name="{{ $field->getKey() }}" id="{{ $field->getKey() }}"
              value="{{ $field->getValue() }}">