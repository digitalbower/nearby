$(document).ready(function () {
    $("#vendorForm").validate({
        rules: {
            name: { required: true, minlength: 3 },
            email: { required: true, email: true },
            phone: { required: true },
            validityfrom: { required: true },
            validityto: { required: true }
        },
        messages: {
            name: { required: "Vendor name is required", minlength: "Must be at least 3 characters" },
            email: { required: "Email is required", email: "Enter a valid email" },
            phone: { required: "Phone is required"},
            validityfrom: { required: "Validity From is required" },
            validityto: {required: "Validity To is required" }
        }
    });

    $('.toggle-status').change(function () {
        var vendorId = $(this).data('id');
        var newStatus = $(this).is(':checked') ? 1 : 0;
    
        $.ajax({
            url: "/admin/products/vendors/change-status",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token, 
            },
            data: JSON.stringify({
                id: vendorId,
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
  