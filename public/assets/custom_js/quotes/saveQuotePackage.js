$('#saveQuotePackageBtn').on('click', function (event) {
    event.preventDefault();
    clearErrors()
    const allData = [];
    const delivery_from = $('select[name="delivery_from"]').val()
    const delivery_to = $('select[name="delivery_to"]').val()
    $('.repeater').each(function () {
      const rowData = {};
      $(this).find('input').each(function () {
        rowData[$(this).attr('name')] = $(this).val();
      });
      allData.push(rowData);
    });

    $.ajaxSetup({
      headers: {
        'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content'),
      },
    });

    $.ajax({
      url: '/quotes/store-quote-package',
      type: 'POST',
      data: {
        'allData': allData,
        'delivery_from' : delivery_from,
        'delivery_to' : delivery_to,
      },
      success: function (response) {
            if (response.errors) {
                $.each(response.errors, function (field, error) {
                    $('#error_' + field).text((error)[0])
                });
            } else if (response.success) {
               $('.to-customer-infomation').attr('disabled',false)
               Toastify({
                text: response.message,
                duratiov: 3000,

            }).showToast();
              clearInputsSelects()

            } else {

            }
      },
    });
  });

function clearErrors() {
    var errorElements = document.querySelectorAll('.error');
    errorElements.forEach(function (element) {
        element.innerHTML = '';
    });
}

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
