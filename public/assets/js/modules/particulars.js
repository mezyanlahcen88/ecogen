$(document).on('click', '.view_particular', function () {
    const id =$(this).attr('data-id');
    const csrf = $("#generate_csrf").attr('content');
    changeToTableWithView(true);
    $('#loader_view').removeClass('d-none');
    $('#content_view').addClass('d-none');
    //CALL THE AJAX API TO RETURN THE EMAIL MODAL  FORM
    $.ajax({
        url:window.location.origin +"/particulars/view",
        type: "POST",
        dataType: "json",
        data: {
        'id': id,
          '_token': csrf
        },
        async: true,
        success: function (data)
        {
            $('#loader_view').addClass('d-none');
            $('#content_view').removeClass('d-none');
            $("#content_view").empty()
            $("#content_view").append(data.html)
            console.log(data.object);

        }
    });
})
