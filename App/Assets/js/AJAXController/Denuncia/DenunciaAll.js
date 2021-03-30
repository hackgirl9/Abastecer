$(document).ready(function() {
	 $.ajax({
        dataType:'json',
        type:'POST',
        url:'index.php?controller=Denuncia&action=readAll',
        data:{p:1},
        beforeSend:function () {
              var preloader='<div id="preloader">'+'<div class="msj center"> <h5 class="">Cargando...</h5> </div>'+
                '<div  class="preloader-wrapper center-align small active">'+
                '<div class="spinner-layer spinner-green-only">'+
                '<div class="circle-clipper left">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="gap-patch">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="circle-clipper right">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'</div>'+'</div>'+'</div>';
                $('#consult-denuncia').append(preloader);
        },
        success:function (data) {
            //si no hay ningu registro
            if(data.allDenuncias===null&&data.totalPagina===null){
                $('#preloader').remove();
                $('#consult-denuncia').append('<tr><td colspan="4"><h5 class="center-align">No hay denuncias registradas.</h5></td></tr>');
            }else{//si ya hay registro
                $('#preloader').remove();
                agregarContenido(data);
                agregarPagination(data.totalPagina);
                addEvent();
            }
        },
        error:function (err) {
            console.log(err);
        }
    });
    
    $('#form-filter').submit(event,function(){
        event.preventDefault();
        $('.pagination').html(" ");
        var desde=$('#desde').val();
        var hasta=$('#hasta').val();
        peticionAsincronaByfecha(1,desde,hasta);
    });

    //evento que compara la fechas
    $('#hasta').change(function(){
        var hasta=$('#hasta').val();
        var desde=$('#desde').val();
        desde=revertirFecha(desde);
        hasta=revertirFecha(hasta);
        var desdenew= new Date(desde);
        var hastanew= new Date(hasta);

        if(hasta<=desde){
            swal({
                title: "!Oh no¡",
                text: "El rango de fechas es invalido. La fecha 'Hasta' debe ser mayor a la 'desde'.",
                icon: "error",
                button: {
                    text: "¡Entendido!",
                    className: "blue-45deg-gradient-1"
                }
            });
            $('#hasta').val("");
        }
    });

    function peticionAsincronaAll(p) {
        //hace la peticion al servidor cuando el usuario cambie de pagina
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'index.php?controller=Denuncia&action=readAll',
            data:{p:p},

            beforeSend:function () {
                var preloader='<div id="preloader" class="center" >'+'<div class="msj center"> <h5 class="">Cargando...</h5> </div>'+
                '<div  class="preloader-wrapper center-align small active">'+
                '<div class="spinner-layer spinner-green-only">'+
                '<div class="circle-clipper left">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="gap-patch">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="circle-clipper right">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'</div>'+'</div>'+'</div>';

                $('#consult-denuncia').append(preloader).show();
            },
            success: function (data) {
                $('#preloader').remove();
                $('#consult-denuncia').html(" ");
                agregarContenido(data);
            },
            error:function () {
                console.log("error");
            }
        });

    }
    function peticionAsincronaByfecha(p,desde,hasta) {
    /*realiza la penticion de manera a asicrona  cuando se filtra por fecha y añade la paginacion*/
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'index.php?controller=Denuncia&action=filtrarDenuncia',
            data:{p:p,desde:desde,hasta:hasta},

            beforeSend:function () {
                var preloader='<div id="preloader" class="center" >'+'<div class="msj center"> <h5 class="">Cargando...</h5> </div>'+
                '<div  class="preloader-wrapper center-align small active">'+
                '<div class="spinner-layer spinner-green-only">'+
                '<div class="circle-clipper left">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="gap-patch">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="circle-clipper right">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'</div>'+'</div>'+'</div>';

                $('#consult-denuncia').append(preloader).show();
            },
            success: function (data) {
              
                $('#consult-denuncia').html(" ");
                if(data.allDenuncias===null&&data.totalPagina===null){
                    $('#preloader').remove();
                    $('#consult-denuncia').append('<tr><td colspan="4"><h5 class="center-align">No hay denuncias en esas fechas.</h5></td></tr>');
                }else{
                    agregarContenido(data);
                    if($('.pagination li.elements').length==0){
                        $('#preloader').remove();
                        agregarPagination(data.totalPagina);
                    }
                    addEvent();
                }
            },
            error:function (err) {
                console.log(err);
            },
        });
    }
  

	function  agregarContenido(data) {
        /*Agrega contenido de forma dinamica a traves del bucle de los datos*/
        data.allDenuncias.forEach(function (denuncia) {
            var contenido=' <tr>'+
                '<td>'+denuncia.nControl+'</td>' +
                '<td>'+denuncia.fechaDenuncia+'</td>'+
                '<td>'+denuncia.cedulaIntegrante+'</td>'+
                '<td>'+denuncia.statusDenuncia+'</td>'+
                '<td>'+'<a href="index.php?controller=Denuncia&action=details&idDenuncia='+ denuncia.idDenuncia +'"'+'class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview left"></i>Detalles</a>'
                + '</tr>';
            $('#consult-denuncia').append(contenido);
        });
    }

	function agregarPagination(totalPagina){
        //agrega la paginancion de manera dinamica depenediendo de cuando registro haya

        $('.pagination ').append('<li class="disabled" id="before-li"><a href="#" id="before"><i class="icon-navigate_before"></i></a></li>');
        $('.pagination').append('<li class="waves-effect disabled" id="next-li"><a href="#" id="next"><i class="icon-navigate_next"></i></a></li>');
        for (var i=0;i<totalPagina;i++){
            $('#next-li').before('<li class="waves-effect elements"><a href="#">'+ parseInt(i+1) +'</a></li>');
        }
        //le añade la clase active al primer elemento de la paginacion
        $(".pagination li.elements:first").addClass('active teal-45deg-gradient-1');

    }

        function addEvent(){
        /*No cambiar esta funcion:
        * es la unica que asocia a la paginancion el evento
        * click de manera forzada ya que cuando se agrega contenido dinamico con jquery
        * algunos eventos dejan de funcionar
        *
        * */
        $('.pagination li').unbind();

        /*coloca el evento de manera forzada*/
        $('.pagination li.elements').on('click', function(e){
            var p=$(this).text();
            var desde=$('#desde').val();
            var hasta=$('#hasta').val();
            if(desde!==""&&hasta!==""){
                peticionAsincronaByfecha(p,desde,hasta);
                $('.pagination li').removeClass('active teal-45deg-gradient-1');
                $(this).addClass('active teal-45deg-gradient-1');

            }else{
                peticionAsincronaAll(p);
                $('.pagination li').removeClass('active teal-45deg-gradient-1');
                $(this).addClass('active teal-45deg-gradient-1');
            }
        });
    }
    function revertirFecha(fecha) {
        //tomas la fecha del datapiker y la revierte para poder comparar si el rango de fecha es valido;
        var fechanew= fecha.split('/').reverse().join('-');
        return fechanew;
    }

    $('#form-buscar').submit(event,function() {
        event.preventDefault();
        Buscar();
    });

    function Buscar(){
        var buscar=$('#numSolicitud').val();
        $.ajax({
            url: 'index.php?controller=Denuncia&action=buscar',
            type: 'POST',
            dataType: 'json',
            data: {buscar:buscar},
            beforeSend: function(){
                $('#fila').remove();
                $('#fila-head').remove();
                $('#vacio').remove();
                var preloader='<div id="preloader">'+'<div class="msj center"> <h5 class="">Cargando...</h5> </div>'+
                '<div  class="preloader-wrapper center-align small active">'+
                '<div class="spinner-layer spinner-green-only">'+
                '<div class="circle-clipper left">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="gap-patch">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'<div class="circle-clipper right">'+
                '<div class="circle">'+'</div>'+
                '</div>'+'</div>'+'</div>'+'</div>';
                $('#consultDenunciaBuscar').append(preloader);
            },
            success: function(data){
                console.log(data);
                if (data!==null){
                    $('#preloader').remove();
                    var headTable='<tr id="fila-head">'+'<th>'+'N° Denuncia'+'</th>'+'<th>'+'Fecha'+'</th>'+
                                        '<th>'+'Denunciante'+'</th>'+'<th>'+'Estatus'+'</th>'+
                                        '<th>'+'Acción'+'</th>'+'</tr>';
                    $('#head-table-denuncia').append(headTable);
                     var contenido=' <tr id="fila">'+'<td>'+data[0].nControl+'</td>' +
                    '<td>'+data[0].fechaDenuncia+'</td>'+
                    '<td>'+data[0].cedulaIntegrante+'</td>'+
                    '<td>'+data[0].statusDenuncia+'</td>'+
                    '<td>'+'<a href="index.php?controller=Denuncia&action=details&idDenuncia='+ data[0].idDenuncia +'"'+'class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview left"></i>Detalles</a>'
                    + '</tr>';
                    $('#consultDenunciaBuscar').append(contenido); 
                }
                else{

                    $('#preloader').remove();

                    var respuesta='<p id="vacio" class="center-align">'+'No Se Encontraron Resultados Para La Busqueda.'+'</p>'
                    $('#consultDenunciaBuscar').append(respuesta);

                }
            },
            error: function(err){

            },
        });   
    }
});
