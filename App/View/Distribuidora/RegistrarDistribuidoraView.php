<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar E. Distribuidora</title>
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
                    <form action="" method="post" class="col s12" id="empresa-form">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Empresa Distribuidora</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input id="nombreEmpresa" type="text" name="nombreEmpresa" class="validate" pattern="[A-Z0-9.- ]+" title="Solo puede usar letras desde la A a la Z (MAYÚSCULAS), números del 0 al 9, símbolos como punto (.) ó guión (-) y espacios." required>
                                <label for="nombreEmpresa">Nombre de la Empresa</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="rifEmpresa" id="rifEmpresa" class="validate" pattern="[JVE0-9-]+" title="Solo puede usar J (Jurídico), V (Venezolano) o E (Extranjero) en MAYÚSCULA y números del 0 al 9." required>
                                <label for="rifEmpresa">RIF de la Empresa</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-markunread prefix grey-text"></i>
                                <input type="email" name="emailEmpresa" id="emailEmpresa" class="validate" required>
                                <label for="emailEmpresa">E-mail de la Empresa</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-phone_iphone prefix grey-text"></i>
                                <input type="text" name="tlfEmpresa" id="tlfEmpresa" class="validate" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="tlfEmpresa">Teléfono de Contacto</label>
                            </div>
                            <div class="col s12 center-align buttons section">
                                <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" name="register" id="register"><i class="icon-add_box right"></i>Registrar</button>
                            </div>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/Distribuidora.js"></script>
</body>
</html>