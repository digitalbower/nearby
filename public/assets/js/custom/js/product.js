$(document).ready(function () {
    let tags = [];

    // Load existing tags from hidden input
    let existingTags = $("#tags-hidden").val();

    if (existingTags) {
        try {
            tags = JSON.parse(existingTags);
            if (Array.isArray(tags)) {
                tags.forEach(tag => addTagToContainer(tag)); // Add once
            } else {
                tags = [];
            }
        } catch (e) {
            console.error("Invalid JSON format for tags:", e);
            tags = [];
        }
    }

    $("#add-tag").click(function () {
        let tag = $("#tag-input").val().trim();
        if (tag && !tags.includes(tag)) {
            tags.push(tag);
            addTagToContainer(tag);
            updateHiddenInput();
            $("#tag-input").val(""); // Clear input
            $("#tags-error").hide(); // Hide error
        }
    });

    $(document).on("click", ".remove-tag", function () {
        let tagToRemove = $(this).data("tag");
        tags = tags.filter(t => t !== tagToRemove);
        $(this).parent().remove();
        updateHiddenInput();

        if (tags.length === 0) {
            $("#tags-error").show(); // Show error if no tags are left
        }
    });

    function addTagToContainer(tag) {
        // Prevent adding duplicate tags visually
        if ($("#tags-container").find(`[data-tag="${tag}"]`).length === 0) {
            $("#tags-container").append(`
                <span class="badge bg-primary me-2 tag-item">
                    ${tag} <button type="button" class="btn-close ms-1 remove-tag" data-tag="${tag}"></button>
                </span>
            `);
        }
    }

    function updateHiddenInput() {
        $("#tags-hidden").val(JSON.stringify(tags));
    }
    $.validator.addMethod("filesize", function (value, element, param) {
        let files = element.files;
        for (let i = 0; i < files.length; i++) {
            if (files[i].size > param) {
                return false;
            }
        }
        return true;
    });
    $.validator.addMethod("extension", function (value, element, param) {
        if (!param) return false; // Prevent undefined error
        param = typeof param === "string" ? param.replace(/\s/g, "").split("|") : param;
        let ext = value.split(".").pop().toLowerCase();
        return this.optional(element) || param.includes(ext);
    }, "Invalid file type.");
    // Form validation
    $("#productForm").validate({
            ignore: [], // Allow validation on hidden input
            rules: {
                vendor_id: { required: true },
                category_id: { required: true },
                sub_category_id: { required: true },
                name: { required: true },
                short_description: { required: true },
                tags: {
                    required: true
                }, 
                about_description: {
                    required: function (textarea) {
                        // Get Summernote content
                        var editorContent = $('#about_description').summernote('isEmpty');
                        return editorContent;
                    }
                },
            'gallery[]': {
                required: true,
                extension: "jpg|jpeg|png|gif|svg",
                filesize: 2 * 1024 * 1024
                }
                
            },
            messages: {
                vendor_id: { required: "Vendor name is required" },
                category_id: { required: "Category name is required" },
                sub_category_id: { required: "Sub Category name is required" },
                name: { required: "Product name is required" },
                short_description: { required: "Short Description is required" },
                tags: { required: "Please add at least one tag" },
                about_description: { required: "About Description is required" },
                'gallery[]': {
                    required: "Please upload at least one image.",
                    extension: "Only JPG, JPEG, PNG, and GIF files are allowed.",
                    filesize: "Each image must be less than 2MB."
                }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === "tags") {
                    $("#tags-error").show();
                } else if (element.attr("name") === "about_description") {
                    $("#about_description").next('.note-editor').after(error);
                } else if (element.attr("name") === "gallery[]") {
                    $("#images-error").text(error.text()).show();
                } else {
                    error.insertAfter(element);
                }
            }
    });
    

    $("#editProductForm").validate({
        ignore: [], // Allow validation on hidden input
        rules: {
            vendor_id: { required: true },
            category_id: { required: true },
            sub_category_id: { required: true },
            name: { required: true },
            short_description: { required: true },
            tags: {
                required: true
            },
            about_description: {
                required: function (textarea) {
                    // Get Summernote content
                    var editorContent = $('#about_description').summernote('isEmpty');
                    return editorContent;
                }
            },
            'gallery[]': {
                extension: "jpg|jpeg|png|gif|svg",
                filesize: 2 * 1024 * 1024
            }
            
        },
        messages: {
            vendor_id: { required: "Vendor name is required" },
            category_id: { required: "Category name is required" },
            sub_category_id: { required: "Sub Category name is required" },
            name: { required: "Product name is required" },
            short_description: { required: "Short Description is required" },
            tags: { required: "Please add at least one tag" },
            about_description: { required: "About Description is required" },
            'gallery[]': {
                extension: "Only JPG, JPEG, PNG, and GIF files are allowed.",
                filesize: "Each image must be less than 2MB."
            }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "tags") {
                $("#tags-error").show();
            } else if (element.attr("name") === "about_description") {
                // Place error message below the Summernote editor
                $("#about_description").next('.note-editor').after(error);
            } else if (element.attr("name") === "gallery[]") {
                $("#images-error").show().text(error.text());
            } else {
                error.insertAfter(element);
            }
        }
    });

    let selectedFiles = []; // Store all selected files

    $("#gallery").on("change", function (event) {
        let files = Array.from(event.target.files); // Convert FileList to array
        console.log("New files:", files);
        
        // Append new files to the global array
        selectedFiles = [...selectedFiles, ...files];

        console.log("All selected files:", selectedFiles);

        $("#images-preview").empty(); // Clear preview to avoid duplicates

        // Display all selected files
        selectedFiles.forEach(function (file, index) {  // Use function() to access index properly
            let reader = new FileReader();
            reader.onload = function (e) {
                $("#images-preview").append(
                    `<div class="m-2 d-inline-block position-relative image-preview" data-index="${index}">
                        <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle remove-image" data-index="${index}" aria-label="Close"></button>
                        <img src="${e.target.result}" class="img-thumbnail" width="100">
                    </div>`
                );
            };
            reader.readAsDataURL(file);
        });
    });

    // **Remove selected image**
    $(document).on("click", ".remove-image", function () {
        let index = $(this).data("index");
        selectedFiles.splice(index, 1); // Remove from array
        $(this).parent().remove(); // Remove from preview

        console.log("Updated selected files:", selectedFiles);
    });

    // **Attach all selected files before submitting**
    $("form").on("submit", function (e) {
        let fileInput = document.getElementById("gallery");
        let dataTransfer = new DataTransfer(); // Create a new file list

        selectedFiles.forEach(function (file) {
            dataTransfer.items.add(file); // Add remaining images
        });

        fileInput.files = dataTransfer.files; // Attach filtered images to input

        console.log("Final file count before submission:", fileInput.files.length);
    });

    $('.toggle-status').change(function () {
        var productId = $(this).data('id');
        var newStatus = $(this).is(':checked') ? 1 : 0;
    
        $.ajax({
            url: "/admin/products/change-status",
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": csrf_token, 
            },
            data: JSON.stringify({
                id: productId,
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
    $('#category_id').on('change', function() {
        var categoryId = $(this).val();
        var sub_category_id = $('#sub_category_id').val();
        $('#subcategory_id').html('<option value="">Loading...</option>');

        if (categoryId) {
            $.ajax({
                url: "/admin/products/subcategories",
                type: "GET",
                data: { category_id: categoryId },
                success: function(data) {
                    $('#subcategory_id').html('<option value="">Select Sub Category</option>');
                    $.each(data, function(key, value) {
                        var isSelected = (value.id == sub_category_id) ? "selected" : "";
                        $('#subcategory_id').append('<option value="' + value.id + '" ' + isSelected + '>' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#subcategory_id').html('<option value="">Select Sub Category</option>'); // Reset dropdown if no category selected
        }
    });
    $('#category_id').trigger('change');
});
