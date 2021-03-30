$(document).ready(function () {

    $('#form-person :input').attr('disabled','disabled');
    $('#form :button');
    $('#close').attr('disabled','disabled');
    var idFecha;
    var date;

    //eventos
    $('#form-main').on('submit',function(event){
        //datos del formulario
        event.preventDefault();

        date=$('#date').val();
        var tipoAtencion=$('#tipoAtencion').val();
        var observacion=$('#observacion').val();
        if(tipoAtencion!==null){
            $.ajax({

                type: 'POST',
                dataType: 'json',
                data:{date:date,tipoAtencion:tipoAtencion,observacion:observacion},
                url: "index.php?controller=Atencion&action=RegisterDataMain",

                beforeSend: function () {
                    var contenido = '<div class="msj center"> <h5 class="">Cargando...</h5> </div>' +
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
                    $('#preloader').html(contenido).show();
                    $('#form-main').addClass('active-loader');
                    $('#form-main :input').attr('disabled','disabled');
                },
                success: function (data) {
                    $.when($('#preloader').fadeOut('normal')).then($('#form-main').removeClass('active-loader')).then(function () {
                        swal({
                            title: "!Buen Trabajo!",
                            text: "Atención registrada con éxito, por favor ingrese los beneficiarios.",
                            icon: "success",
                            button: {
                                text: "Entendido",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                    });

                    $('#form-person :input').removeAttr('disabled','disabled');
                    $('#registerMain').css('display','none');
                    idFecha = data.idAtencion;
                },
                error:function () {
                    swal({
                        title: "¡Oh no! ",
                        text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                        icon: "error",
                        button: {
                            text: "¡Esta bien!",
                            className: "grey lighten-2"
                        }
                    });
                    $.when($('#preloader').fadeOut('normal')).then($('#form-main').removeClass('active-loader'));
                }
            });

        }else{
            swal({
                title: "!Oh no!",
                text: "Debe seleccionar un tipo de atención.",
                icon: "error",
                button: {
                    text: "Entendido",
                    className: "green-45deg-gradient-1"
                }
            });
        }
    });

    $("#form-person").on('submit',function(event){
        event.preventDefault();
        var cedula = $("#cedula").val();
        var clap = $("#idClap").val();
        var parroquia = $("#parroquia").val();
        var fecha = idFecha;
        if(parroquia !== null){
            if(clap !== null){
                RegisterBeneficiarios(cedula,clap,fecha);
            }else{
                swal({
                    title: "!Oh no!",
                    text: "Debe selecionar un CLAP para poder atender las familias.",
                    icon: "error",
                    button: {
                        text: "¡Entendido!",
                        className: "blue-45deg-gradient-1"
                    }
                });
            }
        }else{
            swal({
                title: "!Oh no!",
                text: "Selecione una parroquia.",
                icon: "error",
                button: {
                    text: "¡Entendido!",
                    className: "blue-45deg-gradient-1"
                }
            });
        }
    });

    $("#close").on('click',function() {
        swal({
            title: "¿Estás Seguro?",
            text: "Una vez terminada,no se podrán actualizar los datos, solo agregar más beneficiarios.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Actualizar",
                    className: "indigo-45deg-gradient-1",
                    value: true,
                    visible: true
                },
                cancel: {
                    text: "Cancelar",
                    className: "grey lighten-2",
                    value: false,
                    visible: true
                }
            }
        }).then(function (Terminar) {
            if(Terminar) {
                window.location.href = "index.php?controller=Atencion&action=read&p=1";
            }else {
                swal({
                    text: "Puede agregar más beneficiarios.",
                    icon: "info",
                    button: {
                        className: "blue-45deg-gradient-1",
                        text: "Entendido"
                    }
                });
             }
         });
     });

    //funciones
    function RegisterBeneficiarios(cedula,clap,fecha){
    $.ajax({
        type:'POST',
        dataType:'json',
        data:{cedula:cedula,idFecha:idFecha,clap:clap,date:date},
        url:"index.php?controller=Atencion&action=registerDataPerson",
        beforeSend:function () {
            var contenido = '<div class="msj center"> <h5 class="">Cargando...</h5> </div>' +
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
            $('#preloader').html(contenido).show();
            $('#form-person').addClass('active-loader');
            //desabilito el formulario
            $('#form-person :input').attr('disabled','disabled');
        },
        success:function (data) {
            $.when($('#preloader').fadeOut('normal')).then($('#form-person').removeClass('active-loader')).then(function () {
                if(data === null) {
                    swal({
                        title: "¡Oh no!",
                        text: "La cedula " + cedula + " no está registrada en el sistema.",
                        icon: "error",
                        button: {
                            text: "Entendido",
                            className: "blue-45deg-gradient-1"
                        }
                    });
                }else if(data === 1){
                    swal({
                        title: "¡Oh no!",
                        text: "Esta familia ya fue atendida este mes.",
                        icon: "error",
                        button: {
                            text: "Entendido",
                            className: "blue-45deg-gradient-1"
                        }
                    });
                }else{
                    if(data.apellidoFamilia !== undefined){
                        swal("Familia "+data.apellidoFamilia+ " ha sido atendido exitosamente.", {
                            icon: "success",
                            buttons: false,
                            timer: 3000
                        });
                        $('#close').removeAttr('disabled','disabled');
                    }else{
                        swal({
                            title: "¡Oh no!",
                            text: "La familia ingresada no pertenece a este CLAP. Es del CLAP " + data.nombreClap + ".",
                            icon: "warning",
                            button: {
                                text: "Aceptar",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                    }
                }
                /*Habilito el formulario*/
                $('#form-person :input').removeAttr('disabled','disabled');

            });
        },
        error:function (err) {
			$('#form-person :input').removeAttr('disabled','disabled');
			console.log(err);
            swal({
                title: "¡Oh no! ",
                text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                icon: "error",
                button: {
                    text: "¡Esta bien!",
                    className: "grey lighten-2"
                }
            });
            $.when($('#preloader').fadeOut('normal')).then($('#form-person').removeClass('active-loader'));
        }
    });
    }
});