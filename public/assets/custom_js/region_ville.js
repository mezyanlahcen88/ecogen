$(document).ready(function () {
    $('select[name="region_id"]').on('change', function () {
        var regionId = $(this).val();
        if (regionId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin +"/region/"+ regionId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="ville_id"]').empty();
                    $('select[name="secteur_id"]').empty();
                    $('select[name="ville_id"]').append('<option value="">Choisir ville</option>');
                    $.each(data, function (key, value) {
                        $('select[name="ville_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
