$(document).ready(function () {

    function getInputValues(row) {
        var inputs = row.find('input[type="number"]');
        var values = {};

        inputs.each(function() {
          var name = $(this).attr('name');
          var value = $(this).val();
          values[name] = value;
        });

        return values;
      }

 $('#shipping-price-tab').on('click',function(e){
    e.preventDefault();
    const deliveryFrom = $('select[name="delivery_from"]');
    const deliveryTo = $('select[name="delivery_to"]');
    const typeInput = $('input[name="type"]');
    const allRows = $('.repeater');
    let values = [];

      allRows.each(function() {
        const row = $(this);
        values.push(getInputValues(row))  ;
    });
    const allData = {
        deliveryFrom: deliveryFrom.val(),
        deliveryTo: deliveryTo.val(),
        type: typeInput.val(),
        values: values
    };
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: '/quotes/get-transport-companies',
        type: "GET",
        data: allData,
        dataType: "json",
        success: function (data) {
            $(".content_view").empty()
            $(".content_view").append(data.html)
    console.log(data);

        },
    });
 })


});
