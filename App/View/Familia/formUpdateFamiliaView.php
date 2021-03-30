<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - Familia</title>
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
                    <?php foreach($register as $family):?>
                    <form action="<?php echo $helper->url('Familia', 'updateFamilia');?>" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text">Actualizar Familia</h3>
                        </div>
                        <div class="row">
                            <input type="hidden" name="idFamilia" id="idFamilia" value="<?php echo $family->idFamilia ?>">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquia" id="parroquia">
                                    <option>Elige una opción</option>
                                    <option>Buena Vista</option>
                                    <option>Catedral</option>
                                    <option>Concepción</option>
                                    <option>Felipe Alvarado</option>
                                    <option>Juan de Villegas</option>
                                    <option>Juarez</option>
                                    <option>Santa Rosa</option>
                                    <option>Tamaca</option>
                                    <option>Unión</option>
                                    <option selected><?php echo $family->parroquia?></option>
                                </select>
                                <label>Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <select name="idClap" id="idClap">
                                    <option value="<?php echo $family->idClap?>" selected><?php echo $family->nombreClap ?></option>
                                </select>
                                <label>CLAP</label>
                            </div>                    
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-satellite prefix grey-text"></i>
                                <input type="text" name="numManzana" id="numManzana" value="<?php echo $family->numManzana?>" minlength="1" maxlength="10" class="validate" required pattern="[0-9]+">
                                <label for="numManzana">N° Manzana</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" id="numVivienda" name="numVivienda" value="<?php echo $family->numVivienda?>"  minlength="1" maxlength="10" class="validate" required pattern="[0-9-]+">
                                <label for="numVivienda">N° Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" id="direccionFamilia" name="direccionFamilia"  value="<?php echo $family->direccionFamilia?>" class="validate" minlength="10" maxlength="99" required>
                                <label for="direccionFamilia">Dirección de Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-supervisor_account prefix grey-text"></i>
                                <input type="text" id="grupoFamiliar" name="grupoFamiliar" value="<?php echo $family->grupoFamiliar?>" class="validate" minlength="1" maxlength="10" required pattern="[0-9]+">
                                <label for="grupoFamiliar">Grupo Familiar</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-group_add prefix grey-text"></i>
                                <input type="text" id="apellidoFamilia" name="apellidoFamilia" value="<?php echo $family->apellidoFamilia?>" minlength="5" maxlength="30" class="validate"required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s0-9 ]+">
                                <label for="apellidoFamilia">Apellido de la Familia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-shopping_cart prefix grey-text"></i>
                                <input type="number" id="cantMercadosAsignados" name="cantMercadosAsignados" value="<?php echo $family->cantMercadosAsignados?>" class="validate" min="1" max="900" required>
                                <label for="cantMercadosAsignados">N° Mercados</label>
                            </div>
                            <div class="col s12 m6 center-align input-field">
                                <button id="actualiza-familia" class="waves-effect btn blue-45deg-gradient-1 col s12" name="actualiza-familia" ><i class="icon-check right"></i>Actualizar</button>
                            </div>
                            <div class="col s12 m6 center-align input-field">
                                <button id="cancela" class="waves-effect btn red-45deg-gradient-1 col s12" name="cancela" ><i class="icon-close right"></i>Cancelar</button>
                            </div>
                        </div>
                    </form>
                    <?php break; endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/helperCLAP.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Familia/actualizaFamilia.js"></script>
</body>
</html>
