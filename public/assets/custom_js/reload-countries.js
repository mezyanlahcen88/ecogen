$(document).ready(function () {
    $('.reloadCountries').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        $.ajax({
            url: $routeName,
            type: "GET",
            dataType: "json",
            success: function (response) {
                $('select[name="country"]').empty();
                $('select[name="city"]').empty();
                $('select[name="state"]').empty();
                $('select[name="country"]').append('<option value=""> Choose one </option>');
                $('select[name="city"]').append('<option value=""> Choose one </option>');
                $('select[name="state"]').append('<option value=""> Choose one </option>');
                $('input[name="poste_code"]').val('');
                $.each(response, function (key, value) {
                    $('select[name="country"]').append('<option value="' +
                        key + '">' + value + '</option>');
                });

            },
        });

    });

});
