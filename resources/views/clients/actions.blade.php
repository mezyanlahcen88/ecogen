
    <div class="d-flex justify-content-center gap-2">
        @can('client-edit')
        <div class="edit">
            <a href="{{ route('clients.createGaranty', $object->id)}}" title="Create"><span class="badge  text-bg-warning"><i class="las la-money-check-alt"></i></span></a>
            </a>
        </div>
      @endcan
        @can('client-edit')
            <div class="edit">
                <a href="{{ route('clients.edit', $object->id)}}" title="Edit"><span class="badge  text-bg-info"><i class="las la-edit"></i></span></a>
                </a>
            </div>
        @endcan
        @can('client-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn-upd" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('clients.destroy', 'delete') }}">
              <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            </div>
        @endcan
    </div>

