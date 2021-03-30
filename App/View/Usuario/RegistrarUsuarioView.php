<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Usuario</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
<?php require_once("View/Public/header.php"); ?>
<main>
    <div id="preloader" class="loader">
    </div>
    <div class="section">
        <div class="container">
            <div class="row">
                <h3 class="center-align black-text">Registrar Usuario</h3>
            </div>
            <div class="row">
                <form action="" method="post" id="form-user">
                    <div class="row">
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-contact_mail prefix grey-text"></i>
                            <input id="cedulaUsuario" type="text" name="cedulaUsuario" class="validate" minlength="7" maxlength="8" pattern="[0-9]+"  title="Solo puedes usar numeros." required>
                            <label for="cedulaUsuario">Cedula del Usuario</label>
                        </div>
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-person_pin prefix grey-text"></i>
                            <input id="nombreUsuario" type="text" name="nombreUsuario"  class="validate" minlength="3" maxlength="20"  pattern="[A-Za-z]+" title="Solo puedes usar letras." required>
                            <label for="nombreUsuario" >Nombre del Usuario</label>
                        </div>
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-person_pin prefix grey-text"></i>
                            <input id="apellidoUsuario" type="text" name="apellidoUsuario" class="validate"  minlength="3" maxlength="20"  pattern="[A-Za-z]+" title="Solo puedes usar letras." required>
                            <label for="apellidoUsuario">Apellido del Usuario</label>
                        </div>
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-phone_android prefix grey-text"></i>
                            <input id="telefonoUsuario" type="text" name="telefonoUsuario" class="validate" minlength="11" maxlength="11" pattern="[0-9]+"  title="Solo puedes usar numeros." required>
                            <label for="telefonofUsuario">Telefono del Usuario</label>
                        </div>
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-markunread prefix grey-text"></i>
                            <input type="email" name="emailUsuario" id="emailUsuario" class="validate" required>
                            <label for="emailUsuario">E-mail del Usuario</label>
                        </div>
                        <div class="col s12 m6 xl4 input-field">
                            <i class="icon-person prefix grey-text"></i>
                            <input id="usuario" type="text" name="usuario" class="validate"  minlength="5" maxlength="8" pattern="^[A-Za-z]{1,6}[0-9]{1,2}$"  title="El usuario no debe empezar por un número. Debe tener al menos 1 número,logitud minima de 5 caracteres y no mayor a 7 digitos." required>
                            <label for="usuario">Usuario</label>
                        </div>
                        <div class="col s12 m6 input-field">
                            <i class="icon-security prefix grey-text"></i>
                            <input type="text" name="passwordUsuario" id="passwordUsuario" class="validate" pattern='(?=^.{6,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$' title="La contraseña debe tener una logitud de 6 caracteres,y contener al menos un letra en mayuscula, y un número." required>
                            <label for="passwordUsuario">Contraseña</label>
                        </div>
                        <div class="col s12 m6 input-field">
                            <i class="icon-transfer_within_a_station prefix grey-text"></i>
                            <select id="rolUsuario" name="rolUsuario">
                                <option disabled selected>Elige una opición</option>
                                <option>SuperUsuario</option>
                                <option>Administrador</option>
                                <option>Usuario</option>
                            </select>
                            <label>Rol de Usuario</label>
                        </div>
                    </div>
                    <div class="col s12 center-align buttons section">
                        <button type="submit" id="register" class="btn indigo-45deg-gradient-1 waves-effect"
                        ">
                        <i class="icon-add_box right"></i>Registrar</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>
<?php require_once("View/Public/footer.php"); ?>
<script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="Assets/js/materialize.min.js"></script>
<script type="text/javascript" src="Assets/js/exec.js"></script>
<script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
<script type="text/javascript" src="Assets/js/AJAXController/Usuario.js"></script>
</body>
</html>


