jQuery("#createForm").validate({
    ignore: [],
    errorClass: "invalid-feedback animated fadeInDown",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
    },
    rules: {
        "characteristic_name": { required: !0, minlength: 5 },
        "notes": { required: !0, minlength: 5 },
        "pictogram": { required: !0 },
    },
    messages: {
        "characteristic_name": { required: "Please enter characteristic name", minlength: "Characteristic name must consist of at least 5 characters" },
        "notes": { required: "Please enter characteristic notes", minlength: "Characteristic notes must consist of at least 5 characters" },
        "pictogram": { required: "Please Pictogram Image"},
    },
});

jQuery(".form-validate-edit").validate({
    ignore: [],
    errorClass: "invalid-feedback animated fadeInDown",
    errorElement: "div",
    errorPlacement: function (e, a) {
        jQuery(a).parents(".form-group > div").append(e);
    },
    highlight: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid").addClass("is-invalid");
    },
    success: function (e) {
        jQuery(e).closest(".form-group").removeClass("is-invalid"), jQuery(e).remove();
    },
    rules: {
        "edit_characteristic": { required: !0, minlength: 5 },
        "edit_notes": { required: !0, minlength: 5 },
        // "edit_pictogram": { required: !0 },
    },
    messages: {
        "edit_characteristic": { required: "Please enter characteristic name", minlength: "Characteristic name must consist of at least 5 characters" },
        "edit_notes": { required: "Please enter notes", minlength: "Notes must consist of at least 5 characters" },
        // "edit_pictogram": { required: "Please provide pictogram image"},
    },
});
