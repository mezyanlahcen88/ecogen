$(document).ready(function () {
    $('.reloadConditions').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log($routeName);
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="condition"]').empty();
                    $('select[name="condition"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key ,value) {
                        $('select[name="condition"]').append('<option value="' +
                        key + '">' + value + '</option>');
                    });

                },
            });

    });

});




