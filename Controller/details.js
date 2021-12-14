$(document).ready(function(){    
    get_detail_product();
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
            
            document.getElementById('stock-text').innerHTML = '( ' + data.datos[p_url - 1].stock + ' Disponibles)';

            document.getElementById('add-quant-btn').addEventListener('click', function(){  
                if(document.getElementById('quant-inpt').value < parseInt(data.datos[p_url - 1].stock)){
                    document.getElementById('quant-inpt').value++;
                }
            });

        },
        error:function(error){
            console.error(error);
        }
    });
}

document.getElementById('sub-quant-btn').addEventListener('click', function (){
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
