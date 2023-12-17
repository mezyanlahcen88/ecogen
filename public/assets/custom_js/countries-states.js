$(document).ready(function () {
    $('select[name="country_id"]').on('change', function () {
        var countryId = $(this).val();
        if (countryId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin + "/country/" + countryId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="state_id"]').empty();
                    $('select[name="city_id"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="state_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });


                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
