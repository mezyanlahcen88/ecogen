function clearInputsSelects(){
    const inputs = document.querySelectorAll('input');
    const selects = document.querySelectorAll('select');

    inputs.forEach(element => {
      element.value = '';
    });
    selects.forEach(element => {
        element.value = '';
      });
    }

$(document).ready(function () {
    $('select[name="guest_type"]').on('change', function () {
            var type = $(this).val();
           if(type === "company"){
                 clearInputsSelects()
                $(this).val('company')
                $('select[name="customer_type"]').val('guest')
                $('#purchassing_title_select_div').removeClass("d-none")
                $('#purchassing_title_input_div').addClass("d-none")
                $('#customer_informations').removeClass("d-none")
                $('#purchassing_informations').removeClass("d-none")
            }else if (type === "particular"){
                clearInputsSelects()
                $(this).val('particular')
                $('select[name="customer_type"]').val('guest')
                $('#customer_informations').addClass("d-none")
                $('#purchassing_informations').removeClass("d-none")
                $('#purchassing_title_select_div').removeClass("d-none")
                $('#purchassing_title_input_div').addClass("d-none")
            }
    });
});

