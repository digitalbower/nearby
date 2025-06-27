$(document).ready(function () {
    $("#variantForm").validate({
        ignore: [],
        rules: {
            product_id: { required: true },
            title: { required: true },
            short_description: { required: true },
            product_variant_icon: { required: true },
            short_legend_icon: { required: true },
            short_legend: { required: true },
            short_info: {
                required: function () {
                  return quill.getText().trim().length === 0; 
                }
            },
            unit_price: { required: true },
            unit_type_id: { required: true },
            discounted_price: { required: true },
            available_quantity: { required: true },
            validity_from: { required: true },
            validity_to: { required: true },
            holiday_length: { required: true },
            bookable_start_date : { required: true },
            bookable_end_date : { required: true },
            blackout_dates : { required: true },


        },
        messages: {
            product_id: { required: "Product is required" },
            title: { required: "Title is required" },
            short_description: { required: "Short Description is required" },
            product_variant_icon: { required: "Product Variant Icon is required" },
            short_legend_icon: { required: "Short legend icon is required" },
            short_legend: { required: "Short Legend is required" },
            short_info: { required: "Short Info is required" },
            unit_price: { required: "Unit Price is required" },
            unit_type_id: { required: "Unit Type is required" },
            discounted_price: { required: "Discounted Price is required" },
            available_quantity: { required: "Available quantity is required" },
            validity_from: { required: "Validity from is required" },
            holiday_length: { required: "Holiday length is required" },
            bookable_start_date : { required: "Bookable start date is required" },
            bookable_end_date : { required: "Bookable end date is required" },
            validity_to: { required: "Validity to is required" },
            blackout_dates : { required: "Blackout dates is required" },
        },
        errorPlacement: function (error, element) {
            if (element.attr("id") === "short_info") {
                error.insertAfter("#editor"); 
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            $('#short_info').val(quill.root.innerHTML);
            form.submit();
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

    $('#product_id').on('change', function() { 
        var unitTypeId = $('#unit_type').val();
        var selectedOption = $('#product_id option:selected');
        var categoryId = selectedOption.data('category');
        var productType = selectedOption.data('type');
    
        if (productType === 'Fixed Date') {
            $('#fixed_date_container').show();
        } else {
            $('#fixed_date_container').hide();
            $('#fixed_date_option').val(''); 
        }


        $('#unit_type_id').html('<option value="">Loading...</option>');
        if (categoryId) {
            $.ajax({
                url: "/admin/products/unit-types",
                type: "GET",
                data: { category_id: categoryId },
                success: function(data) {
                    $('#unit_type_id').html('<option value="">Select Unit Type</option>');
                    $.each(data, function(key, value) {
                        var isSelected = (value.id == unitTypeId) ? "selected" : "";
                        $('#unit_type_id').append('<option value="' + value.id + '" ' + isSelected + '>' + value.unit_type + '</option>');
                    });
                }
            });
        } else {
            $('#unit_type_id').html('<option value="">Select Unit Type</option>');
        }
    });
    $('#product_id').trigger('change');
});