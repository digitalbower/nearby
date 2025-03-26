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
        }
    });

    $('.toggle-status').change(function () {
        var variantId = $(this).data('id');
        var newStatus = $(this).is(':checked') ? 1 : 0;
    
        $.ajax({
            url: "/admin/products/product_variants/change-status",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token, 
            },
            data: JSON.stringify({
                id: variantId,
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

    function toggleTimerSection() {
        var timerFlag = $('#timer_flag').val();
        if (timerFlag == "1") {
            $('#timer').show();
        } else {
            $('#timer').hide();
        }
    }

    // Ensure the timer section is visible if "Yes" is already selected
    toggleTimerSection();

    // Run on dropdown change
    $('#timer_flag').on('change', function() {
        toggleTimerSection();
    });
});