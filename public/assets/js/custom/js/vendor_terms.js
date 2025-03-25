$(document).ready(function () {
    $("#vendorTermForm").validate({
        rules: {
            product_id: { required: true},
            terms: { required: true }
        },
        messages: {
            product_id: { required: "Product is required"},
            terms: { required: "Terms is required"}
        }
    });
});

$(document).ready(function() {
    $('#productSelect').on('change', function() {
        var selectedOption = $(this).find(':selected'); // Get the selected option
        var vendorId = selectedOption.data('vendor-id') || ''; // Get vendor_id or empty if not found
        
        // Set hidden input value
        $('#vendorId').val(vendorId);

        // Update and select the correct vendor in the dropdown
        $('#vendorSelect').val(vendorId);
    });
    $('#productSelect').trigger('change');
});