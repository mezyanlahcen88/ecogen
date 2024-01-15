
    <div class="d-flex justify-content-center gap-2">
        @can('product-edit')
        <div class="edit">
            <a href="{{ route('products.edit', $object->id)}}" title="Vente"><span class="badge  text-bg-primary"><i class="las la-edit"></i></span></a>
            </a>
        </div>
    @endcan
    @can('product-edit')
    <div class="edit">
        <a href="{{ route('products.edit', $object->id)}}" title="Achat"><span class="badge  text-bg-success"><i class="las la-list"></i></span></a>
        </a>
    </div>
@endcan
        @can('product-edit')
            <div class="edit">
                <a href="{{ route('products.edit', $object->id)}}" title="Edit"><span class="badge  text-bg-info"><i class="las la-edit"></i></span></a>
                </a>
            </div>
        @endcan
        @can('product-delete')
            <div class="remove">
                <a href="#" class="remove-item-btn" data-bs-toggle="modal"
                data-id="{{ $object->id }}" data-route-name="{{ route('products.destroy', 'delete') }}">
              <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
            </div>
        @endcan
    </div>

