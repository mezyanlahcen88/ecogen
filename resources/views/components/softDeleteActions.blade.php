<div class="d-flex justify-content-center gap-2">
    @can($restorePermission)
        <div class="edit">
            <form action="{{ route($restoreRoute, $object->id) }}" method="POST" id="restoreForm">
                @csrf
                @method('PUT')

                <a href="#" onclick="$('#restoreForm').submit()"
                title="Restore"><span class="badge  text-bg-success"><i
                    class="las la-undo-alt"></i></span></a>
            </form>

        </div>
    @endcan
    @can($forceDeletePermission)
    <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}"
                data-route-name="{{ route($forceDeleteRoute, $object->id) }}">
                <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
    @endcan
</div>
