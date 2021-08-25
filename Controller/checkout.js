$(document).ready(function () {

});

document.getElementById('btn-place-order').addEventListener('click', function () {
    $.ajax({
        url: "../Model/purchase/insert_sale.php",
        method: 'POST',
        success: function(data) {
            console.log(data);
        } 
    });
});
