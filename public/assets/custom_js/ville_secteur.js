$(document).ready(function () {
    $('select[name="ville_id"]').on('change', function () {
        var villeId = $(this).val();
        if (villeId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: window.location.origin +"/ville/"+ villeId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="secteur_id"]').empty();
                    $('select[name="secteur_id"]').append('<option value="">Choisir secteur</option>');
                    $.each(data, function (key, value) {
                        $('select[name="secteur_id"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
