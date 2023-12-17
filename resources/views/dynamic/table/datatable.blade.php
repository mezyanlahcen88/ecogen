<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
        <thead class="table-light">
            <tr class="text-center">
                @foreach ($tableRows as $key => $value)
                    @if ($key !== 'actions_path')
                        <th class="sort" data-sort="{{ $value }}">
                            {{ trans('translation.'.$model.'_table_' . $value) }} </th>
                    @endif
                @endforeach
                @if (isset($tableRows['actions_path']))
                    <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }} </th>
                @endif
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($objects as $object)
                <tr class="text-center">

                    @foreach ($tableRows as $key => $value)
                        @if ($key === 'actions_path')
                            <td>
                                @include($tableRows['actions_path'], $object)
                            </td>
                        @elseif ($key === 'roles_name')
                            <td>
                                @if ($object->getRoleNames())
                                    @foreach ($object->getRoleNames() as $role)
                                        <span class="badge badge-soft-success"> {{ $role }} </span>
                                    @endforeach
                                @else
                                    <span class="badge badge-soft-info"> none </span>
                                @endif
                            </td>
                        @elseif ($key === 'isactive')
                            <td>
                                @if ($object->isactive == 1)
                                    <span class="badge badge-soft-success"> actif </span>
                                @else
                                    <span class="badge badge-soft-danger"> inactif </span>
                                @endif
                            </td>
                        @elseif ($key === 'picture')
                            <td>
                                                                        <img src="{{ URL::asset(getPicture($object->picture,'users')) }}" alt=""
                                            class="avatar-xs rounded-circle">

                            </td>

                    @else
                        <td class="{{ $key }}">{{ $object->$key }} </td>
                    @endif
            @endforeach


            </tr>
            @endforeach
        </tbody>
    </table>
</div>
