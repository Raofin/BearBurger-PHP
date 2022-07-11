document.addEventListener('load', fetch('Burger'));

function fetch(category) {
    const foodsTable = document.getElementById("foods-table");
    const xhr = new XMLHttpRequest();

    xhr.open("GET", "../model/foods.php?cat=" + category);
    xhr.onload = function () {
        foodsTable.innerHTML = '';
        foodsTable.innerHTML = this.responseText;
    }
    xhr.send();
}