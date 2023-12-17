$('#companyPaneBtn').on('click', function (e) {
    e.preventDefault();
    // var client_id = $('select[name="clients"]').val();
    var client_type = $('select[name="customer_type"]').val()
    var guest_type = $('select[name="guest_type"]').val()
    if (client_id !== '' && client_type !== '') {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/quotes',
            type: "POST",
            data: {
                'client_id': client_id,
                'client_type': client_type,
            },
            dataType: "json",
            success: function (response) {
                Toastify({
                    text: response.message,
                    duratiov: 3000,

                }).showToast();

            },
        });

    }
    if (client_type === 'guest' && guest_type === 'company'){
        alert("Please select a company");
    }
    if (client_type === 'guest' && guest_type === 'particular'){
        alert("Please select a particular");
    }

})
