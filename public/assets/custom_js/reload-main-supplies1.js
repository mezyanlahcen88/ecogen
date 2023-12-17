$(document).ready(function () {
    $('.reloadMainSupplies1').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log("reload 2");
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    console.log(response);
                    $('select[name="mainsupplies[]"]').empty();
                    $('select[name="mainsupplies[]"]').removeClass('select2-hidden-accessible');
                    $('select[name="mainsupplies[]"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key, value) {
                        $('select[name="mainsupplies[]"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                    $('select[name="mainsupplies[]"]').addClass('select2-hidden-accessible');

                },
            });

    });
});




