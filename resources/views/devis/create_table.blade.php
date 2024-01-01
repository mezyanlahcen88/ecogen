<table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered" style="width:100%">
    <thead class="table-light">
        <tr class="text-center">
            <th>REF</th>
            <th>Désignation & المنتوج</th>
            <th>{{ trans('translation.devis_table_unite') }}</th>
            <th>{{ trans('translation.devis_table_quantity') }}</th>
            <th>{{ trans('translation.devis_table_price') }}</th>
            <th>{{ trans('translation.devis_table_ht') }}</th>
            <th>{{ trans('translation.devis_table_tva') }} %</th>
            <th>{{ trans('translation.devis_table_total_tva') }}</th>
            <th>{{ trans('translation.devis_table_total_ttc') }}</th>
            <th>{{ trans('translation.general_general_action') }}</th>
        </tr>
    </thead>
    <tbody class="list form-check-all" id="productTableBody">
{{-- <tr class="text-center">
    <td>PR-1</td>
    <td>Cima 45 | سيما 45</td>
    <td>Piece</td>
    <td><div class="input-step">
        <button type="button" class="minus">–</button>
        <input type="number" class="product-quantity" id="product-qty-1" value="1" readonly="">
        <button type="button" class="plus">+</button>
    </div>
  </td>
    <td>75</td>
    <td>75</td>
    <td>20</td>
    <td>20</td>
    <td>90</td>
    <td><button class="btn remove"><i class="las la-times text-danger fs-1"></i></button></td>
</tr> --}}
    </tbody>
</table>
