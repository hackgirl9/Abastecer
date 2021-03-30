$(document).ready(function(){
    var idEnlace;

    function getIdClapByUrl(){
        var variables = {};
        var arreglos = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            variables[key] = value;
        });
        return variables;
    }

    $("#parroquia").on('change',function(){
        var parroquia = $("#parroquia").val();
        $.ajax({
            type: "POST",
            dataType: "json",
            data: { parroquia: parroquia },
            url: "index.php?controller=EnlacePolitico&action=getEnlaceByParroquia",
            success: function(data){
                console.log(data);
                idEnlace = data.idEnlace;
            },
            error: function(err){
                console.log(err);
            }
        });
    });
    // Consulta: Obtiene las empresas distribuidoras dinamicamente
    $.ajax({
        method: 'POST',
        dataType: 'json',
        data: {},
        url: "index.php?controller=Distribuidora&action=getAllEmpresas",
        beforeSend: function(){
            $("#idEmpresa").html("<option disabled>Cargando...</option>");
        },
        success: function (data){
            var empresas = "<option disabled selected>Elige una opción</option>";
            if(data[0] === null){
                empresas = "<option disabled selected>No hay registros</option>";
            } 
            else{
                data.forEach(function(empresa,index){
                    empresas += "<option value='" + empresa.idEmpresa + "'>" + empresa.nombreEmpresa + "</option>";
                });
            }
            $("#idEmpresa").html(empresas);
            $('select').formSelect();
        }
    });
    // Consulta: Registrar CLAP
    $("#clap-register").on('submit',event,function(){
        event.preventDefault();
        var codigoClap = $("#codigoClap").val();
        var codigoSala = $("#codigoSala").val();
        var nombreClap = $("#nombreClap").val();
        var rifClap = $("#rifClap").val();
        var parroquia = $("#parroquia").val();
        var emailClap = $("#emailClap").val();
        var tlfClap = $("#tlfClap").val();
        var nombreComunidad = $("#nombreComunidad").val();
        var limiteNorteComunidad = $("#limiteNorteComunidad").val();
        var limiteSurComunidad = $("#limiteSurComunidad").val();
        var limiteEsteComunidad = $("#limiteEsteComunidad").val();
        var limiteOesteComunidad = $("#limiteOesteComunidad").val();
        var nombreConsejoComunal = $("#nombreConsejoComunal").val();
        var rifConsejoComunal = $("#rifConsejoComunal").val();
        var zonaSilencio = $("#zonaSilencio").val();
        var cantManzaneros = $("#cantManzaneros").val();
        var eje = $("#eje").val();
        var revisadoEnlace = $("#revisadoEnlace").val();
        var cantViviendas = $("#cantViviendas").val();
        var cantFamilias = $("#cantFamilias").val();
        var estado = $("#estado").val();
        var idEmpresa = $("#idEmpresa").val();
        
        $.ajax({
            method: "POST",
            dataType: "json",
            data:{
                codigoClap: codigoClap,
                codigoSala: codigoSala,
                nombreClap: nombreClap,
                rifClap: rifClap,
                parroquia: parroquia,
                emailClap: emailClap,
                tlfClap: tlfClap,
                nombreComunidad: nombreComunidad,
                limiteNorteComunidad: limiteNorteComunidad,
                limiteSurComunidad: limiteSurComunidad,
                limiteEsteComunidad: limiteEsteComunidad,
                limiteOesteComunidad: limiteOesteComunidad,
                nombreConsejoComunal: nombreConsejoComunal,
                rifConsejoComunal: rifConsejoComunal,
                zonaSilencio: zonaSilencio,
                cantManzaneros: cantManzaneros,
                eje: eje,
                revisadoEnlace: revisadoEnlace,
                cantViviendas: cantViviendas,
                cantFamilias: cantFamilias,
                estado: estado,
                idEnlace: idEnlace,
                idEmpresa: idEmpresa
            },
            url: "index.php?controller=CLAP&action=insertData",
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
                $('#clap-register').addClass('active-loader');
                $('#clap-register :input').attr('disabled', 'disabled');
            },
            success: function(data){
                swal({
                    title: "¡Bien hecho!",
                    text: "Se ha registrado el CLAP " + nombreClap + " exitosamente.",
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
    // Consulta: Actualizar CLAP
    $("#clap-update").on('submit',event,function(){
        event.preventDefault();
        var idClap = getIdClapByUrl()['idClap'];
        var codigoClap = $("#codigoClap").val();
        var codigoSala = $("#codigoSala").val();
        var nombreClap = $("#nombreClap").val();
        var rifClap = $("#rifClap").val();
        var parroquia = $("#parroquia").val();
        var emailClap = $("#emailClap").val();
        var tlfClap = $("#tlfClap").val();
        var nombreComunidad = $("#nombreComunidad").val();
        var limiteNorteComunidad = $("#limiteNorteComunidad").val();
        var limiteSurComunidad = $("#limiteSurComunidad").val();
        var limiteEsteComunidad = $("#limiteEsteComunidad").val();
        var limiteOesteComunidad = $("#limiteOesteComunidad").val();
        var nombreConsejoComunal = $("#nombreConsejoComunal").val();
        var rifConsejoComunal = $("#rifConsejoComunal").val();
        var zonaSilencio = $("#zonaSilencio").val();
        var cantManzaneros = $("#cantManzaneros").val();
        var eje = $("#eje").val();
        var revisadoEnlace = $("#revisadoEnlace").val();
        var cantViviendas = $("#cantViviendas").val();
        var cantFamilias = $("#cantFamilias").val();
        var estado = $("#estado").val();
        var idEmpresa = $("#idEmpresa").val();

        $.ajax({
            method: "POST",
            dataType: "json",
            data:{
                idClap: idClap,
                codigoClap: codigoClap,
                codigoSala: codigoSala,
                nombreClap: nombreClap,
                rifClap: rifClap,
                parroquia: parroquia,
                emailClap: emailClap,
                tlfClap: tlfClap,
                nombreComunidad: nombreComunidad,
                limiteNorteComunidad: limiteNorteComunidad,
                limiteSurComunidad: limiteSurComunidad,
                limiteEsteComunidad: limiteEsteComunidad,
                limiteOesteComunidad: limiteOesteComunidad,
                nombreConsejoComunal: nombreConsejoComunal,
                rifConsejoComunal: rifConsejoComunal,
                zonaSilencio: zonaSilencio,
                cantManzaneros: cantManzaneros,
                eje: eje,
                revisadoEnlace: revisadoEnlace,
                cantViviendas: cantViviendas,
                cantFamilias: cantFamilias,
                estado: estado,
                idEnlace: idEnlace,
                idEmpresa: idEmpresa
            },
            url: "index.php?controller=CLAP&action=updateData",
            beforeSend: function(){
                console.log("Sending data");
            },
            success: function(data){
                swal({
                    icon: "success",
                    title: "CLAP actualizado",
                    text: "Se ha actualizado el CLAP " + nombreClap +" exitosamente.",
                    timer: 3000,
                    buttons: {
                        confirm: {
                            text: "Aceptar",
                            value: true,
                            className: "blue-45deg-gradient-1",
                            visible: true
                        }
                    }
                })
                .then(finish => {
                    location.href = "index.php?controller=CLAP&action=index";
                });
            },
            error: function(err){
                console.log(err);
            }
        });
    });
    // Consulta: Eliminar CLAP
    $("#clap-delete").on('click',function(){
        var nombreClap = $("#nombreClap").val();
        swal({
            title: "Eliminar CLAP '" + nombreClap + "'",
            text: "¿Esta seguro que desea eliminar este CLAP? Si lo hace, no podrá revertir los cambios.",
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
        .then(deleteClap => {
            if(deleteClap){
                var idClap = getIdClapByUrl()['idClap'];
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: {
                        idClap: idClap
                    },
                    url: "index.php?controller=CLAP&action=deleteData&idClap=" + idClap,
                    success: function(data){
                        console.log("Deleting data");
                    },
                    error: function (err) {
                        console.log(err);
                    }
                });
                swal({
                    title: "Eliminación exitosa",
                    text: "Se ha eliminado el registro exitosamente.",
                    icon: "success",
                    timer: 3000,
                    buttons: {
                        confirm: {
                            text: "¡Listo!",
                            className: "green-45deg-gradient-1"
                        }
                    }
                })
                .then(exit => {
                    location.href = "index.php?controller=CLAP&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha eliminado el CLAP",
                    icon: "info",
                    buttons: {
                        confirm: {
                            text: "¡Esta bien!",
                            className: "blue-right-gradient-1"
                        }
                    }
                });
            }
        });
    });

    // Consulta: Suspender CLAP.
    $("#suspender").on('click',function () {
        swal({
            title: "Suspender CLAP",
            text: "¿Esta seguro que desea suspender este CLAP?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Suspender",
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
        .then(suspender => {
            if(suspender){
                var idClap = getIdClapByUrl()['idClap'];
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: {
                        idClap: idClap
                    },
                    url: "index.php?controller=CLAP&action=suspenderClap&idClap="+idClap,
                    success: function(data){
                        console.log(data);
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
                swal({
                    text: "Suspensión exitosa.",
                    icon: "success",
                    timer: 3000,
                    buttons: {
                        confirm: {
                            text: "Listo!",
                            className: "green-45deg-gradient-1"
                        }
                    }
                })
                .then(exit => {
                    location.href = "index.php?controller=CLAP&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha suspendido el CLAP",
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: "¡Esta bien!",
                            className: "blue-right-gradient-1"
                        }
                    }
                });
            }
        });
    });
    // Consulta: Habilitar CLAP
    $("#admitir").on('click',function () {
        swal({
            title: "Admitir CLAP",
            text: "¿Esta seguro que desea admitir este CLAP?",
            icon: "info",
            buttons: {
                confirm: {
                    text: "Habilitar",
                    value: true,
                    visible: true,
                    className: "green-45deg-gradient-1"

                },
                cancel: {
                    text: "Cancelar",
                    value: false,
                    visible: true, 
                    className: "grey lighten-2"
                }
            }
        })
        .then(habilitar => {
            if(habilitar){
                var idClap = getIdClapByUrl()['idClap'];
                $.ajax({
                    method: "GET",
                    dataType: "json",
                    data: {
                        idClap: idClap
                    },
                    url: "index.php?controller=CLAP&action=admitirClap&idClap="+idClap,
                    success: function(data){
                        console.log(data);
                    },
                    error: function(err){
                        console.log(err);
                    }
                });
                swal({
                    text: "Admisión exitosa.",
                    icon: "success",
                    timer: 3000,
                    buttons: {
                        confirm: {
                            text: "Listo!",
                            className: "green-45deg-gradient-1"
                        }
                    }
                })
                .then(salir => {
                    location.href = "index.php?controller=CLAP&action=index";
                });
            }
            else{
                swal({
                    text: "No se ha podido admitir el CLAP",
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: "¡Esta bien!",
                            className: "blue-right-gradient-1"
                        }
                    }
                });
            }
        });
    });

});