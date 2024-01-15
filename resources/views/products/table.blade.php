<div class="card-body">
    <table id="datatable" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{ trans('translation.product_table_picture') }}</th>
                       @foreach ($tableRows as $key => $value)
                            <th>{{ trans('translation.'.$model.'_table_' . $value) }} </th>
                        @endforeach
                         <th class="sort" data-sort="action">{{ trans('translation.'.$model.'_table_category_id') }}</th>
                         <th class="sort" data-sort="action">{{ trans('translation.'.$model.'_table_scategory_id') }}</th>
                         <th class="sort" data-sort="action">{{ trans('translation.'.$model.'_table_active') }}</th>
                         <th class="sort" data-sort="action">{{ trans('translation.'.$model.'_table_archive') }}</th>
                         <th class="sort" data-sort="action">Date de creation</th>
                        <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}</th>
                    </tr>
                </thead>
                {{-- <tbody class="list form-check-all">
                    @foreach ($objects as $object)
                        <tr class="text-center">
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ getPicture($object->picture,'products') }}" alt="" class="avatar-xs rounded-circle">
                                    </div>
                                </div>
                            </td>
                            @foreach ($tableRows as $key => $value)
                                 <td> {{ $object->$key }}</td>
                            @endforeach
                            <td> {{ $object->category->name }}</td>
                            <td> {{ $object->scategory->name }}</td>
                                                <td class="isactive ">
                        <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input changeStatus" type="checkbox" role="switch" id="check"
                                data-id="{{ $object->id }}" {{ $object->active ? 'checked' : '' }}
                                data-route-name="{{ route('products.changestatus') }}">
                        </div>
                    </td>
                            <td>
                                @include('products.actions')
                            </td>
                        </tr>
                    @endforeach
                </tbody> --}}
            </table>
</div>
