<table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
    <thead class="table-light">
        <tr class="text-center">
            <th>{{ trans('translation.garanty_table_picture') }}</th>
            <th>{{ trans('translation.garanty_table_amount') }}</th>
            <th>{{ trans('translation.garanty_table_type') }}</th>
            <th>{{ trans('translation.client_table_type_client') }}</th>
            <th>{{ trans('translation.garanty_table_comment') }}</th>
            <th>{{ trans('translation.garanty_table_doe') }}</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
     @foreach ($object->garanties as $garanty)
     <tr class="text-center">
        <td>
            <div class="d-flex gap-2 align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{  getPicture($garanty->picture ,'garanties')}}" alt="" class="avatar-xs rounded-circle">
                </div>
            </div>
        </td>
        <td>{{$garanty->amount}}</td>
        <td>{{$garanty->type}}</td>
        <td>{{$garanty->parent_type}}</td>
        {{-- <td>{{html_entity_decode($garanty->comment)}} </td> --}}
        <td>{!! $garanty->comment !!}</td>
        <td>{{$garanty->doe}}</td>
     </tr>
     @endforeach
    </tbody>
</table>
