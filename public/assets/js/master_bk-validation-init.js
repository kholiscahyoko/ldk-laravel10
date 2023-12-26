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
        "material_desc": { required: !0, minlength: 5 },
        "maker": { required: !0, minlength: 2 },
        "ldk_fr_maker": { required: !0 },
    },
    messages: {
        "material_number": { required: "Please enter material name", minlength: "Your material name must consist of at least 5 characters" },
        "material_desc": { required: "Please enter material description", minlength: "Material description must consist of at least 5 characters" },
        "maker": { required: "Please enter maker name", minlength: "Maker name must consist of at least 2 characters" },
        "ldk_fr_maker": { required: "Please provide LDK doc from maker"},
    },
});

jQuery("#editForm").validate({
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
        "edit_material_number": { required: !0, minlength: 5 },
        "edit_material_desc": { required: !0, minlength: 5 },
        "edit_maker": { required: !0, minlength: 2 },
        // "edit_ldk_fr_maker": { required: !0 },
    },
    messages: {
        "edit_material_number": { required: "Please enter material name", minlength: "Your material name must consist of at least 5 characters" },
        "edit_material_desc": { required: "Please enter material description", minlength: "Material description must consist of at least 5 characters" },
        "edit_maker": { required: "Please enter maker name", minlength: "Maker name must consist of at least 2 characters" },
        // "edit_ldk_fr_maker": { required: "Please provide LDK doc from maker"},
    },
});

jQuery("#reviewForm").validate({
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
        "review_material_number": { required: !0, minlength: 5 },
        "approve_reject": { required: !0 },
        "review_comment": { required: !0, minlength: 2 },
    },
    messages: {
        "review_material_number": { required: "Please enter material name", minlength: "Your material name must consist of at least 5 characters" },
        "approve_reject": { required: "Approve / Reject is required"},
        "review_comment": { required: "Please enter comment if reject", minlength: "Review comment must consist of at least 2 characters" },
        // "edit_ldk_fr_maker": { required: "Please provide LDK doc from maker"},
    },
});
