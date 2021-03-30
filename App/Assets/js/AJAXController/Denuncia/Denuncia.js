$(document).ready(function(){
	$("#fecha").attr('disabled','disabled');
	$("#telf").attr('disabled','disabled');
	$("#nOficio").attr('disabled','disabled');
	$("#status").attr('disabled','disabled');
	$("#textarea1").attr('disabled','disabled');
	$("#enviar").attr('disabled','disabled');
	$('#form-main').attr('disabled','disabled');
	$("#parroquia").attr('disabled','disabled');
	$("#clap").attr('disabled','disabled');
	$("#nombre").attr('disabled','disabled');
	$("#apellido").attr('disabled','disabled');
	$("#comunidad").attr('disabled','disabled');

	var cedula;
	var idIntegrante;

	$('#form-CI').submit(event,function(){
		event.preventDefault();
		cedula=$('#cedula').val();
		$.ajax({
			type:'POST',
			dataType:'json',
			data:{cedula:cedula},
			url:"index.php?controller=Denuncia&action=verificarCedula",
			beforeSend:function(){
				var textPreloader='<div class="progress no-margin">\n' +
                    ' <div class="determinate" style="width: 0%"></div>\n' +
                    ' </div>';
                var preloader=$("#response-preloader").html(textPreloader);
			},
			success:function(data){
				console.log(data);
				if (data[0] === null) {
					swal({
						title: "¡Oh no!",
						text: "La cedula " + cedula + " no está registrada en el sistema.",
						icon: "error",
						button: {
							text: "Entendido",
							className: "blue-45deg-gradient-1"
						}
					});
				}
				else if(data[0] !== undefined){
					console.log("estoy entrando en el if");
					
					swal({
						title: "!Buen Trabajo!",
						text: "Cedula registrada en el sistema, por favor complete el formulario.",
						icon: "success",
						timer: 3000,
						button: {
							text: "¡Está bien!",
							className: "green-45deg-gradient-1"
						}
                	}); 
					idIntegrante=data[0][0].idIntegrante;
						console.log(data[0][0].idIntegrante);
						console.log(data[1]);
					$("#fecha").removeAttr('disabled','disabled');
					$("#telf").val(data[0][0].telefonoIntegrante);
					$("#nOficio").val(data[1]);
					$("#status").val("En Proceso");
					$("#textarea1").removeAttr('disabled','disabled');
					$('#enviar').removeAttr('disabled','disabled');
					$("#parroquia").val(data[0][0].parroquia);
					$("#clap").val(data[0][0].nombreClap);
					$("#nombre").val(data[0][0].nombreIntegrante);
					$("#apellido").val(data[0][0].apellidoIntegrante);
					$("#comunidad").val(data[0][0].nombreComunidad);
					$('#cedula').attr('disabled','disabled');
					$('#buscar').attr('disabled','disabled');
				}
			},
			error:function (err) {
				console.log(err);
				swal({
					title: "¡Oh no!",
					text: "La cedula " + cedula + " no está registrada en el sistema." + "\nPor favor, introduzca una cedula registrada.",
					icon: "error",
					button: {
						text: "Entendido",
						className: "blue-45deg-gradient-1"
					}
				});
	            $('.determinate').css('width','100%');
    	    }
		});

		var fecha;
		var nOficio;
		var status;
		var descripcion;
		$('#form-main').submit(event,function(){
			event.preventDefault();
			fecha=$('#fecha').val();
			nOficio=$('#nOficio').val();
			status=$('#status').val();
			descripcion=$('#textarea1').val();
			$("#enviar").attr('disabled','disabled');

			$.ajax({
				type:'POST',
				datatype:'json',
				data:{fecha:fecha,nOficio:nOficio,idIntegrante:idIntegrante,status:status,descripcion:descripcion},
				url:"index.php?controller=Denuncia&action=crear",
				beforeSend:function(){
					var preloader='<div class="main-loader">'+'<div class="preloader-wrapper big active">'+
    					'<div class="spinner-layer spinner-blue-only">'+
      					'<div class="circle-clipper left">'+
      					'<div class="circle"></div>'+
      					'</div><div class="gap-patch">'+
       					'<div class="circle"></div>'+
     					'</div><div class="circle-clipper right">'+
        				'<div class="circle"></div></div></div></div></div>';
					
						$('#form-main').append(preloader);	
				},
				success:function(data){
					console.log(data);
					if (data == undefined) {
						swal({
							title: "¡Oh no!",
							text: "La cedula " + cedula + " no está registrada en el sistema.",
							icon: "error",
							button: {
								text: "Entendido",
								className: "blue-45deg-gradient-1"
							}
						});
					}else if (data !== undefined) {
						$("#fecha").attr('disabled','disabled');
						$("#telf").attr('disabled','disabled');
						$("#nOficio").attr('disabled','disabled');
						$("#status").attr('disabled','disabled');
						$("#textarea1").attr('disabled','disabled');
						$("#enviar").attr('disabled','disabled');
						swal({
							title: "!Buen Trabajo!",
							text: "La denuncia se ha registrado exitosamente en el sistema.",
							icon: "success",
							timer: 3000,
							button: {
								text: "Entendido",
								className: "green-45deg-gradient-1"
							}
						})
						.then(exit => {
							location.href = "index.php?controller=Denuncia&action=index";
						}); 

						//window.location.href = "index.php?controller=Denuncia&action=read";
					}
				},

				error:function (err) {
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
					$('.determinate').css('width','100%');
				}
			});
		});
	});
});