<div class="card-body">
    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">


                        <th class="sort" data-sort="language_name">{{ trans('translation.language_table_flag')}}
                            </th>
                            <th class="sort" data-sort="language_name">{{ trans('translation.language_table_name')}}</th>
                        <th class="sort" data-sort="language_locale">{{ trans('translation.language_table_locale')}}
                        </th>
                        <th class="sort" data-sort="language_default">{{ trans('translation.language_table_default')}}
                        </th>
                        <th class="sort" data-sort="language_status">{{ trans('translation.language_table_status')}}

                        </th>
                        </th>
<th class="sort" data-sort="action">{{ trans('translation.general_general_action')}}
                        </th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($objects as $object)

                    <tr class="text-center">

                        <td class="customer_name">
                            <img  src="{{URL::asset('storage/images/flags/'.$object->flag_path)}}" alt="" class="avatar-xs rounded-circle">
                        </td>
                        <td class="customer_name">{{$object->name}} </td>
                        <td class="email">{{$object->locale}} </td>
                        <td class="date">
                            <div class="form-check form-switch form-switch-success d-flex justify-content-center">
                                <input class="form-check-input default" data-route-name="{{ route('systemLanguages.changedefault') }}" type="checkbox" role="switch"  data-id="{{$object->id}}" {{$object->isDefault ? "checked" : ""}} >
                            </div>
                        </td>
                        <td class="status">
                            <div class="form-check form-switch d-flex justify-content-center">
                            <input class="form-check-input status" data-route-name="{{ route('systemLanguages.changestatus') }}" type="checkbox" role="switch"  data-id="{{$object->id}}" {{$object->status ? "checked" : ""}} >
                        </div>
                    </td>
                        <td>
                            @include('languages.actions')
                        </td>
                    </tr>

                    @endforeach
                </tbody>
            </table>
        </table>
    </div>

