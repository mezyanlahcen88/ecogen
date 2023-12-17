$(document).ready(function () {
    $('.reloadSuppliers').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        console.log($routeName);
            $.ajax({
                url: $routeName,
                type: "GET",
                dataType: "json",
                success: function (response) {
                    $('select[name="suppliers[]"]').empty();
                    $('select[name="suppliers[]"]').removeAttr('data-multijs');
                    $('select[name="suppliers"]').append('<option value=""> Choose one </option>');
                    $.each(response, function (key ,value) {
                        $('select[name="suppliers[]"]').append('<option value="' +
                        key + '">' + value + '</option>');
                    });
                    $('.multi-wrapper').remove()
                    var multiSelectOptGroup = document.getElementById("multiselect-optiongroup");
                    if (multiSelectOptGroup) {
                        multi(multiSelectOptGroup, {
                            enable_search: true
                        });
                    }

                },
            });

    });

});




