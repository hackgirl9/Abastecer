<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registar Enlace Político</title>
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
                    <form action="" method="post" class="col s12" id="enlace-register">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Enlace Político</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input id="nombreEnlace" type="text" name="nombreEnlace" class="validate" pattern="[A-Za-z ]+" title="Solo puede usar letras desde la A a la Z." required>
                                <label for="nombreEnlace">Nombre del Enlace</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="apellidoEnlace" id="apellidoEnlace" class="validate" pattern="[A-Za-z ]+" title="Solo puede usar letras desde la A a la Z." required>
                                <label for="apellidoEnlace">Apellido del Enlace</label>
                            </div>
                            <div class="col s12 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquiaEncargado" id="parroquiaEncargado">
                                    <option disabled selected>Elige una opción</option>
                                    <option>Buena Vista</option>
                                    <option>Catedral</option>
                                    <option>Concepción</option>
                                    <option>Felipe Alvarado</option>
                                    <option>Juan de Villegas</option>
                                    <option>Juarez</option>
                                    <option>Santa Rosa</option>
                                    <option>Tamaca</option>
                                    <option>Unión</option>
                                </select>
                                <label>Parroquia</label>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/EnlacePolitico.js"></script>
</body>
</html>