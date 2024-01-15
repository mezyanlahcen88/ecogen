<script>
$(document).ready(function () {
    $('select[name="state"]').on('change', function () {
        var stateId = $(this).val();
        if (stateId) {
            $.ajax({
                url: "{{ URL::to('state') }}/" + stateId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="city"]').empty();

                    $.each(data, function (key, value) {
                        $('select[name="city"]').append('<option value="' +
                            key + '">' + value + '</option>');
                    });
                },
            });
        } else {
            console.log('AJAX load did not work');
        }
    });
});
</script>
