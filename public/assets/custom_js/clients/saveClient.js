
function validateRow() {
    var isValid = true;

    // Image validation
    var pictureInput = document.getElementById('picture');
    var pictureError = document.getElementById('error_picture');
    if (pictureInput.value === '') {
      pictureError.textContent = 'Image est obligatoire';
      isValid = false;
    } else {
      pictureError.textContent = '';
    }

    // Amount validation
    var amountInput = document.getElementById('amount');
    var amountError = document.getElementById('error_amount');
    if (amountInput.value === '') {
      amountError.textContent = 'Montant est obligatoire';
      isValid = false;
    } else {
      amountError.textContent = '';
    }

    // Type validation
    $(document).ready(function() {
        var typeInput = $('#type');
        var typeError = $('#error_type');
        var isValid = true; // Make sure to declare isValid before using it

        // Check if the value is null or an empty string
        if (typeInput.val() === null || typeInput.val() === '') {
            typeError.text('Type est obligatoire');
            isValid = false;
        } else {
            typeError.text('');
        }
    });


    // Date of expiration validation
    var doeInput = document.getElementById('doe');
    console.log(doeInput.value );
    var doeError = document.getElementById('error_doe');
        if (!doeInput.value) {
          doeError.textContent = 'La date est obligatoire';
        } else {
          doeError.textContent = '';
        }


    // Comment validation
    var commentInput = document.getElementById('comment');
    var commentError = document.getElementById('error_comment');
    if (commentInput.value === '') {
      commentError.textContent = 'Commentaire est obligatoire';
      isValid = false;
    } else {
      commentError.textContent = '';
    }

    return isValid;
  }


function getInputsAndAddToTable() {
    if (validateRow()) {
        const inputs = document.querySelectorAll('.repeater input, .repeater select');
        const inputValues = Array.from(inputs).map(input => input.value);

        // Create a table row with cells for each input value
        const row = document.createElement('tr');
        inputValues.forEach(value => {
            const cell = document.createElement('td');
            cell.textContent = value;
            cell.classList.add('text-center');
            row.appendChild(cell);
        });

        // Add a cell for the remove button
        const removeCell = document.createElement('td');
        const removeButton = document.createElement('button');
        removeButton.classList.add('btn', 'remove');
        const removeIcon = document.createElement('i');
        removeIcon.classList.add('las', 'la-times', 'text-danger', 'fs-1');
        removeButton.appendChild(removeIcon);
        removeCell.appendChild(removeButton);
        row.appendChild(removeCell);
        // Append the row to the table body
        const tableBody = document.querySelector('#scroll-horizontal tbody');
        tableBody.appendChild(row);
        inputs.forEach(input => input.value = '');
    }
}

var btnAdd = $('.add').on('click', function(e) {
    e.preventDefault();
    getInputsAndAddToTable()
})
