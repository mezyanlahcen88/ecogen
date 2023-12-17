$('#btnFixRate').click(function () {
    var rateInputs = $("input.rate");
    var rateData = [];
    for (var i = 0; i < rateInputs.length; i++) {
        var rateInput = rateInputs[i];
        var price = $(rateInput).val();
        var isChanged = $(rateInput).attr('data-is-changed');
        if (price !== 0 && isChanged === "true") {
            rateData.push({
                zone_id: $(rateInput).data("zone_id"),
                transport_company_id: $(rateInput).data("transport_company_id"),
                type: $(rateInput).data("type"),
                type_rate: $(rateInput).data("type_rate"),
                weight_to: $(rateInput).data("weight_to"),
                action: $(rateInput).data("action"),
                delivery_type_id: $(rateInput).data("delivery_type_id"),
                id: $(rateInput).data("id"),
                price: price.replace(',','.'),
                devise: $(rateInput).data("devise"),
            });
        }

    }
    console.log(rateData);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
        $.ajax({
        url: '/rates/store-fix-rates',
        type: "POST",
        data: {
            data: rateData,
        },
        async: true,
        success: function (response) {
            Toastify({
                text: response.message,
                duratiov: 3000,

            }).showToast();
        }
    });

});





// change the value based on select unlimited value
$('#SwitchCheck9').on('change', function () {
    var checked = $("#SwitchCheck9").prop("checked");
    if (checked) {
        $('#Weight_to').val('10000').attr('readonly', true)
    } else {
        $('#Weight_to').val('').attr('readonly', false)
    }
})






$('#aditionalRate').submit(function (event) {
    event.preventDefault();
    var formData = $(this).serialize();
    clearErrors();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/rates/store-aditional-rates',
        type: "POST",
        data: formData,
        success: function (response) {
            if (response.errors) {
                $.each(response.errors, function (field, error) {
                    $('#error_' + field).text((error)[0])
                });
            } else if (response.success === 200) {
                $('.aditionalTable').load(location.href + " .aditionalTable");
                $("#aditionalRate input").val("");
                $('input[name="rate"]').prop('checked', false);
                $('#SwitchCheck9').prop('checked', false);
                Swal.fire(
                    'Super!',
                    response.message,
                    'success'
                )
            } else {
                Swal.fire(
                    'Super!',
                    response.message,
                    'error'
                )
            }
        }
    });
});

function clearErrors(){
    var errorElements = document.querySelectorAll('.error');
    errorElements.forEach(function (element) {
        element.innerHTML = '';
    });
}

function changedValue(inputElement) {
    const oldPrice = inputElement.getAttribute('data-old-price');
    const newPrice = inputElement.value;

    if (newPrice !== oldPrice) {
        inputElement.setAttribute('data-is-changed', 'true');
    }
    if (oldPrice !== "0.00") {
        inputElement.setAttribute('data-action', 'update');
    }else{
        inputElement.setAttribute('data-action', 'store');
    }
  }


