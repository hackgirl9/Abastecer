$(document).ready(function(){
	var id=$('#id').val();
    var motivo = $('#motivo').val();

    $('#atender').on('click',function() { 
       	var atender= $('#status').val();
    	console.log(atender);
    	swal({
            title: "Atender Denuncia",
            text: "¿Está seguro que desea atender la denuncia?",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Atender",
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
        }).then(function (Terminar){
            if (Terminar) {
                $.ajax({
                    url:"index.php?controller=Denuncia&action=atender",
                    type: 'POST',
                    dataType: 'json',
                    data: {atender:atender,id:id},
                });
                swal({
                    text: "Se ha atendido la denuncia exitosamente.",
                    icon: "info",
                    button: {
                        text: "Entendido",
                        className: "blue-45deg-gradient-1"
                    },
                    timer: 3000
                })
                .then(exit => {
                    location.href = "index.php?controller=Denuncia&action=read";
                });
            }else {
                swal({
                    text: "Acción cancelada.",
                    icon: "info",
                    button: {
                        text: "Aceptar",
                        className: "blue-45deg-gradient-1"
                    }
                });
            }
         });
    });

    $('#rActualizar').click(function(event) {
    	$('#motivo').prop('disabled',false);
    	$('#fecha').prop('disabled',false);
    
  		var button='<button id="actualizar" type="button" class="btn actualizar blue-45deg-gradient-1 waves-effect col s12" >\n'+
  		'<i class="icon-settings_backup_restore left"></i>Actualizar</button>';
  		$('#Cbotones').html(button);

  		$('#actualizar').on('click', function(event) {
		event.preventDefault();
		$('#actualizar').unbind();

		console.log('fecha');
	       swal({
            title: "Actualizar Denuncia",
            text: "¿Está seguro que desea actualizar los datos? Una vez realizado, no podrá revertir los cambios.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Actualizar",
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
         }).then(function(Terminar){
            if (Terminar){
                var motivo=$('#motivo').val();
                var fecha=$('#fecha').val();
                var datos="id="+id+"&fecha="+fecha+"&motivo="+motivo;
                console.log("listo");
                console.log(fecha+motivo);
                $.ajax({
                    url: "index.php?controller=Denuncia&action=update",
                    type: 'POST',
                    data: datos,
                    beforeSend:function(){

                    },
                    success:function(data){
                        console.log(data);
                        if (data==true){
                            swal({
                                title: "Actualización exitosa",
                                text: "La denuncia ha sido actualizada exitosamente.",
                                icon: "success",
                                button: {
                                    text: "Entendido",
                                    className: "blue-45deg-gradient-1"
                                }
                            });
                            $('#motivo').prop('disabled',true);
                            $('#fecha').prop('disabled',true);
                        }
                    }
                });
                
            }else{
                swal({
                    text: "Acción cancelada.",
                    icon: "info",
                    button: {
                        text: "Está bien",
                        className: "blue-45deg-gradient-1"
                    }
                });
            }
         });
    	});	

   	});	

 });