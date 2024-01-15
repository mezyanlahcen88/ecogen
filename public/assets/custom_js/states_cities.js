$(document).ready(function () {
    $('select[name="state_id"]').on('change', function () {
        var stateId = $(this).val();
        console.log("id from ajax : " +stateId );
        if (stateId) {
            $.ajax({
                url: window.location.origin + "/state/"+ stateId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="city_id"]').empty();

                    $.each(data, function (key, value) {
                        $('select[name="city_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
