<div class="d-flex justify-content-center gap-2">
    @can('user-show')
        <a href="{{ route('users.show', $object->uuid) }}" title="Voir"><span class="badge  text-bg-success"><i
                    class="las la-eye"></i></span></a>
    @endcan
    @can('user-edit')
        <a href="{{ route('users.edit', $object->uuid) }}" title="Edit"><span class="badge  text-bg-info"><i
                    class="las la-edit"></i></span></a>
    @endcan
    @can('user-delete')
        <a href="#" class="remove-item-btn" data-bs-toggle="modal" data-id="{{ $object->id }}"
            data-route-name="{{ route('users.destroy', 'delete') }}">
            <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            @endcan
</div>
