<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
        <thead class="table-light">
            <tr class="text-center">
                @foreach ($tableRows as $key => $value)
                    <th>{{ trans('translation.' . $model . '_table_' . $value) }} </th>
                @endforeach
                <th>Total Garanty</th>
                <th>Piece Garanty</th>
                <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}
                </th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($objects as $object)
                <tr class="text-center">
                    @foreach ($tableRows as $key => $value)
                        <td> {{ $object->$key }}</td>
                    @endforeach
                    <td>{{ getTotalGaranties(collect($object->garanties)) }} <span
                            class="badge bg-success mt-n2">{{ $object->garanties->count() }}</span></td>
                            <td>
                                <button  class="btn badge bg-success" data-bs-toggle="tooltip" data-bs-html="true" title="
                                    @forelse ($object->garanties as $doc_ref)
                                        <h6 class='text-light'>{{ $doc_ref->document_ref }}</h6>
                                    @empty
                                    <h6 class='text-light'>il n'y a pas de document</h6>
                                    @endforelse
                                ">
                                    les documents
                                </button>
                            </td>
                    <td>
                        @include('suppliers.actions')
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
