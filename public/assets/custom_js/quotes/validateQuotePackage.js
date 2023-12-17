$(document).ready(function() {
    // Initialize the form validation.
    $('#packages_form').validate({
      rules: {
        amount: {
          required: true,
          number: true,
        },
        weight: {
          required: true,
          number: true,
        },
        delivery_from: {
          required: true,
        },
        delivery_to: {
          required: true,
        },
        length: {
          required: true,
          number: true,
        },
        width: {
          required: true,
          number: true,
        },
        height: {
          required: true,
          number: true,
        },
      },
      messages: {
        amount: {
          required: 'Amount is required.',
          number: 'Amount must be a number.',
        },
        weight: {
          required: 'Weight is required.',
          number: 'Weight must be a number.',
        },
        delivery_from: {
          required: 'Delivery from is required.',
        },
        delivery_to: {
          required: 'Delivery to is required.',
        },
        length: {
          required: 'Length is required.',
          number: 'Length must be a number.',
        },
        width: {
          required: 'Width is required.',
          number: 'Width must be a number.',
        },
        height: {
          required: 'Height is required.',
          number: 'Height must be a number.',
        },
      },
      submitHandler: function(form) {
        // Form is valid. Submit the form.
        form.submit();
      }
    });
  });
