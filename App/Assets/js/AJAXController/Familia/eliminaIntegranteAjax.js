$(document).ready(function(){ // Inicializa jQuery
     var idIntegrante = $("#idIntegrante").val();

     $("#elimina-miembro").click(function() {
         event.preventDefault();
            swal({
             title: "¿Estás Seguro?",
             text: "Eliminar Integrante de Familia",
             icon: "warning",
             buttons: ["Mejor no", "Si"],
             dangerMode: true,
             timer: 10000
         }).then(function (Terminar) {
             if (Terminar) {
                window.location.href = "index.php?controller=IntegranteFamilia&action=deleteIntegrante&idIntegrante=" + idIntegrante;
            //event.preventDefault();
            swal({
             title: "¡Buen Trabajo!",
             text: "Integrante Eliminado con Éxito",
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

       
 