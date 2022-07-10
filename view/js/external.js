let form = document.querySelector('form');

$(document).ready(function () {
    $('#login-form').submit(function (event) {
        event.preventDefault();
        var usernameOrEmail = $('#input-usernameOrEmail').val();
        var password = $('#input-password').val();
        var submit = $('#form-submit').val();
        $('.error-message').load('../controller/validation/login-validate.php', {
            usernameOrEmail: usernameOrEmail,
            password: password,
            submit: submit,
        });
    });
});

$(document).ready(function () {
    $('#register-form').submit(function (event) {
        event.preventDefault();
        var username = $('#input-username').val();
        var email = $('#input-email').val();
        var password = $('#input-password').val();
        var cPassword = $('#input-cPassword').val();
        var phone = $('#input-phone').val();
        var gender = $("input[name='gender']:checked").val();
        var submit = $('#form-submit').val();
        $('.error-message').load('../controller/validation/register-validate.php', {
            username: username,
            email: email,
            password: password,
            cPassword: cPassword,
            phone: phone,
            gender: gender,
            submit: submit,
        });
    });
});

$(document).ready(function () {
    $('#review-form').submit(function (event) {
        event.preventDefault();
        var review = $('#review').val();
        var submit = $('#form-submit').val();
        $('.error-message').load('../controller/validation/register-validate.php', {
            username: username,
            email: email,
            password: password,
            cPassword: cPassword,
            phone: phone,
            gender: gender,
            submit: submit,
        });
    });
});

let messageDiv = document.getElementById('message')

let test = function (event) {
    event.preventDefault();

    let name = document.getElementById('name');
    let cardNumber = document.getElementById('cardNumber');
    let expDate = document.getElementById('expDate');
    let cvv = document.getElementById('cvv');

    if (name.value == '') name.classList.add('form-input-error');
    else name.classList.remove('form-input-error');

    if (cardNumber.value == '') cardNumber.classList.add('form-input-error');
    else cardNumber.classList.remove('form-input-error');

    if (expDate.value == '') expDate.classList.add('form-input-error');
    else expDate.classList.remove('form-input-error');

    if (cvv.value == '') cvv.classList.add('form-input-error');
    else cvv.classList.remove('form-input-error');

    if (name.value != '' && cardNumber.value != '' && expDate.value != '' && cvv.value != '') {
        messageDiv.innerHTML = '';
        messageDiv.innerHTML += '<p class="success-message center-text center-text">Payment Successful.</p>';
        name.value = '';
        cardNumber.value = '';
        expDate.value = '';
        cvv.value = '';
    } else {
        messageDiv.innerHTML = '';
        messageDiv.innerHTML += '<p class="error-message center-text">Please fill out all the fields properly.</p>';
    }
};

let currency = 69;

document.getElementById('taka').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = currency + 'tk';
    },
    false);

document.getElementById('dollar').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = '$' + (currency * 0.011);
    },
    false);

document.getElementById('pound').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = '£' + (currency * 0.0089);
    },
    false);



form.addEventListener('submit', test);