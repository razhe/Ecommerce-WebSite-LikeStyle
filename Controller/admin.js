$(document).ready(function(){
    get_products();
    
})
//Side bar
const toggle_btn = document.querySelector('.toggle-btn');
toggle_btn.addEventListener('click', (e)=>{
    document.getElementById('sidebar-id').classList.toggle('active');
    document.getElementById('icono-btn-toggle').classList.toggle('icono-activo');
});

document.querySelector('.container__admin__body').addEventListener('click', (e)=>{
    document.getElementById('sidebar-id').classList.remove('active');
    document.getElementById('icono-btn-toggle').classList.remove('icono-activo');
})
//fin Side bar

function get_products(){
    $.ajax({
        url:'../Model/product/get_products.php',
        type:'POST',
        data:{},
        success:function(data){
            console.log(data);
            let html = document.getElementById('table-body')
            for (let i = 0; i < data.datos.length; i++) {
                html.innerHTML += 
                `
                <tr>
                    <td>${data.datos[i].nom_pro}</td>
                    <td>${data.datos[i].des_pro}</td>
                    <td>$${data.datos[i].pre_pro}</td>
                    <td>Disponible</td>
                    <td>34</td>
                    <td>Vans</td>
                </tr>
                `;
                data.datos[i];
            }
        },
        error:function(error){
            console.error(error);
        }
    });
}
