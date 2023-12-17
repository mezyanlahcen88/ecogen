$(document).ready(function () {
    $('.reloadPaymentMethods').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="payment_method"]').empty();
                    $('select[name="payment_method"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key, value) {
                        $('select[name="payment_method"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });

                },
            });

    });

});




