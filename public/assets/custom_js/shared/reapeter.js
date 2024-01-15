$(".add").on("click", function(e) {
    e.preventDefault();
 var clone = $(".repeater:first").clone();
    clone.find("input").val("");
    clone.find(".d-none").removeClass("d-none");
    clone.find(".d-visible").addClass("d-none");
    $(".repeater-container").append(clone);
});

$(".repeater-container").on("click", ".remove", function() {
    $(this).closest(".repeater").remove();
});
