<script>
    $(document).ready(function () {
    $('select[name="country"]').on('change', function () {
        var countryId = $(this).val();
        if (countryId) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ url('country') }}/" + countryId,
                type: "GET",
                dataType: "json",
                success: function (data) {
                    $('select[name="state"]').empty();
                    $.each(data, function (key, value) {
                        $('select[name="state"]').append('<option value="' +
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
