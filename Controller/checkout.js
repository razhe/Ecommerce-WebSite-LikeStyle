$(document).ready(function () {  
    obtener_region();
});

function place_alert(){
    Swal.fire({
        icon: 'success',
        title: 'Gracias por su compra!',
        text: 'Su compra se ha realizado con éxito',
        html: ` 
                <br>
                Usted será redirigido al inicio en <b></b> segundos...`,
        timer: 5000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
          //Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = (Swal.getTimerLeft() / 1000)
            .toFixed(0)
          }, 100)
        },
      }).then((result) => {
        // Read more about handling dismissals below 
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "../views/index.php";
            
        }
      })
}


document.getElementById('btn-place-order').addEventListener('click', function () {
    //variables instanciadas
    let pais = document.getElementById("inpt-pais");
    let nombre = document.getElementById("inpt-nombre");
    let apellido = document.getElementById("inpt-apellido");
    let address1 = document.getElementById("inpt-address1");
    let address2 = document.getElementById("inpt-address2");
    let region = document.getElementById("select-region");
    let comuna = document.getElementById("select-comuna");
    let phone = document.getElementById("inpt-phone");
    let email = document.getElementById("inpt-email");
    let com = document.getElementById("inpt-com");

    let contador = 0;
    
    //validacion de campos vacíos

    if (address1.value === null || address1.value === "") {
        address1.classList.remove("valid-input");
        address1.classList.add("non-valid-input");
    }else{
        address1.classList.remove("non-valid-input");
        address1.classList.add("valid-input");
        contador++;
    }
    
    if (address2.value === null || address2.value === "") {
        address2.classList.remove("valid-input");
        address2.classList.add("non-valid-input");
    }else{
        address2.classList.remove("non-valid-input");
        address2.classList.add("valid-input");
        contador++;
    }    

    if (region.value === null || region.value === "") {
        region.classList.remove("valid-input");
        region.classList.add("non-valid-input");
    }else{
        region.classList.remove("non-valid-input");
        region.classList.add("valid-input");
        contador++;
    }  

    if (comuna.value === null || comuna.value === "") {
        comuna.classList.remove("valid-input");
        comuna.classList.add("non-valid-input");
    }else{
        comuna.classList.remove("non-valid-input");
        comuna.classList.add("valid-input");
        contador++;
    }
    if (com.value === null || com.value === "") {
        com.classList.remove("valid-input");
    }else{
        com.classList.add("valid-input");
    }  


    if (contador == 4) {
        $.ajax({
            url: "../Model/purchase/insert_sale.php",
            method: 'POST',
            success: function(data) {
                insertar_dir_client();
                place_alert();
            } 
        })
    }
});

function insertar_dir_client(){
    let address1 = document.getElementById("inpt-address1").value;
    let address2 = document.getElementById("inpt-address2").value;
    let comuna = document.getElementById("select-comuna").value;
    let com = document.getElementById("inpt-com").value;
    if(com === null || com === ""){
        let default_comment = "Sin comentario";
        $.ajax({
            url: "../Model/purchase/insert_client_dir.php",
            method: 'POST',
            data:{
                direccion1 : address1,
                direccion2 : address2,
                cod_comuna : comuna,
                comentario : default_comment,
            },
            success: function(data) {
                console.log(data);
            } 
        })
    }else{
        $.ajax({
            url: "../Model/purchase/insert_client_dir.php",
            method: 'POST',
            data:{
                direccion1 : address1,
                direccion2 : address2,
                cod_comuna : comuna,
                comentario : com,
            },
            success: function(data) {
                console.log(data);
            } 
        })
    }
    
}

function obtener_region(){
    $.ajax({
        url: "../Model/utils/get_reg.php",
        method: 'POST',
        success: function(data) {
            let html = ``;
            for (let i = 0; i < data.datos.length; i++) {
                html += `
                    <option value="${data.datos[i].cod_region}">${data.datos[i].nom_region}</option>
                `;
            }
            document.getElementById('select-region').innerHTML = html;
            
        },
        error: function(error){

        } 
    });
}

document.getElementById('select-region').addEventListener('change', (event) => {
    $.ajax({
        url: "../Model/utils/get_com.php",
        method: 'POST',
        data:{
            region_id : event.target.value
        },
        success: function(data) {
            let html = ``;
            for (let i = 0; i < data.datos.length; i++) {
                html += `
                    <option value="${data.datos[i].cod_comuna}">${data.datos[i].nom_comuna}</option>
                `;
            }
            document.getElementById('select-comuna').innerHTML = html;
            
        },
        error: function(error){

        } 
    });
});