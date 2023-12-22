<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        @foreach ($tableRows as $key => $value)
                            <th>{{ trans('translation.'.$model.'_table_' . $value) }} </th>
                        @endforeach
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

                            <td>
                                    @include('components.softDeleteActions',[
                                    'restoreRoute'=>'exercices.restore',
                                    'forceDeleteRoute'=>'exercices.forceDelete',
                                    'restorePermission'=>'exercice-restore',
                                    'forceDeletePermission'=>'exercice-forse-delete',
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
