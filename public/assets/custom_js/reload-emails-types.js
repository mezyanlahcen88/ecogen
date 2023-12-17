$(document).ready(function () {
    $('.reloadEmailTypes').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log($routeName);
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="type"]').empty();
                    $.each(response, function (key, value) {
                        $('select[name="type"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });

                },
            });

    });

});




