<table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
    <thead class="table-light">
        <tr class="text-center">
            <th>REF</th>
            <th>Désignation & المنتوج</th>
            <th>{{ trans('translation.commands_table_unite') }}</th>
            <th>{{ trans('translation.commands_table_quantity') }}</th>
            <th>{{ trans('translation.commands_table_price') }}</th>
            <th>{{ trans('translation.commands_table_ht') }}</th>
            <th>{{ trans('translation.commands_table_tva') }} %</th>
            <th>{{ trans('translation.commands_table_total_tva') }}</th>
            <th>{{ trans('translation.commands_table_total_ttc') }}</th>
        </tr>
    </thead>
    <tbody class="list form-check-all" id="productTableBody">
@foreach ($object->products as $product)
<tr class="text-center">
    <td>{{$product->product_code}}</td>
    <td>{{$product->pivot->designation}}</td>
    <td>{{$product->unite}}</td>
  <td>{{$product->pivot->quantity}}</td>
  <td>{{$product->pivot->price}}</td>
  <td>{{$product->pivot->TOTAL_HT}}</td>
  <td>{{$product->pivot->TVA}}</td>
  <td>{{$product->pivot->TOTAL_TVA}}</td>
  <td>{{$product->pivot->TOTAL_TTC}}</td>
</tr>
@endforeach
    </tbody>
</table>
