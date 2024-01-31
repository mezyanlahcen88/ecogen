<div class="card">
    <div class="card-header">
        <h5 class="card-title mb-0">liste des document Près d'expirer</h5>
    </div>
    <div class="card-body">
        <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" >
            <thead class="table-light">
                <tr class="text-center">
                    <th>{{ trans('translation.cardocuments_table_nature') }} </th>
                    <th>{{ trans('translation.cardocuments_table_status') }} </th>
                    <th>Durée</th>
                    <th>Situation</th>
                </tr>
            </thead>
            <tbody class="list form-check-all">
                @foreach ($car_documents as $object)
                    <tr class="text-center">
                        <td> {{ $object->nature }}</td>
                        <td>
                            <span
                                class="badge {{ $object->status == 'OUVERT' ? 'text-bg-primary' : 'text-bg-danger' }}">{{ $object->status }}</span>
                        </td>
                        <td>
                            {{ \Carbon\Carbon::parse($object->end_date)->diffForHumans() }}
                        </td>
                        @if (checkExpirationDate($object->end_date) === 'expire')
                            <td> <span class="badge text-bg-danger">Expiré</span></td>
                        @elseif (checkExpirationDate($object->end_date) === 'near')
                            <td> <span class="badge text-bg-warning">Près d'expirer</span></td>
                        @else
                            <td> <span class="badge text-bg-success">Toujours valide</span></td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
