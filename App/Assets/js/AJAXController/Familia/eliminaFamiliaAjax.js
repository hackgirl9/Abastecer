$(document).ready(function(){ // Inicializa jQuery
     var idFamilia = $("#idFamilia").val();

     $("#elimina-familia").click(function() {
         event.preventDefault();
            swal({
             title: "¿Estás Seguro?",
             text: "Eliminar a esta Familia",
             icon: "warning",
             buttons: ["Mejor no", "Si"],
             dangerMode: true,
             timer: 10000
         }).then(function (Terminar) {
             if (Terminar) {
                window.location.href = "index.php?controller=Familia&action=deleteFamilia&idFamilia=" + idFamilia;
            //event.preventDefault();
            swal({
             title: "¡Buen Trabajo!",
             text: "Familia Eliminada con Éxito",
             icon: "success",
             dangerMode: true,
             timer: 10000
         });
             } else {
                 swal("Accion Cancelada.");
             }
         });
               

     });

 });

       