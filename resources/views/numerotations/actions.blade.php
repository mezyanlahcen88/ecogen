
    <div class="d-flex justify-content-center gap-2">
        @can('numerotation-edit')
            <div class="edit">
                <a href="{{ route('numerotations.edit', $object->id)}}" title="Edit"><span class="badge  text-bg-info"><i class="las la-edit"></i></span></a>
                </a>
            </div>
        @endcan
        @can('numerotation-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('numerotations.destroy', 'delete') }}">
              <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            </div>
        @endcan
    </div>
