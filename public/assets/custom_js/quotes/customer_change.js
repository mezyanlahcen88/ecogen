$(document).ready(function () {
    $('select[name="customer_type"]').on('change', function () {
        var type = $(this).val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if (type === "company"){
                $('#client_div').removeClass('d-none');
                $('#guest_type_div').addClass('d-none');
                $('#customer_informations').addClass("d-none");
                $('#purchassing_informations').addClass("d-none");
                $.ajax({
                    url: '/companies/get-companies',
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="clients"]').empty();
                        $('select[name="clients"]').append('<option value="">Choose one</option>');
                        $.each(data, function (key, value) {
                            $('select[name="clients"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            }
            if (type === "particular"){
                $('#client_div').removeClass('d-none');
                $('#guest_type_div').addClass('d-none');
                $('#customer_informations').addClass("d-none")
                $('#purchassing_informations').addClass("d-none")
                $.ajax({
                    url: '/particulars/get-particulars',
                    type: "GET",
                    dataType: "json",
                    success: function (data) {
                        $('select[name="clients"]').empty();
                        $('select[name="clients"]').append('<option value="">Choose one</option>');
                        $.each(data, function (key, value) {
                            $('select[name="clients"]').append('<option value="' +
                                key + '">' + value + '</option>');
                        });
                    },
                });
            }
            if (type === "guest"){
                $('#client_div').toggleClass('d-none');
                $('#guest_type_div').toggleClass('d-none');
                $('#customer_informations').addClass("d-none");
                $('#purchassing_informations').addClass("d-none");
            }
    });
});
