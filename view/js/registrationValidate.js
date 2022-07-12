$('#register-form').validate({
    submitHandler: form => {
        let formData = $('#register-form').serialize();

        $.ajax({
            url: '/controller/registrationValidate.php',
            method: "POST",
            data: formData,
            cache: false,
            processData: false,
            success: data => {
                $('#prompt-message').text(data);
                $('#register-form').trigger('reset');
            }
        })
    },
    rules: {
        username: {
            required: true,
            minlength: 4,
            maxlength: 15,
            normalizer: value => removeWhitespaces(value, '#username')
        },
        email: {
            required: true,
            // email: true,
            emailRegex: true,
            minlength: 6,
            maxlength: 30,
            normalizer: value => removeWhitespaces(value, '#email')
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 15,
            normalizer: value => removeWhitespaces(value, '#password')
        },
        cPassword: {
            required: true,
            minlength: 6,
            maxlength: 15,
            equalTo: '#password',
            normalizer: value => removeWhitespaces(value, '#cPassword')
        },
        phone: {
            required: true,
            number: true,
            minlength: 11,
            maxlength: 15,
            normalizer: value => removeWhitespaces(value, '#phone'),
        },
        gender: {
            required: true
        },
    },
    messages: {
        username: {
            required: "Please enter a username",
            minlength: "Your username must consist of at least 4 characters",
            maxlength: "Your username must be no more than 15 characters long"
        },
        email: {
            required: "Please enter email address",
            maxlength: "Your email must be no more than 30 characters long"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            maxlength: "Your password must be no more than 15 characters long"
        },
        cPassword: {
            required: "Please provide a password",
            equalTo: "Please enter the same password as above",
        },
        gender: "Please select your gender",
    },
    errorClass: 'form-input-error',
    errorPlacement(error, element) {
        // $(this.errorElement).addClass('form-input-error');
    }

    // success: function (label, element) {
    //     element.removeClass('form-input-error');
    // }
})

function removeWhitespaces(value, id) {
    value = value.replace(/\s/g, ''); // remove whitespaces
    $(id).val(value);
    return $.trim(value);
}

jQuery.validator.addMethod('emailRegex', function (value, element) {
    return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
}, 'Please enter a valid email address.');
