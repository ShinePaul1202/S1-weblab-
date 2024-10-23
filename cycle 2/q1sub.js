const button = document.getElementById("colorButton");

button.addEventListener('click', function() {
    document.body.style.backgroundColor = "red";
});

button.addEventListener('dblclick', function() {
    document.body.style.backgroundColor = "green";
});

