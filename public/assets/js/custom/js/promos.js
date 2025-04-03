$(document).ready(function () {
    $("#promoForm").validate({
        rules: {
            promocode: { required: true},
            discount: { required: true},
            validity_from : { required: true},
            validity_to : { required: true},
        },
        messages: {
            promocode: { required: "Promo code is required"},
            discount: { required: "Discount is required"},
            validity_from : { required: "Validity from is required"},
            validity_to : { required: "validity to is required"},
        }
    });

    $('.toggle-status').change(function () {
        var promoId = $(this).data('id');
        var newStatus = $(this).is(':checked') ? 1 : 0;
    
        $.ajax({
            url: "/admin/products/promos/change-status",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token, 
            },
            data: JSON.stringify({
                id: promoId,
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
  