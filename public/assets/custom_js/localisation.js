const token = $('meta[name="csrf-token"]').attr('content');

//DATATABLE 
$('#show_countries').DataTable({
    pageLength : 5,
    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
    language: {
        searchPlaceholder: 'Search...',
        sSearch: '',
        lengthMenu: '_MENU_',
    }
});

// Popup Edit Countries
$(document).on('click', '.open_edit_modal', function () {
    let $idCountry = $(this).attr('data-id')
    const modal = $("#ModalEditCountry");
    $.ajax({
        url:'/ajax/location/getCountry',
        type: "POST",
        dataType: "json",
        data: {
            "_token": token,
            "country_id": $idCountry
        },
        async: true,
      success: function (data)
      {
        if(data) {
            $("#country_id").val(data.id)
            $("#country_code").val(data.numeric_code)
            $("#country_name").val(data.name)
            modal.modal('show')
        }
      }
  });
  return false;
})

// POPUP DELETE
$(document).on('click', '.open_delete_modal', function () {
    const $idCountry = $(this).attr('data-id')
    const $countryName = $(this).attr('data-country-name')
    const modal = $("#deleteCountryModal");
    $("#country_id").val($idCountry)
    $("#countryName").text($countryName);
    modal.modal('show')
  return false;
})


//RECUPERATION DES STATES
$(document).on('change', '.radio_get_states', function () {
    const $idCountry = $(this).attr('id')
    const $emptyData = "The county does not contain any state, try to add a new one";
    const $tempActions = $("#StatesHideActions").html();
    
    $.ajax({
        url:'/ajax/location/getStates',
        type: "POST",
        dataType: "json",
        data: {
            "_token": token,
            "country_id": $idCountry
        },
        async: true,
      success: function (data)
      {
        const $table = $("#show_all_states");
        if(data.length == 0) {
            $table.empty()
            $table.append("<tr><td colspan=3 class='text-center'>"+$emptyData+"</td></tr>")
        }
        if(data.length > 0) {
            $table.empty()
            data.forEach(element => {
                $table.append(`
                    <tr>
                        <td><input name="country" class="radio_get_cities" type="radio" value="${element.id}" id="${element.id}"></td>
                        <td>${element.name}</td>
                        <td>
                            ${$tempActions.replace('$dataId', element.id).replace('$dataStateName', element.name)}
                        </td>
                    </tr>
                `)
            });
            initStateDatatable()
        }
        
      }
  });
  return false;
})



function initStateDatatable() {
    $('#show_states').DataTable({
        destroy: true,
        pageLength : 5,
        lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']]
    });
    $(".dataTables_empty").remove()
}