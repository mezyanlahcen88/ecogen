// LOGO Foreground Img
if (document.querySelector("#logo-img-file-input")) {
    document.querySelector("#logo-img-file-input").addEventListener("change", function() {
        var preview = document.querySelector(".user-logo-image");
        var file = document.querySelector("#logo-img-file-input").files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function() {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
            $("#btnChangeImage").show()
        }
    });
}

// favorites_icon Foreground Img
if (document.querySelector("#favorites_icon-img-file-input")) {
    document.querySelector("#favorites_icon-img-file-input").addEventListener("change", function() {
        var preview = document.querySelector(".user-favorites_icon-image");
        var file = document.querySelector("#favorites_icon-img-file-input").files[0];
        var reader = new FileReader();
        reader.addEventListener(
            "load",
            function() {
                preview.src = reader.result;
            },
            false
        );
        if (file) {
            reader.readAsDataURL(file);
            $("#btnChangeImage").show()
        }
    });
}
