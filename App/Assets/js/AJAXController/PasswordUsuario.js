$(document).ready(function(){
    function getIdUsuarioByUrl() {
        var variables = {};
        var arreglos = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function (m, key, value) {
            variables[key] = value;
        });
        return variables;
    }

    var idUsuario = getIdUsuarioByUrl()['idUsuario'];
    var firstPassword, newPassword; 

    $("#password-update").on("click",function(){
        swal({
            title: "Cambiar contraseña",
            text: "¿Está seguro que desea cambiar su contraseña? Si lo hace, no podrá revertir los cambios.",
            icon: "warning",
            buttons:{
                confirm:{
                    text: "Confirmar",
                    value: true,
                    visible: true,
                    className: "green-45deg-gradient-1"
                },
                cancel:{
                    text: "Cancelar",
                    // value: false,
                    visible: true, 
                    className: "grey lighten-2"
                }
            }
        })
        .then(function(confirm){
            if(confirm){
                swal({
                    text: "Escribe tu nueva contraseña:",
                    content: {
                        element: "input",
                        attributes: {
                            type: "password",
                            placeholder: "Escribe tu contraseña"
                        }
                    },
                    buttons:{
                        confirm:{
                            text: "Confirmar",
                            value: true,
                            visible: true,
                            className: "green-45deg-gradient-1"
                        },
                        cancel:{
                            text: "Cancelar",
                            value: false,
                            visible: true, 
                            className: "grey lighten-2"
                        }
                    }
                })
                .then(password => {
                    firstPassword = `${password}`;
                    if(!password){
                        swal({
                            icon: "warning",
                            text: "No se puede cambiar la contraseña.",
                            button: {
                                text: "¡Esta bien!",
                                className: "blue-45deg-gradient-1"
                            }
                        });
                    }
                    else if(password !== ""){
                        swal({
                            text: "Confirma tu nueva contraseña:",
                            content: {
                                element: "input",
                                attributes: {
                                    type: "password",
                                    placeholder: "Escribe tu contraseña"
                                }
                            },
                            buttons:{
                                confirm:{
                                    text: "Confirmar",
                                    value: true,
                                    visible: true,
                                    className: "green-45deg-gradient-1"
                                },
                                cancel:{
                                    text: "Cancelar",
                                    value: false,
                                    visible: true, 
                                    className: "grey lighten-2"
                                }
                            }
                        })
                        .then(confirmPassword =>{
                            newPassword = `${confirmPassword}`;
                            if(firstPassword === newPassword){
                                // $.ajax({

                                // });
                                swal({ // Este modal iria dentro del success de ajax
                                    icon: "success",
                                    title: "Cambiar contraseña",
                                    text: "Se ha cambiado la contraseña exitosamente.",
                                    buttons: {
                                        confirm: {
                                            text: "Aceptar",
                                            value: true,
                                            visible: true,
                                            className: "blue-45deg-gradient-1"
                                        }
                                    }
                                })
                                .then(confirm => {
                                    if(confirm){
                                        location.href = "index.php?controller=Usuario&action=index";
                                    }
                                });
                            }
                            else{
                                swal({
                                    title: "Cambiar contraseña",
                                    text: "No se pudo cambiar la contraseña, intentelo de nuevo.",
                                    icon: "info",
                                    buttons: {
                                        confirm:{
                                            text: "¡Esta bien!",
                                            value: true,
                                            className: "blue-45deg-gradient-1"
                                        }
                                    }
                                });
                            }
                        });
                    }
                });
            }
        });
    });
});