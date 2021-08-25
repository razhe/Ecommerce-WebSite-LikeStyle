$(document).ready(function(){
    get_products();
   //get_count_cart();
})

function get_products(){
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
        success:function(data){
            console.log(data);
            let html = '';
            for (let i = 0; i < data.datos.length; i++) {
                html += 
                `
                <div class="product__item column--25">               
                        <img class="img__product" src="../views/img/${data.datos[i].rutima_pro}" alt="${data.datos[i].nom_pro}">
                        <div class="product__title">${data.datos[i].nom_pro}</div>
                        <div class="product__description">${data.datos[i].des_pro}</div>
                        <div class="product__price">$${data.datos[i].pre_pro}</div>
                        <div class="product__options">
                            <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                                <button class="details__product" id="btn-details">Ver detalles <i class="fas fa-arrow-right"></i></button>
                            </a>
                            <a class="ref__cart" href = "b">
                                <button class="buy__product" id="btn-cart"><i class="fas fa-shopping-bag"></i></button>
                            </a>
                        </div>   
                    
                </div>
                `;
                data.datos[i];
                
            }
            document.getElementById('product_mts_list').innerHTML = html;
        },
        error:function(error){
            console.error(error);
        }
    });
}

const toggleButton = document.getElementsByClassName('bars__menu')[0];
const filterLinks = document.getElementsByClassName('menu__link');
const filterContent1 = document.getElementsByClassName('content__options')[0]
const filterContent2 = document.getElementsByClassName('user__option')[0]

toggleButton.addEventListener('click', function(){
    for(let i=0; i<filterLinks.length; i++){
        filterContent1.classList.toggle('active');
        filterContent2.classList.toggle('active');
        console.log("a");
    }
})

let menu = document.getElementById("bars-menu");
menu.addEventListener('click', function () {
    let opcionesMenu = document.getElementById('content-option');
    let opcionesUsuario = document.getElementById('user-option');
    opcionesMenu.classList.toggle('active-block');
    opcionesUsuario.classList.toggle('active-flex');

});


/*
function get_count_cart(){
    $.ajax({
        url:'../Model/purchase/get_orders.php',
        type:'POST',
        data:{},
        success:function(data){
            console.log(data);
            let total_objetos= 0;
            for (let i = 0; i < data.datos.length; i++) {
                total_objetos ++;
            }
            document.getElementById('cart-counter').innerHTML= `${total_objetos}`;
        },
        error:function(error){
            console.error(error);
        }
    });
}*/
