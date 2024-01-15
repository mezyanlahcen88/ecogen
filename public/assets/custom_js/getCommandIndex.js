$(document).ready(function () {

$('.getCommand').on('click', function (e) {
    e.preventDefault();
    var commandId = $(this).data('command-id');
    console.log(commandId);
    $.ajax({
        url: "/commands/" + commandId + "/edit",
        type: 'GET',
        dataType: 'json', // Changez ceci en 'html'
        success: function (data) {
            // $('#contenuDynamique').html(data.html);
            localStorage.setItem('product_commandEdit', JSON.stringify(data));
             window.location.href = "/commands/" + commandId + "/edit";
        },
        error: function (error) {
            console.log(error);
        }
    });
});

});


