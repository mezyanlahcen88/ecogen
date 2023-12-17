$(document).ready(function () {
    // $('#shipping-price-tab').on('click', function () {
    //     var delivery_to = $('select[name="delivery_to"]').val()
    //     $.ajaxSetup({
    //         headers: {
    //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //         }
    //     });
    //     $.ajax({
    //         url: '/quotes/get-company_groupes',
    //         type: "GET",
    //         data: {
    //             'delivery_to': delivery_to,
    //         },
    //         dataType: "json",
    //         success: function (data) {
    //             $('select[name="company_groupe"]').empty();
    //             $('select[name="company_groupe"]').append('<option value="">Choose one</option>');
    //             $.each(data, function (key, value) {
    //                 $('select[name="company_groupe"]').append('<option value="' +
    //                     key + '">' + value + '</option>');
    //             });
    //         },
    //     });
    // });


    // $('select[name="company_groupe"]').on('change', function () {
    $('#shipping-price-tab').on('click', function () {
        const companyGroupeSelect = $(this)
        const deliveryFrom = $('select[name="delivery_from"]');
        const deliveryTo = $('select[name="delivery_to"]');
        const typeInput = $('input[name="type"]');
        const amountInput = $('input[name="amount"]');
        const weightInput = $('input[name="weight"]');
        const lengthInput = $('input[name="length"]');
        const widthInput = $('input[name="width"]');
        const heightInput = $('input[name="height"]');

        const data = {
            companyGroupe: companyGroupeSelect.val(),
            deliveryFrom: deliveryFrom.val(),
            deliveryTo: deliveryTo.val(),
            amount: amountInput.val(),
            weight: weightInput.val(),
            length: lengthInput.val(),
            width: widthInput.val(),
            height: heightInput.val(),
            type: typeInput.val(),
        };
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/quotes/get-transport-companies',
            type: "GET",
            data: data,
            dataType: "json",
            success: function (data) {
                $(".content_view").empty()
                $(".content_view").append(data.html)

            },
        });
    });
});
