 $(document).ready(function(){ // Inicializa jQuery
            // $("#registrar").click(function(){ // Al hacer click en el boton
            //     swal({
            //         title: "Agregar miembro a la familia",
            //         text: "¿Desea agregar un nuevo miembro a la familia?",
            //         icon: "info",
            //         buttons: {
            //             confirm: {
            //                 text: "Agregar",
            //                 value: true,
            //                 visible: true,
            //             },
            //             cancel: {
            //                 text: "Cancelar",
            //                 value: false,
            //                 visible: true
            //             }
            //         }
            //     })
            //     .then(function(confirm){
            //         if(confirm){
            //             location.href = "index.php?controller=Familia&action=registerIntegranteFamilia";
            //         }
            //         else{
            //             location.href = "index.php?controller=Familia&action=index";
            //         }
            //     });
            // });

            $("#registrar-miembro").submit(event,function(){
                event.preventDefault();
                var nombreIntegrante = $("#nombreIntegrante").val();
                var apellidoIntegrante = $("#apellidoIntegrante").val();
                var ciIntegrante = $("#ciIntegrante").val();
                var fechaNacimiento = $("#fechaNacimiento").val();
                var sexoIntegrante = $("#sexoIntegrante").val();
                var emailIntegrante = $("#emailIntegrante").val();
                var telefonoIntegrante = $("#telefonoIntegrante").val();
                var rolIntegrante = $("#rolIntegrante").val();
                var manzanero = $("#manzanero").val();
                var codCarnet = $("#codCarnet").val();
                var serialCarnet = $("#serialCarnet").val();
                
                $.ajax({
                    method: "POST",
                    dataType: "json",
                    data: {
                        nombreIntegrante: nombreIntegrante,
                        apellidoIntegrante: apellidoIntegrante,
                        ciIntegrante: ciIntegrante,
                        fechaNacimiento: fechaNacimiento,
                        sexoIntegrante: sexoIntegrante,
                        emailIntegrante: emailIntegrante,
                        telefonoIntegrante: telefonoIntegrante,
                        rolIntegrante: rolIntegrante,
                        manzanero: manzanero,
                        codCarnet: codCarnet,
                        serialCarnet: serialCarnet
                    },
                    url: "index.php?controller=IntegranteFamilia&action=registerIntegrante",
                    beforeSend: function(){
                        console.log('Enviando datos');
                    },
                    success: function(data){
                        swal({
                            title: "Agregar miembro a la familia",
                            text: "¿Desea agregar un nuevo miembro a la familia?",
                            icon: "info",
                            buttons: {
                                confirm: {
                                    text: "Agregar",
                                    value: true,
                                    visible: true,
                                },
                                cancel: {
                                    text: "Cancelar",
                                    value: false,
                                    visible: true
                                }
                            }
                        })
                        .then(function(confirm){
                            if(confirm){
                                location.href = "index.php?controller=Familia&action=registerIntegranteFamilia";
                            }
                            else{
                                location.href = "index.php?controller=Familia&action=index";
                            }
                        });
                    },
                    error: function(err){
                        console.log(err);
                    }

                })
            });
        });