$(document).ready(function (){
/*una ves cargada la pagina se realize la peticion ajax*/
    $.ajax({
        dataType:'json',
        type:'POST',
        url:'index.php?controller=Atencion&action=readAll',
        data:{p:1},

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
            $('#preloader').append(contenido).show();
        },
        success:function (data) {
            $.when($('#preloader').fadeOut()).then($('#main-content').removeClass('hide'));
            if(data.allAtenciones===null&&data.totalPagina===null){
                $('#consult-atencion').append('<tr><td colspan="4"><h5 class="center-align">Ninguna atención registrada aún.</h5></td></tr>');
            }else{//si ya hay registro
                agregarContenido(data);
                agregarPagination(data.totalPagina);
                addEvent();
            }
        },
        error:function (err) {
            $('#preloader').fadeOut();
            swal({
                title: "¡Oh no! ",
                text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                icon: "error",
                button: {
                    text: "¡Esta bien!",
                    className: "grey lighten-2"
                }
            });
        }
    });

    /*Eventos*/
    $('#form-filter').on('submit',function(event){
        event.preventDefault();
        $('.pagination').html(" ");
        var desde=$('#desde').val();
        var hasta=$('#hasta').val();
        peticionAsincronaByfecha(1,desde,hasta);

    });
    //evento que compara la fechas
    $('#hasta').on('change',function(){
        var hasta = $('#hasta').val();
        var desde = $('#desde').val();

        desde = revertirFecha(desde);
        hasta = revertirFecha(hasta);

        var desdenew = new Date(desde);
        var hastanew = new Date(hasta);


        if(hasta<=desde){
            swal({
                title:"!Oh no¡",
                text:"El rango de fechas es invalido. La fecha 'Hasta' debe ser mayor a la 'desde'.",
                icon:"error",
                button: {
                    text: "¡Entendido!",
                    className: "blue-45deg-gradient-1"
                }
            });
            $('#hasta').val("");
        }
    });


    /*Funciones*/
    function peticionAsincronaAll(p) {
        //hace la peticion al servidor cuando el usuario cambie de pagina
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'index.php?controller=Atencion&action=readAll',
            data:{p:p},
            beforeSend:function () {
                $('#consult-atencion').html(" ");
                var contenido = '<tr id="loader-table" style="border-bottom:none !important;">' +
                    '<td colspan="6">' +
                    '<div class="preloader-wrapper small active">' +
                    '<div class="spinner-layer spinner-red-only">' +
                    '<div class="circle-clipper left">' +
                    '<div class="circle"></div>' +
                    '</div><div class="gap-patch">' +
                    '<div class="circle"></div>' +
                    '</div><div class="circle-clipper right">' +
                    '<div class="circle"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<td>' +
                    '</tr>';
                $('#consult-atencion').append(contenido).show();
            },
            success: function (data) {
                console.log(data);
                $.when($('#loader-table').fadeOut('normal')).then(function () {
                    agregarContenido(data);
                    addEvent();
                });
            },
            error:function () {
                $('#loader-table').fadeOut('fast');
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                    icon: "error",
                    button: {
                        text: "¡Esta bien!",
                        className: "grey lighten-2"
                    }
                });
            }
        });
    }
    function peticionAsincronaByfecha(p,desde,hasta) {
    /*realiza la penticion de manera a asicrona  cuando se filtra por fecha y añade la paginacion*/
        $.ajax({
            dataType:'json',
            type:'GET',
            url:'index.php?controller=Atencion&action=filtrarAtencion',
            data:{p:p,desde:desde,hasta:hasta},

            beforeSend:function () {
                $('#consult-atencion').html(" ");
                var contenido = '<tr id="loader-table" style="border-bottom:none !important;">' +
                    '<td colspan="6">' +
                    '<div class="preloader-wrapper small active">' +
                    '<div class="spinner-layer spinner-red-only">' +
                    '<div class="circle-clipper left">' +
                    '<div class="circle"></div>' +
                    '</div><div class="gap-patch">' +
                    '<div class="circle"></div>' +
                    '</div><div class="circle-clipper right">' +
                    '<div class="circle"></div>' +
                    '</div>' +
                    '</div>' +
                    '</div>' +
                    '<td>' +
                    '</tr>';
                $('#consult-atencion').append(contenido).show();
            },
            success: function (data) {
                console.log(data);
                $.when($('#loader-table').fadeOut('normal')).then(function () {
                    if(data.allAtenciones === null && data.totalPagina === null){
                        $('#consult-atencion').append('<tr><td colspan="4"><h5 class="center-align">Ninguna atención registrada.</h5></td></tr>');
                    }else{
                        agregarContenido(data);
                        if($('.pagination li.elements').length==0){
                            agregarPagination(data.totalPagina);
                        }
                        addEvent();
                    }
                });

            },
            error:function (err) {
                $('#loader-table').fadeOut('fast');
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrió un error inesperado, refresque la página e intentelo de nuevo",
                    icon: "error",
                    button: {
                        text: "¡Esta bien!",
                        className: "grey lighten-2"
                    }
                });
            },
        });
    }
    function  agregarContenido(data) {
        /*Agrega contenido de forma dinamica a traves del bucle de los datos*/
        data.allAtenciones.forEach(function (atencion) {
            var contenido=' <tr>'+
                '<td>'+atencion.fechaAtencion+'</td>' +
                '<td>'+atencion.parroquia+'</td>'+
                '<td>'+atencion.nombreClap+'</td>'+
                '<td>'+'<a href="index.php?controller=Atencion&action=details&idAtencion='+ atencion.idAtencion +'"'+'class="btn indigo-45deg-gradient-1 waves-effect waves-light"><i class="icon-pageview left"></i>Detalles</a>'
                + '</tr>';
            $('#consult-atencion').append(contenido);
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


});