$('#login-form').validate({
    submitHandler: form => {
        let formData = $('#login-form').serialize();

        $.ajax({
            url: '/controller/loginValidate.php',
            method: "POST",
            data: formData,
            cache: false,
            processData: false,
            success: data => {
                let jsonData = JSON.parse(data);

                if (jsonData['success'] === true)
                    $(location).prop('href', 'home.php');

                $('#prompt-message')
                    .html(jsonData['promptMessage'])
                    .addClass('error-message');
            }
        })
    },
    rules: {
        usernameOrEmail: {
            required: true,
            minlength: 4,
            maxlength: 30,
            normalizer: value => removeWhitespaces(value, '#usernameOrEmail')
        },
        password: {
            required: true,
            minlength: 6,
            maxlength: 15,
            normalizer: value => removeWhitespaces(value, '#password')
        }
    },
    messages: {
        usernameOrEmail: {
            required: "Please enter a username",
            minlength: "Your username or email must consist of at least 4 characters",
            maxlength: "Your username or email must be no more than 30 characters"
        },
        password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 6 characters long",
            maxlength: "Your password must be no more than 15 characters long"
        }
    },
    errorClass: "form-input-error warning-message"
})

$('#password-view').click(() => {
    if ($('#password-view').text() === 'Show') {
        $('#password').prop('type', 'text');
        $('#password-view').html('Hide');
    } else {
        $('#password').prop('type', 'password');
        $('#password-view').html('Show');
    }
})

function removeWhitespaces(value, id) {
    value = value.replace(/\s/g, ''); // remove whitespaces
    $(id).val(value);
    return $.trim(value);
}

jQuery.validator.addMethod('emailRegex', function (value, element) {
    return this.optional(element) || /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(value);
}, 'Please enter a valid email address.');