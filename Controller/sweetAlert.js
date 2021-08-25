document.getElementById('btn-place-order').addEventListener('click', (e)=>{
    
    Swal.fire({
        icon: 'success',
        title: 'Gracias por su compra!',
        text: 'Su compra se ha realizado con éxito',
        html: ` 
                <br>
                Usted será redirigido al inicio en <b></b> segundos...`,
        timer: 5000,
        timerProgressBar: true,
        allowOutsideClick: false,
        allowEscapeKey: false,
        showConfirmButton: false,
        didOpen: () => {
          //Swal.showLoading()
          const b = Swal.getHtmlContainer().querySelector('b')
          timerInterval = setInterval(() => {
            b.textContent = (Swal.getTimerLeft() / 1000)
            .toFixed(0)
          }, 100)
        },
      }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            window.location.href = "../views/index.php";
            
        }
      })
});