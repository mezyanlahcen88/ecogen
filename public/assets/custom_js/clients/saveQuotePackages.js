$(document).ready(function() {
    $('#quotePackagedForm').submit(function(event) {
        event.preventDefault();

        // Serialize the form data
        var formData = $(this).serialize();

        // Send the Ajax request
        $.ajax({
            type: 'POST',
            url: '/form/save',
            data: formData,
            success: function(response) {
                if (response.success) {
                    // Form data saved successfully
                    alert('Form data saved successfully');
                } else {
                    // Form data saving failed
                    alert('Form data saving failed');
                }
            }
        });
    });
});


// public function saveForm(Request $request)
//     {
//         // Validate the form data
//         $request->validate([
//             'amount' => 'required|numeric',
//             'weight' => 'required|numeric',
//             'delivery_from' => 'required',
//             'delivery_to' => 'required',
//             'length' => 'required|numeric',
//             'width' => 'required|numeric',
//             'height' => 'required|numeric',
//         ]);

//         // Save the form data to the database
//         $delivery = new Delivery();
//         $delivery->amount = $request->input('amount');
//         $delivery->weight = $request->input('weight');
//         $delivery->delivery_from = $request->input('delivery_from');
//         $delivery->delivery_to = $request->input('delivery_to');
//         $delivery->length = $request->input('length');
//         $delivery->width = $request->input('width');
//         $delivery->height = $request->input('height');
//         $delivery->save();

//         // Return a success response
//         return response()->json([
//             'success' => true,
//             'message' => 'Form data saved successfully',
//         ]);
//     }
// }
