<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Familia</title>
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
                    <form action="" method="post" class="row" id="registrar-familia" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Familia</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 xl4 input-field">
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
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <select name="idClap" id="idClap">
                                    <option disabled selected>Elige un CLAP</option>
                                </select>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-satellite prefix grey-text"></i>
                                <input type="text" name="numManzana" id="numManzana" minlength="1" maxlength="10" class="validate" required pattern="[0-9]+">
                                <label for="numManzana">N° Manzana</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" id="numVivienda" name="numVivienda" minlength="1" maxlength="10" class="validate" required pattern="[0-9]+">
                                <label for="numVivienda">N° Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl8 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" id="direccionFamilia" name="direccionFamilia" class="validate" minlength="10" maxlength="99" required>
                                <label for="direccionFamilia">Dirección de Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-supervisor_account prefix grey-text"></i>
                                <input type="text" id="grupoFamiliar" name="grupoFamiliar" class="validate" minlength="1" maxlength="10" required pattern="[0-9]+">
                                <label for="grupoFamiliar">Grupo Familiar</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-group_add prefix grey-text"></i>
                                <input type="text" id="apellidoFamilia" name="apellidoFamilia"  minlength="5" maxlength="30" class="validate"required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s  ]+">
                                <label for="apellidoFamilia">Apellido de la Familia</label>
                            </div>
                           
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-shopping_cart prefix grey-text"></i>
                                <input type="number" id="cantMercadosAsignados" name="cantMercadosAsignados" class="validate" min="1" max="900" required>
                                <label for="cantMercadosAsignados">N° Mercados</label>
                            </div>
                            <div class="col s12 m12 xl12 center-align input-field">
                                <button type="submit" class="btn waves-effect waves-light indigo-45deg-gradient-1 "><i class="icon-add_box right"></i>Registrar</button>
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
    <script type="text/javascript" src="Assets/js/AJAXController/helperCLAP.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Familia/FamiliaAjax.js"></script>
</body>
</html>