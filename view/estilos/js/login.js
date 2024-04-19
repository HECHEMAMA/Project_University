var formulario = document.getElementById("login__formulario");
var error = document.getElementById('error__login');

formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    var datos = new FormData(formulario); // Son los datos del formulario

    fetch('../../Controllers/LoginController.php', {
        method: 'POST', // Método de envio
        body: datos, // Estos son los datos que se envian al archivo php
        // Promesas JSON
    })
        .then(res => res.json())
        // Si la promesa se cumple, se ejecuta el then
        .then(data => console.log(data))
})