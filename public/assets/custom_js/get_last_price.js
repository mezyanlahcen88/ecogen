$(document).ready(function () {
    $('select[name="product_id"]').on('change', function () {
        var product_id = $(this).val();
        console.log(product_id);
        if (product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin + "/products/get-last-price",
                data :{
                  id : product_id,
                },
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('input[name="latest_price"]').val(data.latest_price);
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
