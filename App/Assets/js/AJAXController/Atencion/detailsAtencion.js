$(document).ready(function () {
    //obtener datos de la url
    function getVariableGetByName() {
        var variables = {};
        var arreglos = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            variables[key] = value;
        });
        return variables;
    }


    var idAtencion=getVariableGetByName()["idAtencion"];
    var clap;
    var fecha;



    CargaAsincrona();


    $("#Agregar").on('click',function () {
        swal({
            text:"Agregar Beneficiarios:",
            content:"input",
            buttons: {
                confirm: {
                    text: "Buscar",
                    className: "orange-45deg-gradient-1",
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
        }).then(function (value) {
            if(value!==null) {
                if (value !== "") {
                    RegisterBeneficiarios(value, idAtencion, clap, fecha);
                    CargaAsincrona();
                }

            }else{
                swal({
                    text: "Acción cancelada.",
                    icon: "info",
                    button: {
                        className: "blue-45deg-gradient-1",
                        text: "Entiendo"
                    }
                });
            }

        });
    });

    function RegisterBeneficiarios(cedula,idAtencion,clap,fecha){
        $.ajax({
            type:'POST',
            dataType:'json',
            data:{cedula:cedula,idFecha:idAtencion,clap:clap,date:fecha},
            url:"index.php?controller=Atencion&action=registerDataPerson",

            beforeSend:function () {
                var textPreloader='<div class="progress no-margin">\n' +
                    ' <div class="determinate" style="width: 0%"></div>\n' +
                    ' </div>';
                var preloader = $("#response-preloader").html(textPreloader);
            },
            success:function (data) {
                if(data===null) {
                    swal({
                        title: "¡Oh no!",
                        text: "La cedula " + cedula + " no esta registrado en el sistema.",
                        icon: "error",
                        button: {
                            text: "Entendido",
                            className: "grey lighten-2"
                        }
                    });
                }else if(data===1){
                    swal({
                        title: "¡Oh no!",
                        text: "Esta familia ya fue atendida este mes.",
                        icon: "error",
                        button: {
                            text: "Entendido",
                            className: "grey lighten-2"
                        }
                    });

                }else{
                    if(data.apellidoFamilia!==undefined){
                        swal({
                            text: "La familia " + data.apellidoFamilia + " ha sido atendida exitosamente.",
                            icon: "success",
                            buttons: false,
                            timer: 3000,
                        });
                        $('#close').removeAttr('disabled','disabled');
                    }else{
                        swal({
                            title: "¡Oh no!",
                            text: "La familia ingresada no pertenece a este CLAP. Es del CLAP " + data.nombreClap + ".",
                            icon: "info",
                            button: {
                                text: "Entendido",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                    }

                }
                $('.determinate').css('width','100%');
            },
            error:function (err) {
                console.log(err);
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                    icon: "error",
                    button: {
                        text: "¡Esta bien!",
                        className: "grey"
                    }
                });

                $('.determinate').css('width','100%');
            }

        });
    }


    function CargaAsincrona(){
        $.ajax({
            type:'GET',
            dataType:'json',
            data:{idAtencion:idAtencion},
            url: "index.php?controller=Atencion&action=detailsData",

            beforeSend:function () {
                var textPreloader='<div class="progress no-margin">\n' +
                    ' <div class="determinate" style="width: 0%"></div>\n' +
                    ' </div>';
                var preloader=$("#response-preloader").html(textPreloader);
            },
            success:function (data) {
                $("#Parroquia").html("<b>Parroquia:</b>"+data.parroquia);
                $("#nombreClap").html("<b>Nombre del CLAP:</b>"+data.nombreClap);
                $("#FamiliaBenefiaciadas").html("<b>Familias Beneficiadas:</b>"+data.cantidad);
                $("#fechaLimite").html("<b>Fecha Limite:</b>"+data.fechaLimite)
                clap=data.idClap;
                fecha=data.fechaAtencion;

                $("#date").val(data.fechaAtencion);
                $("#tipoAtencion option[value='"+ data.tipoAtencion +"']").prop("selected",true);
                $('#observacion').val(data.observacion);

                M.textareaAutoResize($('#observacion'));
                M.updateTextFields();
                $('.determinate').css('width','100%');
            },
            error:function () {
                $('.determinate').css('width','100%');
            }
        });
    }

});