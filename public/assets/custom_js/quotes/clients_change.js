$(document).ready(function () {
    $('select[name="clients"]').on('change', function () {
        var clientId = $(this).val();
        var type = $('select[name="customer_type"]').val()

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            if(type === "company"){
                $('#customer_informations').removeClass("d-none")
                $('#purchassing_informations').removeClass("d-none")
            }else if (type === "particular"){
                $('#customer_informations').addClass("d-none")
                $('#purchassing_informations').removeClass("d-none")
            }else{}
                $.ajax({
                    url: '/quotes/get-client',
                    type: "GET",
                    data :{
                        id : clientId,
                    },
                    dataType: "json",
                    success: function (response) {
                        $('#company_name').val(response.company_name);
                        $('#company_number').val(response.company_number);
                        $('#company_vat_number').val(response.company_vat_number);
                        $('#company_email').val(response.company_email);
                        $('#company_phone').val(response.company_phone);
                        $('#company_site_web').val(response.company_site_web);
                        $('#company_id_client').val(response.company_id_client);
                        $('#company_whatsapp').val(response.whatsapp);
                        $('#purchassing_phone').val(response.purchassing_manager_phone);
                        $('#purchassing_email').val(response.purchassing_manager_email);
                        $('#purchassing_title').val(response.purchassing_manager_title);
                        $('#purchassing_fname').val(response.purchassing_manager_fname);
                        $('#purchassing_lname').val(response.purchassing_manager_lname);

                    },
                });



    });
});
