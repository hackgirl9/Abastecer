$(document).ready(function(){
    $("#nombreIntegrante").attr('disabled','disabled');
    $("#apellidoIntegrante").attr('disabled', 'disabled');
    $("#telefonoIntegrante").attr('disabled', 'disabled');
    $("#cedulaIntegrante").attr('disabled', 'disabled');
    var idIntegrante; 
    // Consulta: Obtiene CLAPS por parroquia.
    $("select[name=parroquia]").on('change',function(){
        var parroquia = $('select[name=parroquia]').val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                parroquia: parroquia
            },
            url: "index.php?controller=EstructuraCLAP&action=getClapsByParroquia",
            beforeSend: function(){
                $("#idClap").html("<option disabled>Cargando...</option>");
            },
            success: function(data){
                // console.log(data);
                var claps = "<option disabled selected>Elige un CLAP</option>";
                //compruebo si viene vacio el array de objetos
                if(data === null){
                    claps = "<option disabled selected>No existen CLAP's</option>";
                } 
                else{ //si no viene vacio lo recorro
                    data.forEach(function (clap, index) {
                        claps += '<option value=' + clap.idClap + '>' + clap.nombreClap + '</option>';
                    });
                }
                $("#idClap").html(claps);
                $('select').formSelect();
            },
            error: function(err){
                console.log(err);
            }
        });
    });

    $("select[name=idClap]").on("change",function(){
        $("#filter-estructura").prop('disabled',false);
        $("#cedulaIntegrante").prop('disabled',false);
    });

    // Consulta: Obtiene al miembro por la cedula.
    $('#cedulaIntegrante').on('blur',function(){
        var cedulaIntegrante = $("#cedulaIntegrante").val();
        $.ajax({
            type: 'POST',
            dataType: 'json',
            data: {
                cedulaIntegrante: cedulaIntegrante
            },
            url: "index.php?controller=EstructuraCLAP&action=getIntegranteByCedula",
            success: function(data){
                console.log(data);
                if(data !== null){
                    idIntegrante = data.idIntegrante;
                    $("#nombreIntegrante").val(data.nombreIntegrante);
                    $("#apellidoIntegrante").val(data.apellidoIntegrante);
                    $("#telefonoIntegrante").val(data.telefonoIntegrante);
                }
                else if(data === null){
                    swal({
                        title: "¡Oh no!",
                        text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                        icon: "error",
                        button: {
                            text: "Aceptar",
                            visible: true,
                            value: true,
                            className: "green-45deg-gradient-1",
                            closeModal: true
                        }
                    });
                    $("#cedulaIntegrante").val("");
                }
            },
            error: function(err){   
                console.log(err);
                swal({
                    title: "¡Oh no!",
                    text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                    icon: "error",
                    button: {
                        text: "Aceptar",
                        visible: true,
                        value: true,
                        className: "green-45deg-gradient-1",
                        closeModal: true
                    }
                });
            }
        });
    });

    // Registra datos.
    $("#estructura-form").on('submit',event,function(){
        event.preventDefault();
        var nombreIntegrante = $("#nombreIntegrante").val();
        var apellidoIntegrante = $("#apellidoIntegrante").val();
        var nombreClap = $("#idClap option").text();
        var fechaEleccion = $("#fechaEleccion").val();
        var statusRol = $("#statusRol").val();
        var idClap = $("#idClap").val();
        var idCargo = $("#idCargo").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data:{
                fechaEleccion: fechaEleccion,
                statusRol: statusRol,
                idClap: idClap,
                idCargo: idCargo,
                idIntegrante: idIntegrante
            },
            url: "index.php?controller=EstructuraCLAP&action=insertData",
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
                $('#estructura-form').addClass('active-loader');
                $('#estructura-form :input').attr('disabled', 'disabled');
            },
            success: function(data){
                swal({
                    title: "¡Bien hecho!",
                    text: "Se ha registrado a " + nombreIntegrante + " " + apellidoIntegrante + " como parte de la estructura del CLAP " + nombreClap + ".",
                    icon: "success",
                    button: {
                        text: "Aceptar",
                        visible: true,
                        value: true,
                        className: "green-45deg-gradient-1",
                        closeModal: true
                    },
                    timer: 3000
                })
                .then(redirect => { 
                    location.href = "index.php?controller=CLAP&action=index";
                });
            },
            error: function(err){
                console.log(err);
                swal({
                    title: "¡Oh no!",
                    text: "Ha ocurrido un error inesperado, refresca la página e intentalo de nuevo.",
                    icon: "error",
                    button: {
                        text: "Aceptar",
                        visible: true,
                        value: true,
                        className: "green-45deg-gradient-1",
                        closeModal: true
                    }
                });
            }
        });
    });
    
    // Consulta: Obtiene los Cargos registrados.
    $.ajax({ 
        type: 'POST',
        dataType: 'json',
        data: {},
        url: "index.php?controller=Cargo&action=getAllCargos",
        beforeSend: function(){
            $("#idCargo").html("<option disabled>Cargando...</option>");
        },
        success: function(data){
            console.log(data);
            var cargos = "<option disabled selected>Elige una opción</option>";
            if(data[0] === null){
                cargos = "<option disabled selected>No hay registros</option>";
            } 
            else{
                data.forEach(function(cargo,index){
                    cargos += "<option value='" + cargo.idCargo + "'>" + cargo.cargoRol + "</option>";
                });
            }
            $("#idCargo").html(cargos);
            $('select').formSelect();
        }
    });

    $(".miembro-delete").on('click',function(){
        var idRol = $(this).val();
        swal({
            title: "Eliminar Miembro de la Estructura CLAP",
            text: "¿Está seguro que desea eliminar a este miembro? Si lo hace, no podrá revertir los cambios.",
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
        .then(deleteMiembro => {
            if(deleteMiembro){
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: { idRol: idRol },
                    url: "index.php?controller=EstructuraCLAP&action=deleteData",
                    success: function(data){
                        console.log("Data deleted");
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
                swal({
                    title: "¡Eliminación exitosa!",
                    text: "Se ha eliminado el miembro de CLAP exitosamente.",
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
                    location.href = "index.php?controller=EstructuraCLAP&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha eliminado el miembro de CLAP",
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