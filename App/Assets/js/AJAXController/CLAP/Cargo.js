$(document).ready(function(){
    $('#cargo-form').on('submit',event,function(){ // Cuando se active el evento submit
        event.preventDefault(); // 
        var cargoRol = $('#cargoRol').val(); // Obtiene el valor del input:cargoRol
        if(cargoRol !== ""){
            $.ajax({ // Funcion que realiza la peticion AJAX
                type: "POST", // Método de envio de datos.
                dataType: "json", // Tipo de datos - JSON
                data: { cargoRol:cargoRol }, // Datos que procesara la pateción.
                url: "index.php?controller=Cargo&action=insertData", // Ruta a la que enviara los datos.
                beforeSend:function(){ // Antes de enviar los datos.
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
                    $('#cargo-form').addClass('active-loader');
                    $('#cargo-form :input').attr('disabled', 'disabled');
                },
                success: function(data){ // Al realizarse la petición exitosamente, envía los datos.
                    swal({
                        title: "¡Bien hecho!",
                        text: "Se ha registrado el cargo " + cargoRol + " exitosamente.",
                        icon: "success",
                        button: {
                            text: "Aceptar",
                            visible: true,
                            value: true,
                            className: "green-45deg-gradient-1"
                        },
                        timer:3000
                    })
                    .then(exit => {
                        location.href = "index.php?controller=Cargo&action=index";
                    }); // Modal con información
                },
                error: function(err){ // Si ocurre algun error en la petición
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
                            className: "red-45deg-gradient-1"
                        }
                    })
                    .then(exit => {
                        location.href = "index.php?controller=Cargo&action=index";
                    }); // Modal con información
                }
            });
        }
    });
});