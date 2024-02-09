var table = $('#datatable').DataTable({
    serverSide: true,
    ajax: '/get-products-json',
    'columns': [{
            data: 'DT_RowIndex',
            name: 'DT_RowIndex',
            orderable: false,
            searchable: false
        },
        {
            data: 'devis_code'
        },
        {
            data: 'HT'
        },
        {
            data: 'TVA'
        },
        {
            data: 'TTTC'
        },
        {
            data: 'status',
            searchable: true,
            visible: false
        },
        {
            data: 'status_date'
        },
        {
            data: 'devis.client.name_fr'
        },
        {
            data: 'active',
            searchable: true,
            visible: false
        },

        {
            data: 'actions'
        },

    ],
    pagingType: 'full_numbers',
    initComplete: function() {
        $('#active').change(function() {
            console.log('Active select filter changed');

            table.column(7).search($(this).val()).draw();
        });
        $('#status').change(function() {
            console.log('Status select filter changed');
            table.column(5).search($(this).val()).draw();
        });
        $('#client').change(function() {
            console.log('client select filter changed');
            table.column(5).search($(this).val()).draw();
        });
    }


});

function reload_table() {
    console.log('btn clicked');
    $('#datatable').DataTable().ajax.reload();
}
