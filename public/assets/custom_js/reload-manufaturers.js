$(document).ready(function () {
    $('.reloadManufacturers').on('click', function (e) {
        e.preventDefault()
        $routeName = $(this).attr('data-route-name');
        $.ajax({
            url: $routeName,
            type: "GET",
            dataType: "json",
            success: function (response) {
                const selectedValues = $('select[name="manufacturers[]"]').val() ?? [];
                $('select[name="manufacturers[]"]').empty();
                $('select[name="manufacturers[]"]').removeAttr('data-multijs');
                $.each(response, function (key, value) {
                    const isExist = selectedValues.includes(key) ? 'selected' : '';
                    $('select[name="manufacturers[]"]').append('<option value="' +
                        key + '"' + isExist +'>' + value + '</option>');
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
