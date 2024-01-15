<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>{{ trans('translation.devis_table_picture') }}</th>
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
                            <td class="email">
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ getPicture($object->picture,devis) }}" alt="" class="avatar-xs rounded-circle">
                                    </div>
                                </div>
                            </td>
                                @foreach ($tableRows as $key => $value)
                                 <td> {{ $object->$key }}</td>
                            @endforeach

                            <td>
                                    @include('components.softDeleteActions',[
                                    'restoreRoute'=>'devis.restore',
                                    'forceDeleteRoute'=>'devis.forceDelete',
                                    'restorePermission'=>'devis-restore',
                                    'forceDeletePermission'=>'devis-forse-delete',
                                ])
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
