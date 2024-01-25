
    <div class="d-flex justify-content-center gap-2">
        @can('commands-edit')
        <div class="show">
            <a href="{{ route('commands.show', $object->id)}}" title="Voir"><span class="badge  text-bg-primary"><i class="las la-eye"></i></span></a>
            </a>
        </div>
    @endcan
        @can('commands-edit')
            <div class="edit">

                <a href="#" id="command_edit" class="getCommand" data-command-id="{{ $object->id }}" title="Edit"><span
                    class="badge  text-bg-info"><i class="las la-edit"></i></span></a>
            </a>
            </div>
        @endcan
        @can('commands-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn-upd" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('commands.destroy', 'delete') }}">
              <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            </div>
        @endcan
    </div>

