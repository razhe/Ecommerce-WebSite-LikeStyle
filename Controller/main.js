$(document).ready(function(){
    get_products();
})

function get_products(){
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
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
            document.getElementById('product_mts_list').innerHTML = html;
            //Ejecucion del slick slider cuando carguen los datos de la bd.
            slick_slider();
        },
        error:function(error){
            console.error(error);
        }
    });
}
//slick library
function slick_slider(){
	$('.center').slick({
		infinite:true,
		slidesToShow: 4,
    slidesToScroll: 1,
		arrows:false,
		autoplay: true,
		autoplaySpeed: 3000,
		dots: true,
		centerModel:true,
        centerPadding:'10px',
        responsive: [
            {
              breakpoint: 1024,
              settings: {
                slidesToShow: 3,
                slidesToScroll: 1,
                infinite: true,
              }
            },
            {
              breakpoint: 600,
              settings: {
                slidesToShow: 2,
                slidesToScroll: 2
              }
            },
            {
              breakpoint: 480,
              settings: {
                slidesToShow: 1,
                slidesToScroll: 1
              }
            }
          ]
	});
};
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
