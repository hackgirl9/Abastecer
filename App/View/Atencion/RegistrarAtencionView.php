<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Atención</title>
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
                    <div class="section">
                        <h3 class="center-align black-text">Registrar Atención</h3>
                    </div>
                    <div class="row">
                        <ul id="tabs-swipe-demo" class="tabs center-align">
                            <li class="tab col m6"><a class="active" href="#one">Registrar Atención</a></li>
                            <li class="tab col m6"><a href="#two">Registrar Beneficiario</a></li>
                        </ul>
                    </div>
                    <!-- Tab 1 -->
                    <div class="row p-5x" id="one">
                        <div class="col s12">
                            <form action="" method="post" class="row" id="form-main">
                                <div class="col s12 m6 xl6 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <label for="date">Fecha Atención</label>
                                    <input type="text" name="date" id="date" class="datepicker validate" required>
                                </div>
                                <div class="col s12 m6 xl6 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <select name="tipoAtencion" id="tipoAtencion">
                                        <option disabled selected>Seleccione Atención</option>
                                        <option>Casa a casa</option>
                                        <option>Feria del Campo</option>
                                        <option>Otro</option>
                                    </select>
                                    <label>Tipo de atención</label>
                                </div>
                                <div class="col s12 m12 input-field">
                                    <i class="icon-insert_comment prefix grey-text"></i>
                                    <textarea id="observacion" name="observacion" class="materialize-textarea" required></textarea>
                                    <label for="observacion">Descripción</label>
                                </div>
                                <div class="col s12 center-align buttons section" id="response-main">
                                    <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" id="registerMain"><i class="icon-add_box right"></i>Registrar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- Tab 2 -->
                    <div id="two" class="row p-5x">
                        <div class="col s12">
                            <form action="" method="post" class="row" id="form-person">
                                <div class="col s12 m6 xl6 input-field">
                                    <i class="icon-map prefix grey-text"></i>
                                    <select name="parroquia" id="parroquia">
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
                                <div class="col s12 m6 xl6 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <select name="idClap" id="idClap">
                                        <option disabled selected>Elige una parroquia</option>
                                    </select>
                                    <label>CLAP</label>
                                </div>
                                <div class="col s12 m6 xl6 input-field">
                                    <i class="icon-account_box prefix grey-text"></i>
                                    <input type="text" name="cedula" id="cedula" maxlength="8" minlength="7" pattern="[0-9]+" title="Solos puedes ingresar numeros" required>
                                    <label for="cedula">Cedula</label>
                                </div>
                                <div class="col s12 m6 xl6 center-align buttons">
                                    <button type="submit"  id="register" class="btn indigo-45deg-gradient-1 waves-effect"><i class="icon-local_mall right"></i>Beneficiar</button>
                                </div>
                            </form>
                            <div class="col s12 center-align mt-1" >
                                <button class="btn indigo-45deg-gradient-1" id="close" disabled>Terminar Atención<i class="icon-close left"></i></button>
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
    <script type="text/javascript" src="Assets/js/AJAXController/helperCLAP.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Atencion/Atencion.js"></script>
</body>
</html>