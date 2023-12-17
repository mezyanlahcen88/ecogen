//EDIT SHIPPING ADDRESS
$(document).on('click', '.editShippingBtn', function (ev) {
    ev.preventDefault();
    $id = $(this).attr('data-id');
    $csrf = $("#generate_csrf").attr('content');
    $('.title-shipping').text("Edit Shipping Address");
    $('.body-shipping').empty();
    $("#accor_borderedExamplecollapse1").addClass("show");
    $("#accor_borderedExamplecollapse2").removeClass("show");
    $.ajax({
        url: window.location.origin + "/shippingadresses/" + $id + "/edit",
        type: "GET",
        data: {
            _token: $csrf,
            id: $id
        },
        async: true,
        success: function (response) {

            $('.body-shipping').html(response.html);
            $('.js-example-basic-single').select2();
            initCountrySelect();
            initStateSelect();

            $('#updateShippingBtnAction')[0].addEventListener('click', function (e) {
                const block = $(this).closest('.card').attr('id');

                const formData = $('#updateShippingAddresseForm').serialize();
                onUpdateShippingAddress(e, formData);
            })


        }
    });
});


// Add  Address
$('#updateAdresseBtnAction').click(function (e) {
    e.preventDefault();
    $('code').empty();

    var formData = $('#addPickupAddresseForm').serialize();
    $.ajax({
        url: window.location.origin + "/shippingadresses",
        type: "POST",
        data: formData,
        success: function (response) {
            console.log(response);
            if (!response.status) {
                $.each(response.errors, function (field, messages) {
                    $('.' + field + '_error').text(messages);
                });
            } else {
                $('.shipping_address_container').load(location.href +
                    ' .shipping_address_container');
                $('#addShippingAddresseForm').trigger('reset');
                $("#accor_borderedExamplecollapse1").removeClass("show");
                $("#accor_borderedExamplecollapse2").addClass("show");
                Swal.fire(
                    'Super!',
                    'this adresse is the default now',
                    'success'
                )
            }
        },

    });
});


// Update Shipping Address

function onUpdateShippingAddress(e, formData) {
    e.preventDefault();
    console.log("update btn cliqued");

    const block = $(this).closest('.card').attr('id');
    $('code').empty();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: window.location.origin + "/shippingadresses/" + $id,
        type: "POST",
        data: formData,
        success: function (response) {
            console.log(response);
            if (!response.status) {
                $.each(response.errors, function (field, messages) {
                    $('.' + field + '_error').text(messages);
                });
            } else {
                $('.shipping_address_container').load(location.href + ' .shipping_address_container');
                $('#updateShippingAddresseForm').trigger('reset');
                $("#accor_borderedExamplecollapse1").removeClass("show");
                $("#accor_borderedExamplecollapse2").addClass("show");
                Swal.fire(
                    'Super!',
                    'this adresse is updated now',
                    'success'
                )
            }
        },

    });
}

// make shipping defeult address
// $(document).on('click', '.defaultBtn', function (e) {
//     e.preventDefault();
//     $spId = $(this).attr('data-id');
//     $clientId = $(this).attr('data-client-id');
//     $csrf = $("#generate_csrf").attr('content');
//     $.ajax({
//         url: window.location.origin + "/shippingadresses/default",
//         type: "POST",
//         data: {
//             spId: $spId,
//             clientId: $clientId,
//             _token: $csrf
//         },
//         async: true,
//         success: function (response) {
//             if (response.code == 200) {
//                 $('.shipping_address_container').load(location.href + ' .shipping_address_container');
//                 Swal.fire(
//                     'Super!',
//                     'this adresse is the default now',
//                     'success'
//                 )
//             }
//         }
//     });
// });
$(document).on('click', '.defaultBtn', function(e) {
    e.preventDefault();
    $spId = $(this).attr('data-id');
    $clientId = $(this).attr('data-client-id');
    $csrf = $("#generate_csrf").attr('content');
    $.ajax({
        url: window.location.origin + "/pickupdeliveryadresses/default",
        type: "POST",
        data: {
            spId: $spId,
            clientId: $clientId,
            _token: $csrf
        },
        async: true,
        success: function(response) {
            if (response.code == 200) {
                $('.address_container').load(location.href + ' .address_container');
                Swal.fire(
                    'Super!',
                    response.default_message,
                    'success'
                )
            }
        }
    });
});

// delete shippig adresse
$(document).on('click', '.deleteShippingBtn', function (ev) {
    ev.preventDefault();
    console.log('deleteShippingBtn clicked');
    $routeName = $(this).attr('data-route-name');
    $csrf = $("#generate_csrf").attr('content');
    $.ajax({
        url: $routeName,
        type: "DELETE",
        data: {
            _token: $csrf
        },
        async: true,
        success: function (response) {
            if (response.code == 200) {
                $('.address_container').load(location.href + ' .address_container');
                Swal.fire(
                    'Super!',
                    'shipping adresse à été suppriméé avec succée',
                    'success'
                )
            }
        }
    });
});
