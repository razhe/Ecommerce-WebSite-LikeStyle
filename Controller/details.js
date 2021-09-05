$(document).ready(function(){    
    get_detail_product();
    getTotalStock();
    
});


//var prod_url = '<?php echo htmlspecialchars($_GET["p"]); ?>';
function get_detail_product(){
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
        success:function(data){   
            document.getElementById('title-product-detail').innerHTML=data.datos[p_url - 1].nom_pro;
            document.getElementById("title-product-detail").value= data.datos[p_url - 1].nom_pro;

            document.getElementById('img-product-detail').src="../views/img/" + data.datos[p_url - 1].rutima_pro;
            document.getElementById('img-product-detail').value="../views/img/" + data.datos[p_url - 1].rutima_pro;

            document.getElementById('price-product-detail').innerHTML='$'+data.datos[p_url - 1].pre_pro;
            document.getElementById('price-product-detail').value=data.datos[p_url - 1].pre_pro;

            document.getElementById('desc-product-detail').innerHTML=data.datos[p_url - 1].des_pro;
        },
        error:function(error){
            console.error(error);
        }
    });
}
function getTotalStock() {
    $.ajax({
        url:'../Model/product/get_prod_stock.php',
        type:'POST',
        data:{
            codigo_producto : p_url
        },
        success : function(data){
            document.getElementById('add-quant-btn').addEventListener('click', function(){  
                if(document.getElementById('quant-inpt').value < parseInt(data)){
                    document.getElementById('quant-inpt').value++;
                }
            });
            document.getElementById('stock-text').innerHTML = `(${data} disponibles)`;
        }
    });
};

document.getElementById('sub-quant-btn').addEventListener('click', function(){
    if(document.getElementById('quant-inpt').value > 1){
        document.getElementById('quant-inpt').value--;
    }else{
        document.getElementById('quant-inpt').value=1;
    }
});

document.getElementById('btn-add-cart').addEventListener('click',function() {
    let cantidadSelec = document.getElementById('quant-inpt').value;
    $.ajax({
        url:'../Model/purchase/set_quant.php',
        type:'POST',
        data: {cantidad : cantidadSelec},
        success:function(data){   
        },
        error:function(error){
            console.error(error);
        }
    });
});


/*
document.getElementById('btn-add-cart').addEventListener('click', function guardar_producto(){
    //let listaProducto = '{}';
    //nombreProducto = document.getElementById('title-product-detail');
    var datos  = [];
    var objeto = {};
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
        success:function(data){
            datos.push({ 
                "nombre"    : data.datos[p_url - 1].nom_pro,
                "imagen"  : data.datos[p_url - 1].rutima_pro,
                "precio"    : data.datos[p_url - 1].pre_pro,
                "descripcion":data.datos[p_url - 1].des_pro
            });
            objeto.datos = datos;
            console.log(JSON.stringify(objeto));
            console.log(objeto);
        },
        error:function(error){
            console.error(error);
        }
    });
    
    
})
*/
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
}
*/

