$(document).ready(function(){
    display_products();
    display_brands();
});

function display_products(){
    $.ajax({
        url:'../Model/product/filtered_products.php',
        type:'POST',
        data:
        {
            categoria : product_url
        },
        success:function(data){
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
            document.getElementById('product-list').innerHTML = html;
        },
        error:function(error){

        }
    })
}

function display_brands(){
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
        success:function(data){
            let html = '';
            for (let i = 0; i < data.datos.length; i++) {
                html += 
                `
                <li class="item__lista--filtro">
                    <input type="radio" class="radio__cat" name="marca" value="${data.datos[i].marca}">
                    <label for="">
                        <span>${data.datos[i].marca}</span>
                        <small></small>
                    </label>
                </li>

                
                `;
            }
            htmlBtn = `<button type="submit" class="link__filtrar--productos item-form-ordenar">Aplicar</button>`;

            document.getElementById('lista-contenido-filtro').innerHTML = html;
            document.getElementById('container-btn-filtro').innerHTML = htmlBtn;
            
            
        },
        error:function(error) {
            console.log(error);
        }
    })
}

let formulario_filtro = document.getElementById('form-filtro');

formulario_filtro.addEventListener('submit', (e)=>{
    e.preventDefault();
    
    let campos = new FormData(formulario_filtro)
    buscarFiltros(campos.get('marca'), campos.get('ordenar'), campos.get('clasificar'))
})

function buscarFiltros(marca, orden, clasificacion) {
    $.ajax({
        type: 'POST',
        url: '../Model/product/clasifier_products.php',
        data: 
        {
            marca : marca,
            clasificar : clasificacion,
            ordenar : orden
        },
        success:function(data){
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
            document.getElementById('product-list').innerHTML = html;
        },
        error:function(error){
            console.log(error)
        }
    });
}

/*
var clasificar = document.getElementsByClassName("opt__select--clasificar");

document.getElementById('link-filtro').addEventListener('click', function(){
    for (let i = 0; i < clasificar.length; i++) {
        clasificar[i].addEventListener('click', function() {
            console.log(clasificar[i].value)
        })
    }
})
*/


    










