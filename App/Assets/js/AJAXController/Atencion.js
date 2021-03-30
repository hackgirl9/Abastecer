$(document).ready(function () {

    $('#form-person :input').attr('disabled','disabled');
    $('#form :button');
    $('#close').attr('disabled','disabled');



    var idFecha;
    var date;


    $('#registerMain').click(function(){
        //datos del formulario

        date=$('#date').val();
        var tipoAtencion=$('#tipoAtencion').val();
        var observacion=$('#observacion').val();


        $.ajax({

            type: 'POST',
            dataType: 'json',
            data:{date:date,tipoAtencion:tipoAtencion,observacion:observacion},
            url: "index.php?controller=Atencion&action=RegisterDataMain",

            beforeSend: function () {
                var textPreloader='<div class="progress no-margin">\n' +
                    ' <div class="determinate" style="width: 0%"></div>\n' +
                    ' </div>';
                var preloader=$("#response-preloader").html(textPreloader);

            },
            success: function (data) {
                $('#form-main :input').attr('disabled','disabled');
                swal({
                    title: "!Buen Trabajo!",
                    text: "Atención registrada con éxito, por favor ingrese los beneficiarios.",
                    icon: "success",
                });

                $('#form-person :input').removeAttr('disabled','disabled');
                $('#registerMain').css('display','none');
                idFecha=data.idAtencion;

                $('.determinate').css('width','100%');
            },
            error:function () {
                swal( "¡Oh no! " , "Ocurrio un error inesperado,refresque la página e intentelo de nuevo" , "error" );

                $('.determinate').css('width','100%');
            }

        });





    });




     $("#register").click(function(){
         var cedula=$("#cedula").val();
         var clap=$("#clap").val();
         var fecha=idFecha;

            $.ajax({
                type:'POST',
                dataType:'json',
                data:{cedula:cedula,idFecha:idFecha,clap:clap,date:date},
                url:"index.php?controller=Atencion&action=registerDataPerson",

                beforeSend:function () {
                    var textPreloader='<div class="progress no-margin">\n' +
                        ' <div class="determinate" style="width: 0%"></div>\n' +
                        ' </div>';
                    var preloader=$("#response-preloader").html(textPreloader);
                },
                success:function (data) {
                    if(data===null) {
                        swal( "¡Oh no! " , "Cedula "+cedula+" no esta registrado en el sistema." , "error" );

                    }else if(data===1){
                        swal( "¡Oh no! " , "Esta familia ya fue atendida este mes." , "error" );

                    }else{
                        if(data.apellidoFamilia!==undefined){
                            swal("Familia "+data.apellidoFamilia+ " ha sido atendio con éxito.", {
                                icon: "success",
                                buttons: false,
                                timer: 3000,
                            });

                            $('#close').removeAttr('disabled','disabled');

                        }else{
                            console.log(data);
                            swal( "¡Oh no! " , "La familia ingresada no pertenece a este CLAP. Es del CLAP " + data.nombreClap+".", "warning" );
                        }

                    }
                    $('.determinate').css('width','100%');
                },
                error:function () {
                    swal( "¡Oh no! " , "Ocurrio un error inesperado,refresque la pagina e intentelo de nuevo" , "error" );

                    $('.determinate').css('width','100%');
                }

            });
     });
});