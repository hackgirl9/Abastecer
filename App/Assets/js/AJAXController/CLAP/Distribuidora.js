$(document).ready(function(){
    $('#empresa-form').on('submit',event, function () {
        event.preventDefault();
        // Se obtienen los valores que almacenan los inputs.
        var nombreEmpresa = $('#nombreEmpresa').val();
        var rifEmpresa = $('#rifEmpresa').val();
        var emailEmpresa = $('#emailEmpresa').val();
        var tlfEmpresa = $('#tlfEmpresa').val();
        $.ajax({
            type:'POST',
            dataType: 'json',
            data: {
                nombreEmpresa: nombreEmpresa,
                rifEmpresa: rifEmpresa,
                emailEmpresa: emailEmpresa,
                tlfEmpresa: tlfEmpresa
            },
            url: "index.php?controller=Distribuidora&action=insertData",
            beforeSend: function(){
                console.log("Sending data");
                var loader = '<div class="msj center"> <h5 class="">Cargando...</h5> </div>' +
                    '<div class="preloader-wrapper small active">' +
                    '<div class="spinner-layer spinner-blue-only">' +
                    '<div class="circle-clipper left">' +
                    '<div class="circle"></div>' +
                    '</div><div class="gap-patch">' +
                    '<div class="circle"></div>' +
                    '</div><div class="circle-clipper right">' +
                    '<div class="circle"></div>' +
                    '</div>' +
                    '</div>' + '</div>';
                $('#preloader').html(loader).show();
                $('#empresa-form').addClass('active-loader');
                $('#empresa-form :input').attr('disabled', 'disabled');
            },
            success:function(data){
                swal({
                    title: "¡Bien hecho!",
                    text: "Se ha registrado la empresa " + nombreEmpresa + " exitosamente.",
                    icon: "success",
                    button: {
                        text: "Aceptar",
                        visible: true,
                        value: true,
                        className: "green-45deg-gradient-1"
                    },
                    timer: 5000
                })
                .then(exit => {
                    location.href = "index.php?controller=Distribuidora&action=index";
                }); // Modal con información */
            },
            error:function(err){
                console.log(err);
                swal({
                    title: "¡Oh no!",
                    text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                    icon: "error",
                    timer: 3000, 
                    button:{
                        text:"Aceptar",
                        visible:true,
                        value:true,
                        className: "green-45deg-gradient-1",
                        closeModal: true
                    }
                });
            }
        });
    });

    $(".empresa-delete").on('click',function(){
        var idEmpresa = $(this).val();
        swal({
            title: "Eliminar Empresa Distribuidora",
            text: "¿Está seguro que desea eliminar esta empresa distribuidora? Si lo hace, no podrá revertir los cambios.",
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
        })
        .then(deleteEmpresa => {
            if(deleteEmpresa){
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: { idEmpresa: idEmpresa },
                    url: "index.php?controller=Distribuidora&action=deleteData",
                    success: function(data){
                        console.log("Data sent");
                    },
                    error: function(err){
                        console.log(err);
                        // swal("Error","Ha ocurrido un error inesperado.","warning");
                    }
                });
                swal({
                    title: "¡Eliminación exitosa!",
                    text: "Se ha eliminado la empresa distribuidora exitosamente.",
                    icon: "success",
                    button:{
                        text: "¡Listo!",
                        visible: true,
                        value: true,
                        className: "blue-45deg-gradient-1"
                    },
                    timer: 3000
                })
                .then(exit => {
                    location.href = "index.php?controller=Distribuidora&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha eliminado la empresa distribuidora.",
                    icon: "info",
                    button: {
                        text: "¡Esta bien!",
                        visible: true,
                        value: true,
                        className: "blue-45deg-gradient-1"
                    },
                    timer: 3000
                });
            }
        });
    });
});