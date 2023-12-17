$(document).ready(function () {
    $('.reloadPaymentTerms').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="payment_term"]').empty();
                    $('select[name="payment_term"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key, value) {
                        $('select[name="payment_term"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });

                },
            });

    });

});




