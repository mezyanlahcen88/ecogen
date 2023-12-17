$(document).ready(function () {
    $('.reloadCurrencies').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log($routeName);
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="payment_currency"]').empty();
                    $('select[name="payment_currency"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (value) {
                        $('select[name="payment_currency"]').append('<option value="' +
                        value + '">' + value + '</option>');
                    });

                },
            });

    });

});




