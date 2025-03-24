$(document).ready(function () {
    $("#vendorTermForm").validate({
        rules: {
            vendor_id: { required: true},
            product_id: { required: true},
            terms: { required: true }
        },
        messages: {
            vendor_id: { required: "Vendor is required"},
            product_id: { required: "Product is required"},
            terms: { required: "Terms is required"}
        }
    });
});