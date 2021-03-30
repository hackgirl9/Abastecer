$(document).ready(function(){
    // Consulta: Registrar Enlace Politico
    $('#enlace-register').on('submit',event,function(){
        event.preventDefault();
        var nombreEnlace = $('#nombreEnlace').val();
        var apellidoEnlace = $('#apellidoEnlace').val();
        var parroquiaEncargado = $('#parroquiaEncargado').val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: {
                nombreEnlace: nombreEnlace,
                apellidoEnlace: apellidoEnlace,
                parroquiaEncargado: parroquiaEncargado
            },
            url: "index.php?controller=EnlacePolitico&action=insertData",
            beforeSend: function(){
                console.log('Enviando datos.');
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
                $('#enlace-register').addClass('active-loader');
                $('#enlace-register :input').attr('disabled', 'disabled');
            },
            success: function(data){
                swal({
                    title: "¡Bien hecho!",
                    text: "Se ha registrado la persona " + nombreEnlace + " " + apellidoEnlace + " como enlace político de la parroquia " + parroquiaEncargado + ".",
                    icon: "success",
                    button: {
                        text: "Aceptar",
                        visible: true,
                        value: true,
                        className: "green-45deg-gradient-1",
                        closeModal: true
                    },
                    timer: 5000
                })
                .then(exit => {
                    location.href = "index.php?controller=EnlacePolitico&action=index";
                });
            },
            error: function(){
                swal({
                    title: "¡Oh no!",
                    text: "La persona " + nombreEnlace + " " + apellidoEnlace + "no puede ser registrado, intentalo de nuevo.",
                    icon: "error",
                    button:{
                        text:"Aceptar",
                        visible:true,
                        value:true,
                        className: "green-45deg-gradient-1",
                        closeModal: true,
                        timer:5000
                    }
                });
            }
        });
    });

    // Consulta: Eliminar Enlace Politico
    $(".enlace-delete").on('click',function(){
        var idEnlace = $(this).val();
        swal({
            title: "Eliminar Enlace Político",
            text: "¿Está seguro que desea eliminar a este enlace político? Si lo hace, no podrá revertir los cambios.",
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
        .then(deleteEnlace => {
            if (deleteEnlace) {
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: { idEnlace: idEnlace },
                    url: "index.php?controller=EnlacePolitico&action=deleteData",
                    success: function(data){
                        console.log("Data sent");
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
                swal({
                    title: "¡Eliminación exitosa!",
                    text: "Se ha eliminado el enlace político exitosamente.",
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
                    location.href = "index.php?controller=EnlacePolitico&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha eliminado el enlace político",
                    icon: "info",
                    button:{
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