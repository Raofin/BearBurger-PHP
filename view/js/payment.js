let form = document.querySelector('form');
let messageDiv = document.getElementById('message')
let price = document.getElementById('price').innerText.slice(0, -2);

document.getElementById('taka').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = price + 'tk';
    },
    false);

document.getElementById('dollar').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = '$' + (price * 0.011);
    },
    false);

document.getElementById('pound').addEventListener('click',
    function (event) {
        event.preventDefault();
        document.getElementById('price').innerText = '£' + (price * 0.0089);
    },
    false);

form.addEventListener('submit', function (event) {
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
        name.value = cardNumber.value = expDate.value = cvv.value = '';
    } else {
        messageDiv.innerHTML = '';
        messageDiv.innerHTML += '<p class="error-message center-text">Please fill out all the fields properly.</p>';
    }
});