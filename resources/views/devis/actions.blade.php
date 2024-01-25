<div class="d-flex justify-content-center gap-2">
    @can('devis-edit')
        <div class="show">
            <a href="{{ route('devis.show', $object->id) }}" title="Voir"><span class="badge  text-bg-primary"><i
                        class="las la-eye"></i></span></a>
            </a>
        </div>
    @endcan
    @can('devis-edit')
        <div class="edit">
            <a href="#" id="devis_edit" class="getDevis" data-devis-id="{{ $object->id }}" title="Edit"><span
                    class="badge  text-bg-info"><i class="las la-edit"></i></span></a>
            </a>
        </div>
    @endcan
    @can('devis-delete')
        <div class="remove">
            <a href="#" class="remove-item-btn-upd" data-bs-toggle="modal" data-id="{{ $object->id }}"
                data-route-name="{{ route('devis.destroy', 'delete') }}">
                <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
        </div>
    @endcan
</div>
