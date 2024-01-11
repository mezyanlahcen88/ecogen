if (document.querySelector("#picture-img-file-input")) {
    document.querySelector("#picture-img-file-input").addEventListener("change", function() {
        var preview = document.querySelector(".user-picture-image");
        var file = document.querySelector("#picture-img-file-input").files[0];
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
