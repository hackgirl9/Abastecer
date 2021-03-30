 $(document).ready(function(){ // Inicializa jQuery
            
            $("#registrar-miembro").submit(event,function(){//Trae el id del Formulario.crea el evento
                event.preventDefault();//previene el evento, no se va al action
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
                        swal({//Alerta
                            title: "Integrante Registrado Éxitosamente",
                            text:"¿Desea agregar un nuevo miembro a la familia?",
                            icon: "success",
                            buttons: {
                                confirm: {
                                    text: "Agregar",
                                    value: true,
                                    visible: true,
                                },
                                cancel: {
                                    text: "Salir",
                                    value: false,
                                    visible: true
                                }
                            }
                        }).then(function(confirm){
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

            $("#ciIntegrante").blur(function(){
                var ciIntegrante = $("#ciIntegrante").val();


                $.ajax({
                    method: "POST",
                    dataType: "json",
                    data: {ciIntegrante: ciIntegrante},
                    url: "index.php?controller=IntegranteFamilia&action=compruebaCI",
                    beforeSend: function(){
                        console.log('Enviando datos');
                    },
                    success: function(data){
                        if(!data){
                            swal({
                                title: "Oh No!",
                                text: "Esta cédula ya esta Registrada. Por favor introduzca una cédula Válida",
                                icon: "error"
                                });
                        }

                           
                    },
                    error: function(err){
                        console.log(err);
                    }

                })

            });        
        });