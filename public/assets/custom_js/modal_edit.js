$(document).on('click', '.editActionModal', function () {
    let id = $(this).attr('data-id');
    let routeName = $(this).attr('data-route-name');
    let modal = $("#editModal");
    let modalBodyContent = $("#modal-body-content");
    //CALL THE AJAX API TO RETURN THE EDIT FORM
    $.ajax({
        url:routeName,
        type: "GET",
        dataType: "json",
        data: {
        id: id,
          _token: '{{ csrf_token() }}'
        },
        async: true,
        success: function (data)
        {
            modalBodyContent.empty();
            modalBodyContent.append(data.html);
            modal.modal('show');
        }
    });
})
