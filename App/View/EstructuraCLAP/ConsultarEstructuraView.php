<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Estructura CLAP</title>
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
                    <div class="section">
                        <h3 class="center-align black-text">Estructura CLAP</h3>
                    </div>
                    <div class="col s12">
                        <form action="<?php echo $helper->url("EstructuraCLAP","filter"); ?>" method="post" class="row">
                            <div class="col s12 m4 input-field">
                                <!-- <i class="icon-map prefix grey-text"></i> -->
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
                            <div class="col s12 m4 input-field">
                                <!-- <i class="icon-streetview prefix grey-text"></i> -->
                                <select name="idClap" id="idClap" required>
                                    <option disabled selected>Seleccione CLAP</option>
                                </select>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m4 input-field center-align">
                                <button type="submit" class="btn orange-45deg-gradient-1 darken-1 waves-effect waves-light col s12" name="action" id="filter-estructura" disabled>Filtrar
                                    <i class="icon-filter_list right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col s12">
                        
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/Estructura.js"></script>
</body>
</html>