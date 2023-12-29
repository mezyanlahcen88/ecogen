<table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
    <thead class="table-light">
        <tr class="text-center">
            <th>{{ trans('translation.garanty_table_picture') }}</th>
            <th>{{ trans('translation.garanty_table_amount') }}</th>
            <th>{{ trans('translation.garanty_table_type') }}</th>
            <th>{{ trans('translation.client_table_type_client') }}</th>
            <th>{{ trans('translation.garanty_table_comment') }}</th>
            <th>{{ trans('translation.garanty_table_doe') }}</th>

            <th>{{ trans('translation.general_general_action') }}</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
     @foreach ($object->garanties as $gaanty)
     <tr class="text-center">
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>
        <td>{{$gaanty->amount}}</td>

     </tr>

     @endforeach
    </tbody>
</table>
