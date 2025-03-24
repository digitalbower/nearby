$(document).ready(function () {
    $("#variantForm").validate({
        rules: {
            product_id: { required: true},
            title: { required: true },
            short_description: { required: true },
            unit_price: { required: true },
            unit_type: { required: true },
            discounted_price: { required: true },
            available_quantity: { required: true },
            validity_from: { required: true },
            validity_to: { required: true },
            timer_flag: { required: true }
        },
        messages: {
            product_id: { required: "Product is required"},
            title: { required: "Title is required"},
            short_description: { required: "Short Description is required"},
            unit_price:{ required: "Unit Price is required"},
            unit_type: { required: "Unit Type is required"},
            discounted_price: { required: "Discounted Price is required"},
            available_quantity: { required: "Available quantity is required"},
            validity_from:{ required: "Validity from is required"},
            validity_to: { required: "Validity to is required"},
            timer_flag: { required: "Timer is required"},
        }
    });
});