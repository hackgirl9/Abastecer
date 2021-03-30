<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Usuario | <?php echo $register->nombreUsuario; ?></title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-image">
                                <img src="Assets/img/matthew.png" alt="">
                                <span class="card-title center-align black-text"><?php echo $register->usuario; ?></span>
                            </div>
                            <div class="card-content">
                                <div class="row">
                                    <div class="col s12">
                                        <ul>
                                            <li><b>Nombre:</b> <?php echo $register->nombreUsuario; ?></li>
                                            <li><b>Apellido:</b> <?php echo $register->apellidoUsuario; ?></li>
                                            <li><b>Cedula:</b> <?php echo $register->cedulaUsuario; ?></li>
                                            <li><b>Usuario:</b> <?php echo $register->usuario; ?></li>
                                            <li><b>E-mail:</b> <?php echo $register->emailUsuario; ?></li>
                                            <li><b>Teléfono:</b> <?php echo $register->telefonoUsuario; ?></li>
                                            <li><b>Rol:</b> <?php echo $register->rolUsuario; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col s12">
                                        <button class="btn col s12 red-45deg-gradient-1" id="password-update">Cambiar Password<i class="icon-autorenew left white-text"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script type="text/javascript" src="Assets/js/AJAXController/PasswordUsuario.js"></script>
</body>
</html>