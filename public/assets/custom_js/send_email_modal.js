const csrf = $("#generate_csrf").attr('content');

$(document).on('click', '.generic_mail_action', function () {
    const to =$(this).attr('data-emails');
    const modal = $("#generic_modal");
    const modalTitle = $("#generic_modal_title");
    const modalIcon = $("#generic_modal_title_icon");
    const modalBodyContent = $("#generic_modal_body");

    //CALL THE AJAX API TO RETURN THE EMAIL MODAL  FORM
    $.ajax({
        url:window.location.origin +"/email/get-modal-mail",
        type: "POST",
        dataType: "json",
        data: {
        'to': to,
          '_token': csrf
        },
        async: true,
        success: function (data)
        {
            modalTitle.text(data.title);
            modalIcon.addClass('ri-mail-send-fill');
            modalBodyContent.empty();
            modalBodyContent.append(data.html);
            pluginData();
            initCkeditor();
            modal.modal('show');


        }
    });
})

// ON CHANGE EMAIL MODEL SET CONTENT
$(document).on('change', '[name=email_model]', function () {
    const value =$(this).val();
    if(value) {
        $.ajax({
            url:window.location.origin +"/emails/getMailInfo",
            type: "GET",
            dataType: "json",
            data: {
            'id': value,
              '_token': csrf
            },
            async: true,
            success: function (data) {
                if(data.attachments.length > 0) {
                    setEmailModelAttachments(data.attachments)
                }

                $('[name=subject]').val(data.title)
                setContentCK(data.content)

            }
        });
    } else {
        $('[name=email_model]').val('')
        setContentCK('')
    }
})

// DELETE ATTACHMENT ON CLICK
$(document).on('click', '.attachment_delete', function () {
    const el =$(this);
    const dataFile = el.val();
    el.closest('.temp-attachments').remove();
})

function setEmailModelAttachments(attachments) {
    const model = document.querySelector(".temp-attachments");
    attachments.forEach(function (attachment, index){
        const myModel = model.cloneNode(true)
        myModel.classList.remove('d-none');
        myModel.querySelector('.attachment_title').innerText = attachment.email_file
        myModel.querySelector('.attachment_delete').setAttribute('data-file', attachment.email_file)
        $("#email_attachements .row").append(myModel);
    })


}

// display new files to upload
function displaySelectedFiles() {
    const fileInput = document.getElementById('email_files');
    if (fileInput) {
      const selectedFiles = fileInput.files;
      const myDiv = document.getElementById('email_attachements');
      const model = document.querySelector(".temp-attachments-uploaded");

      for (let i = 0; i < selectedFiles.length; i++) {
        const fileName = selectedFiles[i].name;
        const myModel = model.cloneNode(true)
          myModel.classList.remove('d-none');
          myModel.querySelector('.attachment_title').innerText = fileName
          myModel.querySelector('.attachment_delete').setAttribute('data-file', fileName)
          $("#email_attachements .row").append(myModel);

      }
    }
  }
