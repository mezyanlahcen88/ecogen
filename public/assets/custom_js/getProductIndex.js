$(document).ready(function () {

$('.getDevis').on('click', function (e) {
    e.preventDefault();
    var devisId = $(this).data('devis-id');
    console.log(devisId);
    $.ajax({
        url: "/devis/" + devisId + "/edit",
        type: 'GET',
        dataType: 'json', // Changez ceci en 'html'
        success: function (data) {
            // $('#contenuDynamique').html(data.html);
            localStorage.setItem('product_devisEdit', JSON.stringify(data));
             window.location.href = "/devis/" + devisId + "/edit";
        },
        error: function (error) {
            console.log(error);
        }
    });
});

});


