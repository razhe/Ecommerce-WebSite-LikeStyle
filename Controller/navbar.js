$(document).ready(function(){

})
let menu = document.getElementById("bars-menu");
menu.addEventListener('click', function () {
    let opcionesMenu = document.getElementById('content-option');
    let opcionesUsuario = document.getElementById('content-user');
    opcionesMenu.classList.toggle('active-block');
    opcionesUsuario.classList.toggle('active-block');

});

let usuario_btn = document.getElementById("user-opt");
usuario_btn.addEventListener('click', (e)=> {
    let listaUsuario = document.getElementById('drop-list');
    listaUsuario.classList.toggle('active-block');
});


