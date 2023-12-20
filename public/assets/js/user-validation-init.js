jQuery(".form-valide").validate({
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
        "name": { required: !0, minlength: 3 },
        "email": { required: !0, email: !0 },
        "password": { required: !0, minlength: 5 },
        "password_confirmation": { required: !0, equalTo: "#password" },
        "role": { required: !0 },
    },
    messages: {
        "name": { required: "Please enter a name", minlength: "Your name must consist of at least 3 characters" },
        "email": "Please enter a valid email address",
        "password": { required: "Please provide a password", minlength: "Your password must be at least 5 characters long" },
        "password_confirmation": { required: "Please provide a password", minlength: "Your password must be at least 5 characters long", equalTo: "Please enter the same password as above" },
        "role": "Please select a value!",
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
        "edit_name": { required: !0, minlength: 3 },
        "edit_email": { required: !0, email: !0 },
        "edit_role": { required: !0 },
    },
    messages: {
        "edit_name": { required: "Please enter a name", minlength: "Your name must consist of at least 3 characters" },
        "edit_email": "Please enter a valid email address",
        "edit_role": "Please select a value!",
    },
});
