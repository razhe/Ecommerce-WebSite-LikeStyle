$(document).ready(function(){
    get_products();

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
                        <div class="product__price">$${data.datos[i].pre_pro}</div>
                        <div class="product__options">
                            <a class="ref__details" href = "details-product.php?p=${data.datos[i].cod_pro}">
                                Comprar ahora
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
