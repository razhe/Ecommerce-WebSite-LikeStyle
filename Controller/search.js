$(document).ready(function(){
    buscar_producto();
})
function buscar_producto(){
    let busqueda = document.getElementById('search-input').value;
    if (!seach_url.trim() == "") {
        $.ajax({
            url:'../Model/utils/search_product.php',
            type: 'POST',
            data:{
                busqueda : seach_url
            },
            success:function(data){
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
                document.getElementById('section-text').textContent = "Resultados de " + "'" +seach_url+ "'";
                if (data.datos.length == 0) {
                    document.getElementById('product_mts_list').innerHTML = `<h2 class = "search__response"> Busqueda sin coincidencia <h2>`;
                }
            },
            error:function(error){
                console.error(error);
            }
        })
    }else{
        document.getElementById('product_mts_list').innerHTML = `<h2 class = "search__response"> Sin resultados <h2>`;
    }
    
};