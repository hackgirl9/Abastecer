$(document).ready(function(){

    $("#nameSolicitante").attr('disabled','disabled');
    $("#lastnameSolicitante").attr('disabled','disabled');
    $("#emailSolicitante").attr('disabled','disabled');
    $("#telfSolicitante").attr('disabled','disabled');
    $("#nOficio").attr('disabled','disabled');
    $("#beneficio").attr('disabled','disabled');
    $("#fecha").attr('disabled','disabled');
    $("#status").attr('disabled','disabled');
    $("#registrar").attr('disabled','disabled');
    $("#clap").attr('disabled','disabled');
    $("#comunidad").attr('disabled','disabled');
    $("#parroquia").attr('disabled','disabled');

   
    var IdSolicitud;

    $('#CI').submit(event,function(){
        event.preventDefault();

        var cedula=$('#ciSolicitante').val();

        console.log(cedula);

        $.ajax({
            type:'POST',
            dataType:'json',
            data:{cedula:cedula},
            url:"index.php?controller=Solicitud&action=cedula",
            beforeSend:function(){
                var textPreloader='<div class="progress no-margin">\n' +
                ' <div class="determinate" style="width: 0%"></div>\n' +
                ' </div>';
            var preloader=$("#Solicitud").html(textPreloader);
            },

            success:function(data){
                console.log(data);
                if (data[0]==null){
                    swal("¡upps","cedula"+cedula+"no esta registrado","ERROR");
                }
                else if(data[0] !==undefined){
                    console.log("if");
                    swal({
                        title:"!Buen Trabajo¡",
                        text:"cedula Registrada",
                        icon:"success",
                    });
                    idIntegrante=data[0].idIntegrante;
                        console.log(IdSolicitud);
                        $("#nameSolicitante").val(data[0].nombreIntegrante);
                        $("#lastnameSolicitante").val(data[0].apellidoIntegrante);
                        $("#emailSolicitante").val(data[0].emailIntegrante);
                        $("#telfSolicitante").val(data[0].telefonoIntegrante);
                        $("#nOficio").removeAttr('disabled','disabled');
                        $("#beneficio").removeAttr('disabled','disabled');
                        $("#fecha").removeAttr('disabled','disabled');
                        $("#status").val("En Proceso");
                        $('#registrar').removeAttr('disabled','disabled');

                        $("#parroquia").val(data[0].parroquia);
                        $("#clap").val(data[0].nombreClap);
                        $("#comunidad").val(data[0].nombreComunidad);
                        $('#submit').attr('disabled','disabled');
                        $('#cedula').attr('disabled','disabled');

                }
            },
                error:function(err){
                    console.log(err);
                    swal("¡Oh no!" , "la cedula"+cedula+" no esta registrado en el sistema " );
                    $('.determinate').css('width','100%');

                }
            
        });
            var fecha;
            var nOficio;
            var status;
            var beneficioSolicitud;

            $('#form-main').submit(event,function(){
                event.preventDefault();

                fecha=$('#fecha').val();
                console.log(fecha);
                nOficio=$('#nOficio').val();
                status=$('#status').val();
                console.log(idIntegrante);
                beneficioSolicitud=$('#beneficio').val();

                $.ajax({
                    type:'POST',
                    dataType:'json',
                    data:{fecha:fecha,nOficio:nOficio,idIntegrante:idIntegrante,status:status,beneficioSolicitud:beneficioSolicitud},
                    url:"index.php?controller=Solicitud&action=register",

                    success:function(data){
                        if (data==undefined){
                            swal("¡Upps!","cedula"+cedula+"No esta registrado.","Error");
                        }
                        else if (data !==undefined){
                            swal({
                                title:"!Buen Trabajo",
                                tect:"Solicitud Registrada",
                                icon:"success",
                            });
                            $("#fecha").attr('disabled','disabled');
                            $("#telf").attr('disabled','disabled');
                            $("#nOficio").attr('disabled','disabled');
                            $("#status").attr('disabled','disabled');
                            $("#textarea1").attr('disabled','disabled');
                            $("#enviar").attr('disabled','disabled');
                            window.location.href="index.php?controller=Solicitud&action=readData";
                        }
                    },
                    error:function(err){
                        console.log(err);
                        swal("¡Oh no!", "Ocurrio un Error,refresque la pagina e intentelo de nuevo" , "error" );
                        $('.determinate').css('width','100%');
                    }
                });

            });
    });

});