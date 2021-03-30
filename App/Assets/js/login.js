
function Entrar() {

    var username = document.getElementById('username').value;
    var password = document.getElementById('password').value;

    $.ajax({
        type: "POST",
        url: "index.php?controller=Login&action=IniciarSesion",
        data: {username: username, password: password},
        beforeSend: function () {
            $('#response-text').html('<div class="progress"> <div class="indeterminate"></div></div>');
        },
        success: function (response) {
            if (response >= '1') {
                document.location = "index.php?controller=Login&action=Home&id=" + response;

            } else {

                var password = document.getElementById('password').value = "";
                $('#response-text').html('<p class=""><i class="icon-warning"></i>Credenciales Incorrectas.</p>');
            }
        },
        error: function (xhr, status) {
            $('#response-text').html('<p class=""><i class="icon-sentiment_dissatisfied"></i>Disculpe, Ocurrio un error inesperado.</p>')
        }

    });

}
