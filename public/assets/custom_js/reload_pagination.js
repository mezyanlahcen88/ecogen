$(document).ready(function () {
    $('select[name="paginator"]').on('change',function(){
        $paginator = $(this).val();
        $('#paginator').val($paginator );
        $formData = $('#filter').serialize()
        $('#filter').submit();
     });
});


