
$(document).ready(function () {
    $('.num_point').keypress(function (e) {
        var charCode = (e.which) ? e.which : event.keyCode;
        if (String.fromCharCode(charCode).match(/[^\d.]/g))
        return false;
});
});
