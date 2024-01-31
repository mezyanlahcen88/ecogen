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
        {{-- @foreach ($object->products as $product)
            <tr class="text-center">
                <td>{{ $product->product_code }}</td>
                <td>{{ $product->pivot->designation }}</td>
                <td>{{ $product->unite }}</td>
                <td>
                    <div class="input-step">
                        <button type="button" class="minus">–</button>
                        <input type="number" class="product-quantity" id="product-qty-{{ $product->id }}"
                            value="{{ $product->pivot->quantity }}" readonly="">
                        <button type="button" class="plus">+</button>
                    </div>
                </td>
                <td>
                    <div class="input-step">
                        <button type="button" class="minus">–</button>
                        <input type="number" class="product-quantity" id="product-prix-{{ $product->id }}"
                            value="{{ $product->pivot->price }}" readonly="">
                        <button type="button" class="plus">+</button>
                    </div>
                </td>
                <td>{{ $product->pivot->TOTAL_HT }}</td>
                <td>
                    <div class="input-step">
                        <button type="button" class="minus">–</button>
                        <input type="number" class="product-quantity" id="product-tva-{{ $product->id }}"
                            value="{{ $product->pivot->TVA }}" readonly="">
                        <button type="button" class="plus">+</button>
                    </div>
                </td>
                <td>{{ $product->pivot->TOTAL_TVA }}</td>
                <td>{{ $product->pivot->TOTAL_TTC }}</td>
            </tr>
        @endforeach --}}
    </tbody>
</table>
