$(document).ready(function () {
    $("#companyTermForm").validate({
        rules: {
            terms: { required: true},
        },
        messages: {
            terms: { required: "Terms is required"},
        }
    });
});