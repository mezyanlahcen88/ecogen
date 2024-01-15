$(document).ready(function () {
    $('select[name="delivery_from"]').on('change', function () {
                var id = $(this).val();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: '/quotes/get-countries',
            type: "GET",
            data :{
                'id': id,
            },
            dataType: "json",
            success: function (data) {
                $('input[name="type"]').val(data.type);
                $('select[name="delivery_to"]').empty();
                $('select[name="delivery_to"]').append('<option value="">Choose one</option>');
                $.each(data.countries, function (key, value) {
                    $('select[name="delivery_to"]').append('<option value="' +
                        key + '">' + value + '</option>');
                });
            },
        });
    });
});
