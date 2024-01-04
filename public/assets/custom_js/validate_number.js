// Allow  digits and plus

$(document).ready(function () {
    $('.phone').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode
        if (String.fromCharCode(charCode).match(/[^\+(0-9)]/g))
            return false;
    });
});

// Allow only digits
$(document).ready(function () {
    $('.onlyNumber').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode;
        // Allow only digits
        if (!String.fromCharCode(charCode).match(/[0-9]/))
            return false;
    });
});

// Allow  digits and point

$(document).ready(function () {
    $('.num_point').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode;
        if (String.fromCharCode(charCode).match(/[^\d.]/g))
        return false;
});
});
