$(document).ready(function () {
    initCountrySelect();
    initStateSelect();
})

// LOAD STATES ON SELECT COUNTRY
function initCountrySelect() {
    $('select[name="country"]').on('change', function () {
        // var selectElement = document.querySelector('.card select');

        // const block = selectElement.closest('[id]').id;
        // const block = $(this).closest('.body-addressPickup').attr('id');
        const block = $(this).closest('form').attr('id');
        // console.log(block);
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
                    $("#" + block + ' select[name="state"]').empty();
                    $("#" + block + ' select[name="city"]').empty();
                    $.each(data, function (key, value) {
                        $("#" + block + ' select[name="state"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });


                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
}

// LOAD CITIES ON SELECT STATE
function initStateSelect() {
    $('select[name="state"]').on('change', function () {
        // const block = $(this).closest('.card').attr('id');
        const block = $(this).closest('form').attr('id');
        var stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: window.location.origin + "/state/" + stateId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $("#" + block + ' select[name="city"]').empty();

                    $.each(data, function (key, value) {
                        $("#" + block + ' select[name="city"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
}
