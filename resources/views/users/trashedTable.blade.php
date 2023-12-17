<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_picture') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_first_name') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_last_name') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_phone') }}</th>
                        <th class="sort" data-sort="user_email">{{ trans('translation.user_table_email') }}</th>
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
                                        <img src="{{ getUserPicture($object->picture) }}" alt="" class="avatar-xs rounded-circle">
                                    </div>
                                </div>
                            </td>
                            <td class="username"> {{ $object->first_name }}</td>
                            <td class="username"> {{ $object->last_name }}</td>
                            <td class="username"> {{ $object->phone }}</td>
                            <td class="email">{{ $object->email }}</td>
                            <td>
                                @include('components.softDeleteActions',[
                                    'restoreRoute'=>'users.restore',
                                    'forceDeleteRoute'=>'users.forceDelete',
                                    'restorePermission'=>'user-edit',
                                    'forceDeletePermission'=>'user-edit',
                                ])

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
