
<div class="{{ $field->getClass() }}">
    <div class="form-group">
    <div class="p-1">
        <label for="{{ $key }}" class="mx-2"> {{ $field->getLabel() }}
            <span class="{{ $field->getRequired() ? 'text-danger' : 'text-secondary' }} ">*</span></label>
        <div class="text-center">
            <div class="profile-user position-relative d-inline-block mx-auto  mb-4 p-2">
                @if (isset($object))
                    <img src="{{ URL::asset('storage/images/' . $field->getImageFolder() . '/' . $object->$key) }}"
                        class=" avatar-xl img-thumbnail {{ 'user-' . $key . '-image' }}"
                        alt="{{ 'user-' . $key . '-image' }}" name="{{ $key }}">
                @else
                    <img src="{{ URL::asset('assets/images/no_image.jpg') }}"
                        class=" avatar-xl img-thumbnail {{ 'user-' . $key . '-image' }}"
                        alt="{{ 'user-' . $key . '-image' }}">
                @endif
                <div class="avatar-xs p-0
                        rounded-circle profile-photo-edit">
                    <input id="{{ $key . '-img-file-input' }}" data-image-id="{{ $key }}"
                        type="{{ $field->getType() }}" class="profile-img-file-input" name="{{ $key }}">
                    <label for="{{ $key . '-img-file-input' }}" class="profile-photo-edit avatar-xs">
                        <span class="avatar-title rounded-circle bg-light text-body">
                            <i class="ri-camera-fill"></i>
                        </span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    </div>
    @error($key)
        <div class="form-text text-danger" style="margin:-10px 0 0 15px ">
            <small>{{ $message }}</small>
        </div>
    @enderror
</div>


{{-- @else
    <div class="{{ $field->getClass() }}">
        <div class="form-group" autocomplete="false">
            <label for="{{ $key }}"> {{ $field->getLabel() }}
                <span class="{{ $field->getRequired() ? 'text-danger' : 'text-secondary' }} ">*</span></label>
            @if (isset($object))
                <input type="{{ $field->getType() }}" class="dropify" data-height="96" name="{{ $key }}"
                    data-default-file="{{ URL::asset('storage/images/transportcompanies/' . $object->favorites_icon) }}"
                    accept=".png " />
            @else
                <input type="{{ $field->getType() }}" class="dropify" data-height="96" name="{{ $key }}"
                    data-default-file="{{ URL::asset('storage/images/transportcompanies/1686684494-logo.png') }}"
                    accept=".png" />
            @endif
            <small>png</small>
        </div>
        @error($key)
            <div class="form-text text-danger" style="margin:-10px 0 0 15px ">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </div>
@endif --}}
