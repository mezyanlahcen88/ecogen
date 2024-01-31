<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">

                       @foreach ($tableRows as $key => $value)
                            <th>{{ trans('translation.'.$model.'_table_' . $value) }} </th>
                        @endforeach
                        <th>{{ trans('translation.reglement_table_parent_id') }}</th>
            <th>{{ trans('translation.reglement_table_date_reg') }}</th>

                        <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($objects as $object)
                        <tr class="text-center">
                              @foreach ($tableRows as $key => $value)
                                 <td> {{ $object->$key }}</td>
                            @endforeach
                            <td>{{ $object->client->getDesignation() }}</td>
                            <td>{{ Carbon\Carbon::parse($object->date_reg)->format('d/m/Y') }}</td>

                            <td>
                                @include('reglements.actions')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
