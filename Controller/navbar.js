$(document).ready(function(){

})
let menu = document.getElementById("bars-menu");
menu.addEventListener('click', function () {
    let opcionesMenu = document.getElementById('content-option');
    let opcionesUsuario = document.getElementById('user-option');
    opcionesMenu.classList.toggle('active-block');
    opcionesUsuario.classList.toggle('active-flex');

});