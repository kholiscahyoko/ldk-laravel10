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
        "material_number": { required: !0, minlength: 5 },
        "ldk_number": { required: !0, minlength: 5 },
        "revision_number": { required: !0, number: !0 },
        "composition": { required: !0, minlength: 3 },
        "hazard_identification": { required: !0, minlength: 5 },
        "melting_point": { required: !0, minlength: 2 },
        "colour": { required: !0, minlength: 2 },
        "odour": { required: !0, minlength: 2 },
        "ph": { required: !0, minlength: 2 },
        "physical_state": { required: !0, minlength: 2 },
    },
    messages: {
        "material_number": { required: "Please enter material number", minlength: "Material number must consist of at least 5 characters" },
        "ldk_number": { required: "Please enter LDK number", minlength: "LDK number must consist of at least 5 characters" },
        "revision_number": { required: "Please enter revision number", number: "Revision number only accept numbers" },
        "composition": { required: "Please enter composition", minlength: "Composition must consist of at least 3 characters" },
        "hazard_identification": { required: "Please enter hazard identification", minlength: "Hazard identification must consist of at least 5 characters" },
        "melting_point": { required: "Please enter melting point", minlength: "melting point must consist of at least 2 characters" },
        "colour": { required: "Please enter colour", minlength: "colour must consist of at least 2 characters" },
        "odour": { required: "Please enter odour", minlength: "odour must consist of at least 2 characters" },
        "ph": { required: "Please enter pH", minlength: "pH must consist of at least 2 characters" },
        "physical_state": { required: "Please enter physical state", minlength: "physical state must consist of at least 2 characters" },
    },
});