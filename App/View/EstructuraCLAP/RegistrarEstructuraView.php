<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Miembros CLAP</title>
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
                    <form action="" method="post" id="estructura-form">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Integrante</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquia" id="parroquia" required>
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
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <select name="idClap" id="idClap" required>
                                    <option disabled selected>Seleccione CLAP</option>
                                </select>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input type="text" id="cedulaIntegrante"  name="cedulaIntegrante" class="validate" pattern="[0-9]+" title="Solo puede usar números." required>
                                <label for="cedulaIntegrante">Cedula</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="nombreIntegrante"  name="nombreIntegrante" placeholder="" class="validate">
                                <label for="nombreIntegrante">Nombre</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="apellidoIntegrante"  name="apellidoIntegrante" placeholder="" class="validate">
                                <label for="apellidoIntegrante">Apellido</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone_android prefix grey-text"></i>
                                <input id="telefonoIntegrante" type="text" name="telefonoIntegrante" placeholder="" class="validate">
                                <label for="telefonoIntegrante">Teléfono</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <label for="fechaEleccion">Fecha Elección</label>
                                <input type="text" name="fechaEleccion" id="fechaEleccion" class="datepicker validate" required>            
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-import_export prefix grey-text"></i>
                                    <select name="statusRol" id="statusRol" required>
                                        <option disabled selected>Elige una opción</option>
                                        <option value="1">Admitido</option>
                                        <option value="0">Denegado</option>
                                    </select>
                                <label>Status</label> 
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-transfer_within_a_station prefix grey-text"></i>
                                <select name="idCargo" id="idCargo" required>
                                    <option disabled selected>Elige una opción</option>
                                </select>
                                <label>Rol Organización</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 center-align buttons section">
                                <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect col s12" id="register" name="register"><i class="icon-add_box right"></i>Registrar</button>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/Estructura.js"></script>
</body>
</html>