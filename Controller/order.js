$(document).ready(function(){
    $(".btnEliminar").click(function (event) {
        event.preventDefault();
        let id = $(this).data('id');
        let boton = $(this);
        $.ajax({
            method:'POST',
            url:'../Model/utils/delete_c_element.php',
            data:{
                id:id
            }
        }).done(function (respuesta) {
            boton.parent('div').parent('div').remove();
        });
    });
});

var elementoSub = document.getElementsByClassName("sub__quant");
var elementoInpt = document.getElementsByClassName("quant__inpt");
var elementoAdd = document.getElementsByClassName("add__quant");
var btnCantidad = document.getElementsByClassName("btn-change-quant");

function calcularValorActual(cantidad, precio, id){  
    //Calculo de precio
    let precioActual = document.getElementsByClassName('total-' + id); 
    let calculo = parseInt(precio) * parseInt(cantidad);
    for (let i = 0; i < precioActual.length; i++) {
        precioActual[i].innerHTML = "$"+calculo;
    }   
    //actualizar carrito
    $.ajax({
        method:'POST',
        url:'../Model/purchase/update_c_counter.php',
        data:{
            id:id,
            cantidad:cantidad
        }
    }).done(function (respuesta) {
        
    });
}
for (let index = 0; index < elementoInpt.length; index++) {
    elementoInpt[index].addEventListener('keyup', (e) => calcularValorActual(elementoInpt[index].value, elementoInpt[index].dataset.precio, elementoInpt[index].dataset.id));
}

for (let index = 0; index < elementoSub.length; index++) {
    elementoSub[index].addEventListener('click', function () {            
       if (elementoInpt[index].value > 1) {
            elementoInpt[index].value--
            for (let i = 0; i < elementoInpt.length; i++) {
                calcularValorActual(elementoInpt[i].value, elementoInpt[i].dataset.precio, elementoInpt[i].dataset.id);
            }
       }
    });
}

for (let index = 0; index < elementoAdd.length; index++) {
    elementoAdd[index].addEventListener('click', function () {    
        elementoInpt[index].value++
        for (let i = 0; i < elementoInpt.length; i++) {
            calcularValorActual(elementoInpt[i].value, elementoInpt[i].dataset.precio, elementoInpt[i].dataset.id);
        } 
    });  
}
/*$(document).ready(function(){
    get_products();
})

function get_products(){
    $.ajax({
        url:'../Model/purchase/get_orders.php',
        type:'POST',
        data:{},
        success:function(data){
            console.log(data);
            let html = '';
            let total_precio = 0;
            let total_objetos= 0;
            for (let i = 0; i < data.datos.length; i++) {
                html += `
                    <div class="cart__row" id="cart-row">
                        <div class="cart__img cart-item">
                            <img class="img__cart" src="../views/img/${data.datos[i].rutima_pro}" alt="${data.datos[i].nom_pro}">
                        </div>
                        <div class="cart__name cart-item">
                            <p>${data.datos[i].nom_pro}</p>
                        </div>
                        <div class="cart__date cart-item">
                            <p>${data.datos[i].fec_ped}</p>
                        </div>
                        <div class="cart__state cart-item">
                            <p>${data.datos[i].est_ped}</p>
                        </div>
                        <div class="cart__price cart-item">
                            <p>$ ${data.datos[i].pre_pro}</p>
                        </div>
                        <div class="cart__action cart-item">
                            <i class="fas fa-minus-square"></i>
                        </div>
                    </div>`;
                data.datos[i];
                total_precio += parseInt(data.datos[i].pre_pro);
                total_objetos ++;
            }
            document.getElementById('quant-articles').innerHTML= `${total_objetos} Articulos`;
            document.getElementById('cart-counter').innerHTML= `${total_objetos}`;
            document.getElementById('price-articles').innerHTML= `$ ${total_precio}`;
            document.getElementById('total-price').innerHTML= `$ ${total_precio}`;
            document.getElementById('cart-content').innerHTML = html;
        },
        error:function(error){
            console.error(error);
        }
    });
}
document.getElementById('btn-process').addEventListener('click', function(){
    window.location.href=("proceso-pago.php");
});
*/