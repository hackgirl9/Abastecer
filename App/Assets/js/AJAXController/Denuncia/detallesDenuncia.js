$(document).ready(function() {
    var id = $('#id').val();
    
	
    $("#eliminar").click(function() {
        swal({
            title: "Eliminar Denuncia",
            text: "¿Está seguro que desea eliminar la denuncia? Una vez eliminada, no podra revertir los cambios.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Eliminar",
                    value: true,
                    visible: true,
                    className: "red-45deg-gradient-1"

                },
                cancel: {
                    text: "Cancelar",
                    value: false,
                    visible: true,
                    className: "grey lighten-2"
                }
            }
        }).then(function (Terminar){
            if (Terminar) {
                $.ajax({
                    url:"index.php?controller=Denuncia&action=delete",
                    type: 'POST',
                    dataType: 'json',
                    data: {id:id}
                });
                swal({
                    text: "Se ha eliminado la denuncia exitosamente.",
                    icon: "info",
                    button: {
                        text: "Entendido",
                        className: "blue-45deg-gradient-1"
                    },
                    timer: 3000
                })
                .then(exit => {
                    location.href = "index.php?controller=Denuncia&action=read";
                });
            } else {
                swal({
                    text: "Acción cancelada.",
                    icon: "info",
                    button: {
                        text: "Aceptar",
                        className: "blue-45deg-gradient-1"
                    }
                });
            }
        });
     });
});