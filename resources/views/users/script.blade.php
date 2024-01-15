
<script>
    ClassicEditor
    .create( document.querySelector( '#signature1' ) )
    .catch( error => {
        console.error( error );
    } );

    ClassicEditor
        .create( document.querySelector( '#content' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
