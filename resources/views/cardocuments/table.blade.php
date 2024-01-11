<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>{{ trans('translation.cardocuments_table_picture') }}</th>
                       @foreach ($tableRows as $key => $value)
                            <th>{{ trans('translation.'.$model.'_table_' . $value) }} </th>
                        @endforeach
                        <th>{{ trans('translation.'.$model.'_table_status') }} </th>
                       <th>Durée</th>
                       <th>Situation</th>
                        <th class="sort" data-sort="action">{{ trans('translation.general_general_action') }}</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($objects as $object)
                        <tr class="text-center">
                            <td>
                                <div class="d-flex gap-2 align-items-center">
                                    <div class="flex-shrink-0">
                                        <img src="{{ getPicture($object->picture,'documents') }}" alt="" class="avatar-xs rounded-circle">
                                    </div>
                                </div>
                            </td>
                            @foreach ($tableRows as $key => $value)
                                 <td> {{ $object->$key }}</td>
                            @endforeach

                            <td>
                                <span class="badge {{$object->status == 'OUVERT' ? 'text-bg-primary' : 'text-bg-danger'}}">{{$object->status}}</span>
                            </td>
                            <td>
                                {{\Carbon\Carbon::parse($object->end_date)->diffForHumans()}}
                            </td>
                            @if (checkExpirationDate($object->end_date) === 'expire')
                            <td> <span class="badge text-bg-danger">Expiré</span></td>
                            @elseif (checkExpirationDate($object->end_date) === 'near')
                            <td> <span class="badge text-bg-warning">Près d'expirer</span></td>
                            @else
                            <td> <span class="badge text-bg-success">Toujours valide</span></td>
                            @endif
                            <td>
                                @include('cardocuments.actions')
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
</div>
