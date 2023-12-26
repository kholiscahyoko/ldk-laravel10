jQuery("#createLdkForm").validate({
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
        "ldk_material_number": { required: !0, minlength: 5 },
        "revision_number": { required: !0, number: !0 },
        "characteristic[]": { required: !0 },
    },
    messages: {
        "ldk_material_number": { required: "Please enter material number", minlength: "Material number must consist of at least 5 characters" },
        "revision_number": { required: "Please enter revision number", number: "Revision number only accept numbers" },
        "characteristic[]": { required: "Please choose characteristic at least 1"},
    },
});
jQuery("#editLdkForm").validate({
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
        "ldk_material_number": { required: !0, minlength: 5 },
        "revision_number": { required: !0, number: !0 },
        "characteristic[]": { required: !0 },
    },
    messages: {
        "ldk_material_number": { required: "Please enter material number", minlength: "Material number must consist of at least 5 characters" },
        "revision_number": { required: "Please enter revision number", number: "Revision number only accept numbers" },
        "characteristic[]": { required: "Please choose characteristic at least 1"},
    },
});