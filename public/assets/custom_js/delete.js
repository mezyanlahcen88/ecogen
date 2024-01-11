$(document).on('click', '.remove-item-btn', function (e) {
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
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
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
                    location.reload()
                    swalWithBootstrapButtons.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    )

                }
            });

        } else if (
            /* Read more about handling dismissals below */
            result.dismiss === Swal.DismissReason.cancel
        ) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
})
