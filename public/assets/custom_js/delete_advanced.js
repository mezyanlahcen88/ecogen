$(document).on('click', '.remove-item-btn-upd', function (e) {
    e.preventDefault();
        let id = $(this).attr('data-id');
        let routeName = $(this).attr('data-route-name');
        $csrf = $("#generate_csrf").attr('content');
        console.log("hay hay");
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success mr-1',
            cancelButton: 'btn btn-danger mx-1'
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Es-tu sûr?',
        text: "Vous ne pourrez pas revenir en arrière !",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Oui, supprimez-le !',
        cancelButtonText: 'Non, annulez !',
        reverseButtons: true
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: routeName,
                method: 'DELETE',
                data: {
                    id: id,
                    _token: $csrf
                },
                success: function (response) {
                    if(response.success){
                        location.reload()
                        swalWithBootstrapButtons.fire(
                            'Supprimé!',
                            response.message,
                            'success'
                        )
                    }else{
                        swalWithBootstrapButtons.fire(
                            'Annulé!',
                            response.message,
                            'error'
                        )
                    }



                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Annulé',
                'Votre enregistrement imaginaire est en sécurité :)',
                'error'
            )
        }
    })
})
