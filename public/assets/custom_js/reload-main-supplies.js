$(document).ready(function () {
    $('.reloadMainSupplies').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log("reload 1");
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="mainsupply_id"]').empty();
                    $('select[name="mainsupply_id"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key, value) {
                        $('select[name="mainsupply_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });

                },
            });

    });

});




