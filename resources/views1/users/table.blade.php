<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_picture') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_first_name') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_last_name') }}</th>
                        <th class="sort" data-sort="user_img">{{ trans('translation.user_table_phone') }}</th>
                        <th class="sort" data-sort="user_email">{{ trans('translation.user_table_email') }}</th>
                        <th class="sort" data-sort="user_isactive">{{ trans('translation.user_table_active') }}</th>
                        <th class="sort" data-sort="user_role">{{ trans('translation.user_table_roles_name') }}</th>
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
                            <td class="isactive">
                                <div class="form-check form-switch d-flex justify-content-center">
                                    <input class="form-check-input changeStatus"
                                        data-route-name="{{ route('users.changestatus') }}" type="checkbox"
                                        role="switch" data-id="{{ $object->uuid }}"
                                        {{ $object->active ? 'checked' : '' }}>
                                </div>
                            </td>
                            <td class="role">
                                @if ($object->getRoleNames())
                                    @foreach ($object->getRoleNames() as $role)
                                        <span class="badge badge-soft-success"> {{ $role }} </span>
                                    @endforeach
                                @else
                                    <span class="badge badge-soft-info"> none </span>
                                @endif
                            </td>
                            <td>
                                @include('users.actions')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
