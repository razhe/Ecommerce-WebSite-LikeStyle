$(document).ready(function(){
    display_products(product_url, 0);
    display_brands();
});
//productos
function display_products(url, limite){
    let formulario_filtro = document.getElementById('form-filtro');
    let campos = new FormData(formulario_filtro)
    $.ajax({
        url:'../Model/product/clasifier_products.php',
        type:'POST',
        data:
        {
            categoria : url,
            limite : limite,
            marca : campos.get('marca'),
            clasificar :  campos.get('clasificar'),
            ordenar : campos.get('ordenar')
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
            //PAGINACIÓN
            document.getElementById('product-list').innerHTML = html;
            //console.log(Math.round(parseInt(data.conteo) / 10))
            let htmlPaginas = '';
            for (let i = 1; i <= Math.round(parseInt(data.conteo) / 10); i++) {
                htmlPaginas += `<span class="item-paginacion num__pagina" data-paginacion="${((i - 1) * 10)}" ">${i}</span>`;//importante aplicar el data set para guardar la paginacion (Limite)
            }
            document.getElementById('num-paginacion').innerHTML = htmlPaginas;
            defPagina();//paginacion 
        },
        error:function(error){
            console.log(error)
        }
    })
}
//MARCAS
function display_brands(){
    $.ajax({
        url:'../Model/product/get_brands.php',
        type:'POST',
        data:{
            categoria:product_url
        },
        success:function(data){
            let html = '';
            for (let i = 0; i < data.datos.length; i++) {
                html += 
                `
                <li class="item__lista--filtro">
                    <input type="radio" class="radio__cat" name="marca" value="${data.datos[i].marca}">
                    <label for="">
                        <span>${data.datos[i].marca}(${data.datos[i].cantidad})</span>
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
        }
    })
}
//FILTRO
let formulario_filtro = document.getElementById('form-filtro');

formulario_filtro.addEventListener('submit', (e)=>{
    e.preventDefault();    
    let campos = new FormData(formulario_filtro)
    buscarFiltros(product_url,campos.get('marca'), campos.get('ordenar'), campos.get('clasificar'))
})

function buscarFiltros(url, marca, orden, clasificacion) {
    $.ajax({
        type: 'POST',
        url: '../Model/product/clasifier_products.php',
        data: 
        {
            categoria : url,
            limite : 0,
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
            //PAGINACIÓN
            document.getElementById('product-list').innerHTML = html;
            //console.log(Math.round(parseInt(data.conteo) / 10))
            let htmlPaginas = '';
            for (let i = 1; i <= Math.round(parseInt(data.conteo) / 10); i++) {
                htmlPaginas += `<span class="item-paginacion num__pagina" data-paginacion="${((i - 1) * 10)}" ">${i}</span>`;//importante aplicar el data set para guardar la paginacion (Limite)
            }
            document.getElementById('num-paginacion').innerHTML = htmlPaginas;
            defPagina();//paginacion
        },
        error:function(error){
            console.log(error)
        }
    });
}
//PAGINACION
var paginaActual = 0;
function defPagina(){
    let paginas = document.getElementsByClassName("num__pagina");
    for (let i = 0; i < paginas.length; i++) {
        paginas[i].addEventListener('click', function() {
            var paginaActual = (paginas[i].dataset.paginacion);
            display_products(product_url, paginaActual);
        })
    }
}



    










