<div id="myModal" class="modal fade" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Send Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
            </div>
            <div class="modal-body">
                {{-- <form action="#" method="post">
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label for="recever">check to send mail to :
                                &nbsp;
                                <span class="text-secondary">*</span></label>
                            <div class="mails d-flex ">

                                    <div class="form-check mb-3 mx-2" id="companyDiv">
                                        <input class="form-check-input" type="checkbox" id="Company" value="">
                                        <label class="form-check-label" for="Company">
                                            Company
                                        </label>
                                    </div>

                                    <div class="form-check mb-3 mx-2" id="saleManagerDiv">
                                        <input class="form-check-input" type="checkbox" id="sale_manager" value="">
                                        <label class="form-check-label" for="sale_manager">
                                            sale manager
                                        </label>
                                    </div>
                                    <div class="form-check mb-3 mx-2" id="accountantDiv">
                                        <input class="form-check-input" type="checkbox" id="Accountant" value="">
                                        <label class="form-check-label" for="Accountant">
                                            Accountant
                                        </label>
                                    </div>


                            </div>

                        </div>
                        @error('recever')
                            <div id="emailHelp" class="form-text text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label for="bcc">BCC
                                &nbsp;
                                <span class="text-secondary">*</span></label>

                            <input class="form-control" id="choices-text-remove-button" data-choices
                                data-choices-limit="50" data-choices-removeItem type="text" name="bcc[]" />
                        </div>
                        @error('bcc')
                            <div id="emailHelp" class="form-text text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
                        <div class="form-group">
                            <label for="subjetc">Subject
                                &nbsp;
                                <span class="text-secondary">*</span></label>

                            <input class="form-control subject" type="text" name="subject" />
                        </div>
                        @error('subjetc')
                            <div id="emailHelp" class="form-text text-danger">
                                <small>{{ $message }}</small>
                            </div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                        <div class="form-group">
                            <label for="email">Email Model &nbsp;
                                <span class="text-danger">*</span></label>
                            <select class="form-control"  name="email">
                                <option value="#" selected>{{ trans('translation.general_general_select') }}
                                </option>
                                @foreach ($emails as $email)
                                <option value="{{$email->id}}">{{$email->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        @error('email')
                            <div id="emailHelp" class="form-text text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>
                    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
                        <div class="form-group">
                            <label for="message">Message &nbsp;
                                <span class="text-danger">*</span></label>
                            <textarea class="form-control ckeditor" name="message" placeholder="Message" style="height: 213px">  </textarea>
                        </div>
                        @error('message')
                            <div id="emailHelp" class="form-text text-danger"><small>{{ $message }}</small></div>
                        @enderror
                    </div>

                </form> --}}
                <td>
                    <div class="d-flex justify-content-center gap-2 align-items-center">
                        <div class="form-check form-switch ">
                            <input class="form-check-input changeStatus" type="checkbox" role="switch" data-id="{{ $object->id }}"
                                {{ $object->isActive ? 'checked' : '' }} data-route-name="{{ route('suppliers.changestatus') }}">
                        </div>
                        @can('supplier-edit')
                            <a href="{{ route('suppliers.show', $object->id) }}"><span class="badge  text-bg-primary"><i
                                        class="las la-eye"></i></span></a>
                        @endcan
                        @can('supplier-edit')
                            <a href="{{ route('suppliers.edit', $object->id) }}"><span class="badge  text-bg-info"><i
                                        class="las la-edit"></i></span></a>
                        @endcan
                        {{-- <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left"
                            data-bs-content=" {{ $object->salle_manager_phone ? 'Sale manger phone :' . $object->salle_manager_phone : '' }}
                             {{ $object->accountant_phone ? 'Accountant phone :' . $object->accountant_phone : '' }} "
                            data-bs-original-title="Liste of phones">
                            <span class="badge  text-bg-secondary"><i class="las la-phone"></i></span>
                        </a> --}}
                        <a href="#" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="left" data-bs-html="true"
                        data-bs-content="
                            <p>
                                <strong> Sale manager : </strong><a href='tel:+21201020304'><span class='badge  text-bg-info'><i class='las la-phone'></i> +21201020304  </span></a><br>
                            </p>"
                        data-bs-original-title="Liste of phones">
                        <span class="badge  text-bg-secondary"><i class="las la-phone"></i></span>
                    </a>
                        @if ($object->whatsapp)
                            <a href="https://api.whatsapp.com/send?phone=212602086429" target="_blank"><span
                                    class="badge  text-bg-success"><i class="lab la-whatsapp"></i></span></a>
                        @endif

                        <a href="#" data-id="{{ $object->id }}" data-route-name="{{ route('suppliers.getMails') }}" data-emails="{{$object->company_email .';' .$object->salle_manager_email .';' .$object->accountant_email}}"
                            class="mail"><span class="badge  text-bg-warning "><i class="las la-envelope-open"></i></span></a>


                        @can('supplier-delete')
                            <a href="#" class="remove-item-btn" data-bs-toggle="modal" data-id="{{ $object->id }}"
                                data-route-name="{{ route('suppliers.destroy', 'delete') }}">
                                <span class="badge  text-bg-danger"><i class="las la-trash"></i></span></a>
                        @endcan

                    </div>
                </td>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary ">Send</button>
            </div>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
