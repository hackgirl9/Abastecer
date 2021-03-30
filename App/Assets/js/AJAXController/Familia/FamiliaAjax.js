 $(document).ready(function(){ // Inicializa jQuery
           
            $("#registrar-familia").submit(event,function(){
                event.preventDefault();//no se va al action, previene el evento
                var idClap = $("#idClap").val();
                var numManzana = $("#numManzana").val();
                var numVivienda = $("#numVivienda").val();
                var direccionFamilia = $("#direccionFamilia").val();
                var grupoFamiliar = $("#grupoFamiliar").val();
                var apellidoFamilia = $("#apellidoFamilia").val();
                var cantMercadosAsignados = $("#cantMercadosAsignados").val();
                
                $.ajax({
                    method: "POST",
                    dataType: "json",
                    data: {
                        idClap: idClap,
                        numManzana: numManzana,
                        numVivienda: numVivienda,
                        direccionFamilia: direccionFamilia,
                        grupoFamiliar: grupoFamiliar,
                        apellidoFamilia: apellidoFamilia,
                        cantMercadosAsignados: cantMercadosAsignados
                    },
                    url: "index.php?controller=Familia&action=registerFamilia",
                    beforeSend: function(){
                        console.log('Enviando datos');
                    },
                    success: function(data){
                       if(data){
                            swal({
                                title: "¡Buen Trabajo!",
                                text: "Registro de la Familia "+apellidoFamilia+" Éxitoso, Registre los Integrantes",
                                icon: "success",
                            }).then(function () {
                    window.location.href = "index.php?controller=Familia&action=registerIntegranteFamilia";
                });
                        }
                    },
                    error: function(err){
                        console.log(err);
                    }

                })
            });




       
        });