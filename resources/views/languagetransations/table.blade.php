<div class="card-body">
      <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"  style="width:100%">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>{{ trans('translation.translation_table_label')}}</th>
                        <th>{{ trans('translation.translation_table_model')}}</th>
                        {{-- <th>{{ trans('translation.translation_table_type')}}</th> --}}
                        <th>{{ trans('translation.translation_table_translation')}}</th>
                    </tr>
                </thead>
                <tbody class="list form-check-all">
                    @foreach ($objects as $object)

                    <tr class="text-center">
                        <td>{{ $object->id }}</td>
                        <td>{{ $object->label }}</td>
                        <td>{{explode("_",$object->label)[0]}}</td>
                        {{-- <td>{{(explode("_",$object->label))[0]}}</td> --}}
                        <td><input type="text" class="form-control savetranslation"
                            value="{{ $object->translation }}" data-id="{{ $object->id }}"
                            data-route-name="{{ route('languagetranslations.translate') }}" style="border:0;"></td>
                    </tr>

                @endforeach
                </tbody>
            </table>


</div><!-- end card -->
