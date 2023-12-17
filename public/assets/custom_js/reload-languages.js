$(document).ready(function () {
    $('.reloadLanguages').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log($routeName);
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="language"]').empty();
                    $('select[name="language"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key, value) {
                        $('select[name="language"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });

                },
            });

    });

});




