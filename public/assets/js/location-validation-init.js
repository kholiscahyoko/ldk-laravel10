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
        "plant": { required: !0},
        "location": { required: !0},
        "other_location": { required: function(){
            return jQuery("#location").val() === "other";
        }},
        "uom": { required: !0 },
        "qty": { required: !0, number: !0 },
        "pic_nrp": { required: !0, minlength: 5 },
        "pic_name": { required: !0, minlength: 3 },
    },
    messages: {
        "material_number": { required: "Please enter material number", minlength: "Material number must consist of at least 5 characters" },
        "plant": { required: "Please select material plant location" },
        "location": { required: "Please select material section location" },
        "other_location": { required: "Please enter material section location" },
        "uom": { required: "Please enter UOM", minlength: "UOM must consist of at least 5 characters" },
        "qty": { required: "Please enter quantity", number: "Quantity only accept numbers" },
        "pic_nrp": { required: "Please enter PIC NRP", minlength: "PIC NRP must consist of at least 5 characters" },
        "pic_name": { required: "Please enter PIC Name", minlength: "PIC Name must consist of at least 3 characters" },
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
        "material_number": { required: !0, minlength: 5 },
        "plant": { required: !0},
        "location": { required: !0},
        "other_location": { required: function(){
            return jQuery("#location").val() === "other";
        }},
        "uom": { required: !0 },
        "qty": { required: !0, number: !0 },
        "pic_nrp": { required: !0, minlength: 5 },
        "pic_name": { required: !0, minlength: 3 },
    },
    messages: {
        "material_number": { required: "Please enter material number", minlength: "Material number must consist of at least 5 characters" },
        "plant": { required: "Please select material plant location" },
        "location": { required: "Please select material section location" },
        "other_location": { required: "Please enter material location" },
        "uom": { required: "Please enter UOM", minlength: "UOM must consist of at least 5 characters" },
        "qty": { required: "Please enter quantity", number: "Quantity only accept numbers" },
        "pic_nrp": { required: "Please enter PIC NRP", minlength: "PIC NRP must consist of at least 5 characters" },
        "pic_name": { required: "Please enter PIC Name", minlength: "PIC Name must consist of at least 3 characters" },
    },
});
