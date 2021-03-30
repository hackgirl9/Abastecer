$(document).ready(function () {

    CargaAsincronaAll();

    $('#form-user').on('submit', function (event) {
        //Obteniendo datos de la vista
        var nombreUsuario = $('#nombreUsuario').val();
        var apellidoUsuario = $('#apellidoUsuario').val();
        var cedulaUsuario = $('#cedulaUsuario').val();
        var telefonoUsuario = $('#telefonoUsuario').val();
        var emailUsuario = $('#emailUsuario').val();
        var usuario = $('#usuario').val();
        var passwordUsuario = $('#passwordUsuario').val();
        var rolUsuario = $('#rolUsuario').val();
        event.preventDefault();

        if(rolUsuario!==null) {

            var route = "nombreUsuario=" + nombreUsuario + "&apellidoUsuario=" + apellidoUsuario + "&cedulaUsuario=" + cedulaUsuario + "&telefonoUsuario=" + telefonoUsuario + "&emailUsuario=" + emailUsuario + "&usuario=" + usuario + "&passwordUsuario=" + passwordUsuario + "&rolUsuario=" + rolUsuario;

            $.ajax({
                url: "index.php?controller=Usuario&action=registerData",
                type: "POST",
                data: route,
                beforeSend: function () {
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
                    $('#preloader').html(contenido).show();
                    $('#form-user').addClass('active-loader');
                    $('#form-user :input').attr('disabled','disabled');
                },
                success: function (data) {
                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
                    swal({
                        title: "!Buen Trabajo!",
                        text: "Usuario " + usuario + " registrado con éxito.",
                        icon: "success",
                    }).then(function () {
                        window.location.href = "index.php?controller=Usuario&action=redirectGestionarUsuario";
                    });

                    $('#form-user :input').removeAttr('disabled','disabled');
                },
                error: function () {
                    swal({
                        title: "¡Oh no! ",
                        text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                        icon: "error"
                    });

                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
                }

            });
        }else{
            swal({
                title:'!Oh no!',
                text:"Debes elegir el rol del usuario para completar el registro.",
                icon:"error"
            });
        }
    });

/*No se asocia a traves del .nombreEvento, si no usando el on
   debido a que esa forma hacemos lo evento compatible con Mozilla
 */
    $("#cedulaUsuario").on('blur',function () {
        var cedulaUsuario = $('#cedulaUsuario').val();
        if (cedulaUsuario !== "") {
            $.ajax({
                url: "index.php?controller=Usuario&action=checkCedula",
                type: "POST",
                data: {cedulaUsuario: cedulaUsuario},
                beforeSend: function () {
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
                    $('#preloader').html(contenido).show();
                    $('#form-user').addClass('active-loader');
                    $('#form-user :input').attr('disabled','disabled');
                },
                success: function (data) {
                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
                    if (data === 1) {
                        swal({
                            title: "¡Oh no! ",
                            text: "Cedula " + cedulaUsuario + " está registrada en el sistema.",
                            icon: "error",
                            button:{
                                text: "¡Entiendo!",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                        $('#cedulaUsuario').val("");
                    }
                    $('#form-user :input').removeAttr('disabled','disabled');
                },
                error: function (err) {
                    console.log(err);
                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
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
    });

    $("#usuario").on('blur',function () {
        var usuario = $('#usuario').val();
        if (usuario !== "") {
            $.ajax({
                url: "index.php?controller=Usuario&action=checkUsername",
                type: "POST",
                data: {usuario: usuario},
                beforeSend: function () {
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
                    $('#preloader').html(contenido).show();
                    $('#form-user').addClass('active-loader');
                    $('#form-user :input').attr('disabled','disabled');
                },
                success: function (data) {
                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
                    if (data === 1) {
                        swal({
                            title: "¡Oh no! ",
                            text: "Usuario " + usuario + " está registrado en el sistema.",
                            icon: "error",
                            button: {
                                text: "¡Entiendo!",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                        $('#usuario').val("");
                    }
                    $('#form-user :input').removeAttr('disabled','disabled');
                },
                error: function (err){
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
                    $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
                }
            });
        }
    });


    $(".update").on('click',function () {
        idUsuario = $(this).val();
        window.location.href = "index.php?controller=Usuario&action=redirectUpdate";
    });

    var idUsuario = getVariableGetByName()["id_usuario"];

    if (idUsuario !== undefined) {

        $.ajax({
            url: "index.php?controller=Usuario&action=consultUsuario",
            type: "GET",
            dataType: 'json',
            data: {idUsuario: idUsuario},
            beforeSend: function () {
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
                $('#form-user-update :input').attr('disabled','disabled');
                $('#preloader').append(contenido).show();
                $('#form-user-update').addClass('active-loader');
            },
            success: function (data) {
                $.when($('#preloader').fadeOut('normal')).then($('#form-user-update').removeClass('active-loader'));
                $('#form-user-update :input').removeAttr('disabled','disabled');
                $('#nombreUsuario').val(data.nombreUsuario);
                $('#apellidoUsuario').val(data.apellidoUsuario);
                $('#cedulaUsuarioA').val(data.cedulaUsuario);
                $('#telefonoUsuario').val(data.telefonoUsuario);
                $('#emailUsuario').val(data.emailUsuario);
                $('#usuarioA').val(data.usuario);
                $("#rolUsuario option[value='" + data.rolUsuario + "']").prop("selected", true);
                M.updateTextFields();
                $('select').formSelect();
            },
            error: function (err){
                console.log(err);
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrio un error inesperado, refresque la página e intentelo de nuevo",
                    icon: "error",
                    button: {
                        text: "¡Esta bien!",
                        className: "grey lighten-2"
                    }
                });
                $.when($('#preloader').fadeOut('normal')).then($('#form-user').removeClass('active-loader'));
            }
        });
    }

    $("#form-user-update").on('submit', function (event) {
        event.preventDefault();
        var usuario = $('#usuarioA').val();
        swal({
            title: "¿Estás Seguro?",
            text: "Los cambios realizado al usuario " + usuario + " seran permantes.",
            icon: "warning",
            buttons: {
                confirm: {
                    text: "Actualizar",
                    className: "blue-45deg-gradient-1",
                    value: true,
                    visible: true
                },
                cancel: {
                    text: "Cancelar",
                    className: "grey lighten-2",
                    value: false,
                    visible: true
                }
            },
        }).then(function (Terminar) {
            if (Terminar) {
                var nombreUsuario = $('#nombreUsuario').val();
                var apellidoUsuario = $('#apellidoUsuario').val();
                var cedulaUsuario = $('#cedulaUsuarioA').val();
                var telefonoUsuario = $('#telefonoUsuario').val();
                var emailUsuario = $('#emailUsuario').val();
                var rolUsuario = $('#rolUsuario').val();
                var route = "idUsuario=" + idUsuario + "&nombreUsuario=" + nombreUsuario + "&apellidoUsuario=" + apellidoUsuario + "&cedulaUsuario=" + cedulaUsuario + "&telefonoUsuario=" + telefonoUsuario + "&emailUsuario=" + emailUsuario + "&usuario=" + usuario + "&rolUsuario=" + rolUsuario;
                $.ajax({
                    url: "index.php?controller=Usuario&action=updateData",
                    type: "POST",
                    data: route,
                    beforeSend: function () {
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

                        $('#preloader').html(contenido).show();
                        $('#form-user-update').addClass('active-loader');
                    },
                    success: function () {
                        $.when($('#preloader').fadeOut('normal')).then($('#form-user-update').removeClass('active-loader'));
                        $('#form-user-update :input').attr('disabled','disabled');
                        swal({
                            title: "!Buen Trabajo!",
                            text: "Usuario " + usuario + " actualizado con éxito.",
                            icon: "success",
                            button: {
                                text: "¡Esta bien!",
                                className: "green-45deg-gradient-1"
                            }
                        }).then(function(){
                            window.location.href = "index.php?controller=Usuario&action=redirectDetails&idUsuario=" + idUsuario
                        });

                    },
                    error: function (err){
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
                        $.when($('#preloader').fadeOut('normal')).then($('#form-user-update').removeClass('active-loader'));
                        $('#form-user-update :input').removeAttr('disabled','disabled');
                    }
                });

            } else {
                swal({
                    text: "El usuario no se ha actualizado.",
                    icon: "info",
                    button: {
                        className: "blue-45deg-gradient-1",
                        text: "Entiendo"
                    }
                });
            }
        });
    });


    function getVariableGetByName() {
        var variables = {};
        var arreglos = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            variables[key] = value;
        });
        return variables;
    }


    function peticionAsincronaAllByP(p) {
        $.ajax({
            dataType: 'json',
            type: 'GET',
            data: {p: p},
            url: 'index.php?controller=Usuario&action=gestionarUsuario',
            beforeSend: function () {
                $('#consult-usuario').html(" ");
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
                $('#consult-usuario').append(contenido);
            },
            success: function (data) {
                //cuando se realiaze la animacion de javascript me realiza la siguiente funcion;
                $.when($('#loader-table').fadeOut('normal')).then(function () {
                    agregarContenido(data);
                    addEvent();
                });


            },
            error: function(){
                $('#loader-table').fadeOut('fast');
                swal({
                    title: "¡Oh no! ",
                    text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                    icon: "error",
                    button: {
                        text: "¡Esta bien!",
                        className: "grey lighten-2"
                    }
                });
            }
        });
    }


    function agregarContenido(data) {
            /*Agrega contenido de forma dinamica a traves del bucle de los datos*/
            data.allUsers.forEach(function (usuario) {
                var contenido = ' <tr>' +
                    '<td>' + usuario.usuario + '</td>' +
                    '<td>' + usuario.nombreUsuario + " "+usuario.apellidoUsuario+'</td>' +
                    '<td>' + usuario.rolUsuario + '</td>' +
                    '<td>' + '<a href="index.php?controller=Usuario&action=redirectdetails&idUsuario=' + usuario.idUsuario + '"' + 'class="btn-small btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>' +
                    '<td>' + '<a href="index.php?controller=Usuario&action=redirectUpdate&id_usuario=' + usuario.idUsuario + '"' + 'class="btn-small btn-floating waves-effect waves-light blue-45deg-gradient-1"><i class="icon-update"></i></a></td>' +
                    '<td>' + '<button type="button" value="' + usuario.idUsuario + '" class="btn-small btn-floating waves-effect waves-light red-45deg-gradient-1 delete"><i class="icon-delete"></i></button></td>'
                    + '</tr>';
                $('#consult-usuario').append(contenido);
            });
        }


    function agregarPagination(totalPagina) {
            //agrega la paginancion de manera dinamica depenediendo de cuando registro haya

            $('.pagination ').append('<li class="disabled" id="before-li"><a href="#" id="before"><i class="icon-navigate_before"></i></a></li>');
            $('.pagination').append('<li class="waves-effect disabled" id="next-li"><a href="#" id="next"><i class="icon-navigate_next"></i></a></li>');
            for (var i = 0; i < totalPagina; i++) {
                $('#next-li').before('<li class="waves-effect elements"><a href="#">' + parseInt(i + 1) + '</a></li>');
            }
            //le añade la clase active al primer elemento de la paginacion
            $(".pagination li.elements:first").addClass('active teal-45deg-gradient-1');

        }

    function addEvent() {
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
                peticionAsincronaAllByP(p);
                $('.pagination li').removeClass('active teal-45deg-gradient-1');
                $(this).addClass('active teal-45deg-gradient-1');
            });


            $('.delete').unbind();

            $(".delete").on('click', function (e) {
                var idUsuario = $(this).val();
                swal({
                    title: "¿Está seguro?",
                    text: "El usuario sera eliminado de forma permante.",
                    icon: "warning",
                    buttons: {
                        confirm: {
                            text: "Eliminar",
                            className: "red-45deg-gradient-1",
                            value: true,
                            visible: true
                        },
                        cancel: {
                            text: "Cancelar",
                            className: "grey lighten-2",
                            value: false,
                            visible: true
                        }
                    }
                }).then(function (Terminar) {
                    if (Terminar) {
                        $.ajax({
                            type: 'GET',
                            data: {idUsuario: idUsuario},
                            url: 'index.php?controller=Usuario&action=deleteData',
                            beforeSend: function () {

                            },
                            success: function () {
                                $('#main-content').addClass('hide');
                                $(".pagination").html(" ");
                                $("#consult-usuario").html(" ");
                                CargaAsincronaAll();
                            },
                            error: function () {
                                swal({
                                    title: "¡Oh no! ",
                                    text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                                    icon: "error",
                                    button: {
                                        text: "¡Esta bien!",
                                        className: "grey lighten-2"
                                    }
                                });
                            }
                        });
                    } else {
                        swal({
                            icon: "info",
                            text: "El usuario no se ha eliminado.",
                            button: {
                                className: "blue-45deg-gradient-1",
                                text: "Entiendo",
                                visible:true
                            }
                        });
                    }
                });
            });

        }

    function CargaAsincronaAll() {
            $.ajax({
                dataType: 'json',
                type: 'GET',
                url: 'index.php?controller=Usuario&action=gestionarUsuario',
                data: {p: 1},

                beforeSend: function () {
                    $('#loader-gestionar').html("")
                    ;
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
                    $('#loader-gestionar').append(contenido).show();

                },
                success: function (data) {
                    //cuando se ejecute la animacion añademe el contenido
                    $.when($('#loader-gestionar').fadeOut()).then($('#main-content').removeClass('hide'));
                    //si no hay ningu registro
                    if (data.allUsers === null) {
                        $('#consult-usuario').append('<tr><td colspan="6"><h5 class="center-align">Ningún usuario registrado aún</h5></td></tr>');
                    } else {//si ya hay registro
                        agregarContenido(data);
                        agregarPagination(data.totalPagina);
                        addEvent();

                    }
                },
                error: function (err) {
                    $('#loader-gestionar').fadeOut();
                    console.log(err);
                    swal({
                        title: "¡Oh no! ",
                        text: "Ocurrio un error inesperado,refresque la página e intentelo de nuevo",
                        icon: "error",
                        button: {
                            text: "¡Esta bien!",
                            className: "grey lighten-2"
                        }
                    });
                }
            });
        }
});