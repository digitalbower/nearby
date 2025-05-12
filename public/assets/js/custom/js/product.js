$(document).ready(function () {
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
                product_type_id: { required: true },
                category_id: { required: true },
                sub_category_id: { required: true },
                nbv_terms_id:{ required: true },
                vendor_terms_id:{ required: true },
                emirates_id:{ required: true },
                productlocation_link:{ required: true },
                validity_from:{ required: true },
                validity_to:{ required: true },
                name: { required: true },
                short_description: { required: true },
                tags_id: {
                    required: true
                }, 
                importantinfo:{
                    required: function (textarea) {
                        // Get Summernote content
                        var editorContent = $('#importantinfo').summernote('isEmpty');
                        return editorContent;
                    }
                },
                productlocation_address: {
                    required: function (textarea) {
                        // Get Summernote content
                        var editorContent = $('#productlocation_address').summernote('isEmpty');
                        return editorContent;
                    }
                },
                about_description: {
                    required: function (textarea) {
                        // Get Summernote content
                        var editorContent = $('#about_description').summernote('isEmpty');
                        return editorContent;
                    }
                },
                email_about: {
                    required: function (textarea) {
                        // Get Summernote content
                        var editorContent = $('#email_about').summernote('isEmpty');
                        return editorContent;
                    }
                },
                image: {
                    required: true,
                    extension: "jpg|jpeg|png|gif|svg",
                    filesize: 2 * 1024 * 1024
                },
                'gallery[]': {
                required: true,
                extension: "jpg|jpeg|png|gif|svg",
                filesize: 2 * 1024 * 1024
                },
                meta_title:{ required: true },
                meta_description:{ required: true }
            },
            messages: {
                vendor_id: { required: "Vendor name is required" },
                product_type_id: { required: "Product type is required" },
                category_id: { required: "Category name is required" },
                sub_category_id: { required: "Sub Category name is required" },
                nbv_terms_id:{ required: "Nbv Terms is required" },
                vendor_terms_id:{ required: "Vendor Terms is required" },
                emirates_id:{ required: "Emirates is required" },
                productlocation_address:{ required: "Product Location address is required" },
                productlocation_link:{ required: "Product Location link is required" },
                validity_from:{ required: "Validity from is required" },
                validity_to:{ required: "Validity to is required" },
                name: { required: "Product name is required" },
                short_description: { required: "Short Description is required" },
                tags_id: { required: "Please select tag" },
                importantinfo: { required: "Important Info is required" },
                about_description: { required: "About Description is required" },
                email_about: { required: "Email About is required" },
                image: {
                    required: "Please upload image.",
                    extension: "Only JPG, JPEG, PNG, and GIF files are allowed.",
                    filesize: "Each image must be less than 2MB."
                },
                'gallery[]': {
                    required: "Please upload at least one image.",
                    extension: "Only JPG, JPEG, PNG, and GIF files are allowed.",
                    filesize: "Each image must be less than 2MB."
                },
                meta_title:{ required: "Meta Title is required" },
                meta_description:{ required: "Meta description is required" }
            },
            errorPlacement: function (error, element) {
                if (element.attr("name") === "about_description") {
                    $("#about_description").next('.note-editor').after(error);
                } 
                else if (element.attr("name") === "email_about") {
                    $("#email_about").next('.note-editor').after(error);
                } else if (element.attr("name") === "importantinfo") {
                    $("#importantinfo").next('.note-editor').after(error);
                }else if (element.attr("name") === "gallery[]") {
                    $("#images-error").text(error.text()).show();
                } 
                else if (element.attr("name") === "image") {
                    $("#image-error").text(error.text()).show();
                }
                else if (element.attr("name") === "vendor_terms_id") {
                    error.insertAfter( $("#vendor_terms_id"));
                }  else if (element.attr("name") === "productlocation_address") {
                    $("#productlocation_address").next('.note-editor').after(error);
                }else {
                    error.insertAfter(element);
                }
            }
    });
    

    $("#editProductForm").validate({
        ignore: [], // Allow validation on hidden input
        rules: {
            vendor_id: { required: true },
            product_type_id: { required: true },
            category_id: { required: true },
            sub_category_id: { required: true },
            nbv_terms_id:{ required: true },
            vendor_terms_id:{ required: true },
            emirates_id:{ required: true },
            productlocation_link:{ required: true },
            validity_from:{ required: true },
            validity_to:{ required: true },
            name: { required: true },
            short_description: { required: true },
            tags_id: {
                required: true
            },
            importantinfo:{
                required: function (textarea) {
                    // Get Summernote content
                    var editorContent = $('#importantinfo').summernote('isEmpty');
                    return editorContent;
                }
            },
            productlocation_address: {
                required: function (textarea) {
                    // Get Summernote content
                    var editorContent = $('#productlocation_address').summernote('isEmpty');
                    return editorContent;
                }
            },
            about_description: {
                required: function (textarea) {
                    // Get Summernote content
                    var editorContent = $('#about_description').summernote('isEmpty');
                    return editorContent;
                }
            },
            email_about: {
                required: function (textarea) {
                    // Get Summernote content
                    var editorContent = $('#email_about').summernote('isEmpty');
                    return editorContent;
                }
            },
            'gallery[]': {
                extension: "jpg|jpeg|png|gif|svg",
                filesize: 2 * 1024 * 1024
            },
            meta_title:{ required: true },
            meta_description:{ required: true }
            
        },
        messages: {
            vendor_id: { required: "Vendor name is required" },
            product_type_id: { required: "Product type is required" },
            category_id: { required: "Category name is required" },
            sub_category_id: { required: "Sub Category name is required" },
            nbv_terms_id:{ required: "Nbv Terms is required" },
            vendor_terms_id:{ required: "Vendor Terms is required" },
            emirates_id:{ required: "Emirates is required" },
            productlocation_address:{ required: "Product Location address is required" },
            productlocation_link:{ required: "Product Location link is required" },
            validity_from:{ required: "Validity from is required" },
            validity_to:{ required: "Validity to is required" },
            name: { required: "Product name is required" },
            short_description: { required: "Short Description is required" },
            tags: { required: "Please select tag" },
            importantinfo: { required: "Important Info is required" },
            about_description: { required: "About Description is required" },
            email_about: { required: "Email About is required" },
            'gallery[]': {
                extension: "Only JPG, JPEG, PNG, and GIF files are allowed.",
                filesize: "Each image must be less than 2MB."
            },
            meta_title:{ required: "Meta Title is required" },
            meta_description:{ required: "Meta description is required" }
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "about_description") {
                // Place error message below the Summernote editor
                $("#about_description").next('.note-editor').after(error);
            }
            else if (element.attr("name") === "email_about") {
                $("#email_about").next('.note-editor').after(error);
            }else if (element.attr("name") === "importantinfo") {
                $("#importantinfo").next('.note-editor').after(error);
            } else if (element.attr("name") === "gallery[]") {
                $("#images-error").show().text(error.text());
            }  else if (element.attr("name") === "productlocation_address") {
                $("#productlocation_address").next('.note-editor').after(error);
            }else if (element.attr("name") === "importantinfo") {
                $("#importantinfo").next('.note-editor').after(error);
            }else {
                error.insertAfter(element);
            }
        }
    });


    // Arrays to track selected new files and removed existing image paths
    let selectedFiles = [];
    let removedExistingImages = [];

    // ========== NEW IMAGE HANDLING ==========

    // On file selection
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


    // ========== EXISTING IMAGE HANDLING ==========
    window.removeExistingImage = function(index) {
        const wrapper = document.querySelector(`#existing-images .image-wrapper[data-index='${index}']`);
        if (wrapper) {
            const path = wrapper.getAttribute('data-path');
            removedExistingImages.push(path);
            wrapper.remove();
            document.getElementById('removed_images').value = JSON.stringify(removedExistingImages);
        }
    };
    
    $(document).on('click', '.remove-existing-image', function () {
        const index = $(this).data('index');
        window.removeExistingImage(index); // or directly put the logic here
    });
    

    // ========== FINAL FORM PREP ==========

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

    $('#image').on('change', function(event) {
        let previewContainer = $('#image-preview');
        previewContainer.html(''); // Clear existing previews
        
        if (this.files.length > 0) {
            let file = this.files[0];
            let reader = new FileReader();

            reader.onload = function(e) {
                let previewHtml = `
                    <div class="m-2 d-inline-block position-relative image-preview">
                        <button type="button" class="btn-close position-absolute top-0 start-100 translate-middle remove-image" aria-label="Close"></button>
                        <img src="${e.target.result}" class="img-thumbnail" width="100">
                    </div>
                `;
                previewContainer.html(previewHtml);
            };

            reader.readAsDataURL(file);
        }
    });

    // Handle removing the image preview
    $(document).on('click', '.remove-image', function() {
        $('#image-preview').html('');
        $('#image').val(''); // Reset file input
    });

    $('#vendor_id').on('change', function() {
        var vendor_id = $(this).val();
        var vendorterms_id = $('#vendorterms_id').val();
        $('#vendor_terms_id').html('<option value="">Loading...</option>');

        if (vendor_id) {
            $.ajax({
                url: "/admin/products/vendorterms",
                type: "GET",
                data: { vendor_id: vendor_id },
                success: function(data) {
                    $('#vendor_terms_id').html('<option value="">Select Vendor Terms</option>');
                    $.each(data, function(key, value) {
                        var isSelected = (value.id == vendorterms_id) ? "selected" : "";
                        $('#vendor_terms_id').append('<option value="' + value.id + '" ' + isSelected + '>' + value.name + '</option>');
                    });
                }
            });
        } else {
            $('#vendor_terms_id').html('<option value="">Select Vendor Terms</option>'); 
        }
    });
    $('#vendor_id').trigger('change');
});
