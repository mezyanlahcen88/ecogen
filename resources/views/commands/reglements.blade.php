<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Encaisement ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div
                            class="bg-info text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                            <label for="" id="commands">Reste à payer</label>
                            <label for="" id="total_restanter" class="fs-3">{{ $object->total_restant }}</label>
                        </div>
                        <div
                            class="bg-primary text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                            <label for="">Total TTC :</label>
                            <label for="" id="total_ttc" class="fs-3">{{ $object->TTTC }}</label>
                        </div>

                        <div
                            class="bg-warning text-light h-25 w-100 d-flex  justify-content-between align-items-center px-4 mb-1">
                            <label for="">Dont TVA :</label>
                            <label for="" id="total_ttva" class="fs-3">{{ $object->TVA }}</label>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="bg-soft-success text-white w-100 d-flex  justify-content-center align-items-center "
                            style="height: 184px">
                            <input type="number"
                                class="form-control w-50  bg-soft-success text-white border-0 fs-1 text-center"
                                name="" id="montantPayer" aria-describedby="helpId" value="0"
                                 @if ($object->total_restant <= 0) readonly @endif />


                        </div>
                    </div>

                </div>
                <div class="row mt-3">
                    @include('form.singleSelect', [
                        'cols' => 'col-md-5 ',
                        'column' => 'reglement',
                        'isReload' => false,
                        'label' => 'commands_form_reglement',
                        'optional' => 'text-danger',
                        'divID' => 'reglement',
                        'options' => $reglements,
                        'object' => false,
                    ])
                    @include('form.input', [
                        'cols' => 'col-md-5',
                        'column' => 'check_ref',
                        'model' => 'commands',
                        'optional' => 'text-secondary',
                        'input_type' => 'number',
                        'class_name' => '',
                        'column_id' => 'check_ref',
                        'column_value' => old('check_ref'),
                        'readonly' => 'false',
                    ])
                    <div class="col-md-2 mt-4">
                        <a href="#" id="btnValider" class="btn btn-primary text-light  w-100"><i
                                class="las la-check"></i></a>
                    </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label for="content">{{ trans('translation.commands_form_comment') }} &nbsp;
                                <span class="text-secondary">*</span></label>
                            <textarea class="form-control" name="comment" id="commentReg" rows="5">{{ old('comment') }}</textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <table id="scroll-horizontal" class="table nowrap align-middle table-hover table-bordered"
                        style="width:100%">
                        <thead class="table-light">
                            <tr class="text-center">
                                <th>Mode de reglement</th>
                                <th>Montant</th>
                                <th>Echéance</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="list form-check-all" id=RegTableBody>
                            {{-- <tr class="text-center">
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary storeReglement">Save Changes</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
