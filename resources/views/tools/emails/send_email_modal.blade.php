<form id="formSendEmail" action="{{ route('email.modal.send') }}" method="post">
    @csrf
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="form-group">

            <div class="form-group">
                <label for="cc">To :
                    &nbsp;
                    <span class="text-secondary">*</span></label>
                <input class="form-control" data-choices id="to" data-choices-limit="50" data-choices-removeItem
                    type="text" name="cc[]" id="cc" value="{{ implode(',', $to) }}" />
                <code id="ccError"></code>
            </div>
        </div>

    </div>
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="form-group">
            <label for="bcc">BCC
                &nbsp;
                <span class="text-secondary">*</span></label>
            <input class="form-control" data-choices data-choices-limit="50" data-choices-removeItem type="text"
                id="bcc" name="bcc[]" />
            <code id="bccError"></code>
        </div>

    </div>
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
        <div class="form-group">
            <label for="email">Email Model <span class="text-danger">*</span></label>
            <select class="form-control" data-choices data-choices-sorting-false id="email_model" name="email_model">
                <option value="" selected>{{ trans('translation.general_general_select') }}</option>
                @foreach ($emailModels as $model)
                    <option value="{{ $model->id }}">{{ $model->title }}</option>
                @endforeach
            </select>
        </div>
        <code id="email_modelError"></code>
    </div>
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
        <div class="form-group">
            <label for="subjetc">Subject
                &nbsp;
                <span class="text-secondary">*</span></label>
            <input class="form-control subject" type="text" id="subject" name="subject" />
            <code id="subjectError"></code>

        </div>

    </div>
    <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 my-2">
        <div class="form-group">
            <label for="message">Message &nbsp;
                <span class="text-danger">*</span></label>
            <textarea class="form-control ckeditor" id="content" name="message" placeholder="Message" style="height: 213px"></textarea>
            <code id="contentError"></code>
        </div>
    </div>
    <div class="row mb-2">
        <div class="col-md-12">
            <div class="card border border-info">
                <div class="card-header p-2 bg-info between-center">
                    <h6 class="card-title mb-0 text-white">Attachments</h6>
                    <div class="between-center">
                        <input type="file" name="email_files" class="d-none" id="email_files"
                            onchange="displaySelectedFiles()" multiple> <span class="text-white fs-3"
                            onclick="$('#email_files').click()"><i class="las la-paperclip"></i> </span>
                        <span class="text-white fs-6">Pieces Jointes
                            <span class="badge bg-white text-info ms-1" id="count_files"></span>
                        </span>

                    </div>

                </div>
                <div class="card-body p-2">
                    <div id="email_attachements">
                        <div class="row">


                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <div class="d-flex flex-wrap gap-2 justify-align-items justify-content-center">
        <button type="submit" class="btn btn-success"><i class="lab la-telegram-plane"></i> SEND</button>
        <button type="button" class="btn btn-light" data-bs-dismiss="modal"><i class="ri-close-circle-line"></i>
            Close</button>
    </div>
</form>

<div class="col-md-6 d-none temp-attachments">
    <div class="border rounded border-dashed p-1">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1 overflow-hidden">
                <h5 class="fs-13 m-0">
                    <a href="#" class="active">
                        <i class="ri-file-text-line me-1 text-danger align-middle fw-medium"></i>
                        <span class="attachment_title"></span>
                    </a>
                </h5>
            </div>
            <div class="d-flex gap-1">
                <a href="#" class="text-danger fs-13 attachment_delete">
                    <i class="ri-close-circle-line"></i>
                </a>
            </div>
        </div>
    </div>
</div>
<div class="col-md-6 d-none temp-attachments-uploaded">
    <div class="border rounded border-dashed p-1">
        <div class="d-flex align-items-center">
            <div class="flex-grow-1 overflow-hidden">
                <h5 class="fs-13 m-0">
                    <a href="#" class="active">
                        <i class="ri-attachment-2 me-1 text-success align-middle fw-medium"></i>
                        <span class="attachment_title"></span>
                    </a>
                </h5>
            </div>
            <div class="d-flex gap-1">
                <a href="#" class="text-success fs-13 attachment_delete">
                    <i class="ri-close-circle-line"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<script src="{{ asset('assets/ckeditor/ckeditor.js') }}"></script>

<script>
    $(document).ready(function() {


        $('#formSendEmail').submit(function(e) {
            e.preventDefault(); // Empêche l'envoi du formulaire

            // Récupérer les valeurs des champs de saisie
            var ccEmail = $('#cc').val();
            var bccEmail = $('#bcc').val();
            var content = $('#content').val();
            var email_model = $('#email_model').val();
            var subject = $('#subject').val();
            console.log(content);
            // Vérifier si le champ de texte est vide
            if (content === '') {
                alert('Veuillez saisir du contenu.');
                $('#contentError').text('Veuillez saisir du contenu.');
                return;
            }

            // Si toutes les vérifications sont réussies, soumettre le formulaire
            this.submit();
        });
    });
</script>
