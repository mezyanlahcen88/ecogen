<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
        <thead class="table-light">
            <tr class="text-center">
                <th class="sort" data-sort="role_id" style="width: 10%;">#</th>
                <th class="sort " data-sort="role_name" style="width: 50%;">
                    {{ trans('translation.role_table_roles_name') }}</th>
                <th class="sort" data-sort="action" style="width: 20%;">
                    {{ trans('translation.general_general_action') }}</th>
            </tr>
        </thead>
        <tbody class="list form-check-all">
            @foreach ($objects as $object)

                    <tr class="text-center">
                        <td class="customer_name">{{ $object->id }} </td>
                        <td class="status"><span
                                class="badge badge-soft-success text-uppercase">{{ $object->name }}</span></td>
                        <td>
                            @include('roles.actions')
                        </td>
                    </tr>

             
            @endforeach
        </tbody>
    </table>
</div>
