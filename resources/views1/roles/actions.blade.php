
    <div class="d-flex justify-content-center gap-2">
        @can('role-edit')

                <a href="{{ route('roles.edit', $object->id)}}" title="Edit"><span class="badge  text-bg-info"><i class="las la-edit"></i></span></a>

        @endcan
        @can('role-delete')
                    <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                    data-id="{{ $object->id }}" data-route-name="{{ route('roles.destroy', 'delete') }}">
                  <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>

        @endcan
    </div>

