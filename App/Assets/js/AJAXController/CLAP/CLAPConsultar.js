$(document).ready(function(){
    // Consulta que se realiza cuando la página termina de cargar.
    $.ajax({
        method: "POST",
        dataType: "json",
        data: { p: 1 },
        url: "index.php?controller=CLAP&action=readData",
        beforeSend: function(){
            var content = '<div class="msj center"> <h5 class="">Cargando...</h5> </div>' +
                '<div class="preloader-wrapper small active">' +
                '<div class="spinner-layer spinner-red-only">' +
                '<div class="circle-clipper left">' +
                '<div class="circle"></div>' +
                '</div><div class="gap-patch">' +
                '<div class="circle"></div>' +
                '</div><div class="circle-clipper right">' +
                '<div class="circle"></div>' +
                '</div>' +
                '</div>' + '</div>'; // Crea el Preloader en HTML y lo almacena en una variable.
            $('#preloader').append(content).show(); // Añade el preloader al documento.
        },
        success: function(data){
            console.log(data);
            $.when($('#preloader').fadeOut()).then($('#main-content').removeClass('hide'));
            if(data.allClaps === null && data.totalPagina === null){
                $('#clap-registers').append('<tr><td colspan="5"><h5 class="center-align">No hay CLAPs registrados.</h5></td></tr>');
            }
            else{
                addContent(data);
                addPagination(data.totalPagina);
                addEvent();
            }
        },
        error: function(err){
            $('#preloader').fadeOut();
            swal({
                title: "¡Oh no! ",
                text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                icon: "error"
            });
            console.log(err);
        }
    });

    $("#clap-filter").on('submit',event,function(){
        event.preventDefault();
        $('.pagination').html("");
        var parroquia = $("#parroquia").val();
        requestByParroquia(1,parroquia);
    });

    function requestAll(p){
        $.ajax({
            method: "GET",
            dataType: "json",
            data: { p: p },
            url: "index.php?controller=CLAP&action=readData",
            beforeSend: function(){
                $("#clap-registers").html("");
                var content = '<tr id="loader-table" style="border-bottom:none !important;">' +
                    '<td colspan="5">' +
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
                $("#clap-registers").append(content).show();
            },
            success: function(data){
                console.log(data);
                $.when($('#loader-table').fadeOut('normal')).then(function(){
                    addContent(data);
                    addEvent();
                });
            },
            error: function(err){
                $('#loader-table').fadeOut('fast');
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                    icon: "error"
                });
                console.log(err);
            }
        });
    }

    function requestByParroquia(p,parroquia){ // Realiza la petición de forma asíncrona y agrega paginación.
        $.ajax({
            method: "GET",
            dataType: "json",
            data: {
                p: p,
                parroquia: parroquia
            },
            url: "index.php?controller=CLAP&action=getByParroquia",
            beforeSend: function(){
                $("#clap-registers").html("");
                var content = '<tr id="loader-table" style="border-bottom:none !important;">' +
                    '<td colspan="5">' +
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
                $("#clap-registers").append(content).show();
            },
            success: function(data){
                console.log(data);
                $.when($('#loader-table').fadeOut('normal')).then(function(){
                    if(data.allClaps === null && data.totalPagina === null){
                        $('#clap-registers').append('<tr><td colspan="5"><h5 class="center-align">No hay CLAPs registrados.</h5></td></tr>');
                    }
                    else{
                        addContent(data);
                        if($('.pagination li.elements').length == 0){
                            addPagination(data.totalPagina);
                        }
                        addEvent();
                    }
                })
            },
            error: function(err){
                $('#loader-table').fadeOut('fast');
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrio un error inesperado, refresque la página e intentelo de nuevo",
                    icon: "error"
                });
                console.log(err);
            }
        });
    }

    function addContent(data){ // Agrega contenido a la tabla dinamicamente mediante un ciclo.
        data.allClaps.forEach(function(clap){
            var register = '<tr>' + 
                '<td>' + clap.nombreClap + '</td>' +
                '<td>' + clap.nombreComunidad + '</td>' +
                '<td>' + clap.parroquia + '</td>' +
                '<td>' + ((clap.estado === "1") ? "<button class='btn-small green-45deg-gradient-1'><i class='icon-done'></i></button>" : "<button class='btn-small red-45deg-gradient-1'><i class='icon-close'></i></button>") + '</td>' +
                '<td>' + '<a href="index.php?controller=CLAP&action=details&idClap=' + clap.idClap + '" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a>' + '</td>' +
                '</tr>';
            $("#clap-registers").append(register);
        });
    }

    function addPagination(totalPagina) {
        // Agrega la paginancion de manera dinamica depenediendo de cuando registro haya
        $('.pagination ').append('<li class="disabled" id="before-li"><a href="#" id="before"><i class="icon-navigate_before"></i></a></li>');
        $('.pagination').append('<li class="disabled" id="next-li"><a href="#" id="next"><i class="icon-navigate_next"></i></a></li>');
        for (var i = 0; i < totalPagina; i++) {
            $('#next-li').before('<li class="waves-effect elements"><a href="#">' + parseInt(i + 1) + '</a></li>');
        }
        // Añade la clase active al primer elemento de la paginacion
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
        $('.pagination li.elements').on('click', function (e) {
            var p = $(this).text();
            var parroquia = $('#parroquia').val();
            if (parroquia !== null) {
                requestByParroquia(p,parroquia);
                $('.pagination li').removeClass('active pink-45deg-gradient-1');
                $(this).addClass('active pink-45deg-gradient-1');

            } 
            else {
                requestAll(p);
                $('.pagination li').removeClass('active pink-45deg-gradient-1');
                $(this).addClass('active pink-45deg-gradient-1');
            }
        });
    }

    

    

    
});