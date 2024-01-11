$(document).ready(function () {
    $('select[name="category_id"]').on('change', function () {
        var category_id = $(this).val();
        console.log(category_id);
        if (category_id) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin + "/categories/" + category_id +"/sub-categories",
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="scategory_id"]').empty();
                    $('select[name="scategory_id"]').append('<option value="">Choisir </option>');
                    $.each(data, function (key, value) {
                        $('select[name="scategory_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });


                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
