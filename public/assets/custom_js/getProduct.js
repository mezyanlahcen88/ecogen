$(document).ready(function () {
    $('.getProduct').on('click', function () {
        var product_id = $('select[name="product_id"]').val();
        console.log(product_id);
        if (product_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin + "/products/get-product",
                data :{
                  id : product_id,
                },
                type: "GET",
                dataType: "json",
                success: function (data) {
                    console.log(data);
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
