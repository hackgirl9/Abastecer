$(document).ready(function (){
    $('#form-entrar').on('submit',function (event) {
       event.preventDefault();

        var username = $('#username').val();
        var password = $('#password').val();
        $.ajax({
            type: "POST",
            url: "index.php?controller=Login&action=IniciarSesion",
            data: {username: username, password: password},
            beforeSend: function () {
                $('#response-text').html('<div class="progress green lighten-3"><div class="indeterminate green"></div></div>');
            },
            success: function (id) {
                if (id >= '1') {
                    CreateSession(id);//Manda el parametro id solo que por el metodo POST
                } else {

                    $('#password').val("");
                    $('#response-text').html('<p class=""><i class="icon-warning"></i>Credenciales Incorrectas.</p>');
                }
            },
            error: function () {
                $('#response-text').html('<p class=""><i class="icon-sentiment_dissatisfied"></i>Disculpe, Ocurrio un error inesperado.</p>')
            }

        });
    });
    function CreateSession(id){
        $.ajax({
            type:'POST',
            url:'index.php?controller=Login&action=Home',
            data:{id:id},

            success:function () {
                window.location.href="index.php?controller=Home&action=Home";
            },
            error:function () {
                console.log("error");
            }
        });
    }
});


















