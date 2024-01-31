<table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
    <thead class="table-light">
        <tr class="text-center">
            <th>{{ trans('translation.cardocuments_table_picture') }}</th>
            <th>{{ trans('translation.cardocuments_table_nature') }}</th>
            <th>{{ trans('translation.cardocuments_table_start_date') }}</th>
            <th>{{ trans('translation.cardocuments_table_end_date') }}</th>
            <th>{{ trans('translation.cardocuments_table_tranche') }}</th>
            <th>{{ trans('translation.cardocuments_table_status') }}</th>
        </tr>
    </thead>
    <tbody class="list form-check-all">
     @foreach ($object->documents as $document)
     <tr class="text-center">
        <td>
            <div class="d-flex gap-2 align-items-center">
                <div class="flex-shrink-0">
                    <img src="{{  getPicture($document->picture ,'documents')}}" alt="" class="avatar-xs rounded-circle">
                </div>
            </div>
        </td>
        <td>{{$document->nature}}</td>
        <td>{{$document->start_date}}</td>
        <td>{{$document->end_date}}</td>
        <td>{{$document->tranche}}</td>
        <td>{{$document->status}}</td>
     </tr>
     @endforeach
    </tbody>
</table>
