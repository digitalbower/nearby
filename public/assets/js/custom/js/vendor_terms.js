$(document).ready(function () {
    $("#vendorTermForm").validate({
        rules: {
            vendor_id: { required: true},
            name: { required: true},
            terms: { required: true }
        },
        messages: {
            vendor_id: { required: "Vendor is required"},
            name: { required: "Vendor Term Name is required"},
            terms: { required: "Terms is required"}
        }
    });
    $('.toggle-status').change(function () {
        var vendorTermsId = $(this).data('id');
        var newStatus = $(this).is(':checked') ? 1 : 0;
    
        $.ajax({
            url: "/admin/products/vendor_terms/change-status",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token, 
            },
            data: JSON.stringify({
                id: vendorTermsId,
                status: newStatus
            }),
            success: function (response) {
                // Display the success message in a specific div
                $('#status-message').html(`
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        ${response.message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
            },
            error: function (xhr) {
                let errorMessage = "Something went wrong! Please try again.";
                $('#status-message').html(`
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${errorMessage}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `);
            }
        });
    });
});