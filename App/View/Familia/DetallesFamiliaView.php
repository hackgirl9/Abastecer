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
                    <?php if ($register == null): ?>
                        <h3 class="center-align black-text title-size">Esta Familia no tiene Integrantes</h3>
                    <?php endif; ?>
                    <?php if ($register != null): ?>
                    <?php foreach ($register as $family): ?>
                    <form action="" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text title-size">Familia N°<?php echo $family->grupoFamiliar; ?></h3>
                        </div>
                        <div class="row">
                            <input type="hidden" name="idFamilia" id="idFamilia" value="<?php echo $family->idFamilia ?>">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquia" id="parroquia" disabled>
                                    <option disabled>Elije una opción</option>
                                    <option><?php echo $family->parroquia ?></option>
                                </select>
                                <label>Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <select name="idClap" id="idClap" disabled>
                                    <option selected><?php echo $family->nombreClap ?></option>
                                </select>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-satellite prefix grey-text"></i>
                                <input type="text" name="numManzana" id="numManzana" value="<?php echo $family->numManzana; ?>" disabled>
                                <label for="numManzana">N° Manzana</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" name="numVivienda" id="numVivienda" value="<?php echo $family->numVivienda ?>" disabled>
                                <label for="numVivienda">N° Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-home prefix grey-text"></i>
                                <input type="text" name="direccionFamilia" id="direccionFamilia" value="<?php echo $family->direccionFamilia ?>" disabled>
                                <label for="direccionFamilia">Dirección de Vivienda</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-supervisor_account prefix grey-text"></i>
                                <input type="text" name="grupoFamiliar" id="grupoFamiliar" value="<?php echo $family->grupoFamiliar ?>" disabled>
                                <label for="grupoFamiliar">Grupo Familiar</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-group_add prefix grey-text"></i>
                                <input type="text" name="apellidoFamilia" id="apellidoFamilia" value="<?php echo $family->apellidoFamilia ?>" disabled>
                                <label for="apellidoFamilia">Apellido Familia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-shopping_cart prefix grey-text"></i>
                                <input type="text" name="cantMercadosAsignados" id="cantMercadosAsignados" value="<?php echo $family->cantMercadosAsignados ?>" disabled>
                                <label for="cantMercadosAsignados">N° Mercados</label>
                            </div>
                            <div class="col s6 input-field center-align">
                                <a href="<?php echo $helper->url('Familia', 'vistaUpdate'); ?>&idFamilia=<?php echo $family->idFamilia ?>" class="btn waves-effect waves-light blue-45deg-gradient-1 modal-trigger col s12"><i class="icon-update left"></i>Actualizar</a>
                            </div>
                            <!-- Delete Button -->
                            <div class="col s6 input-field center-align">
                                <button id="elimina-familia" class="btn red-45deg-gradient-1 col s12"><i class="icon-delete_forever left"></i>Eliminar</button>
                            </div>
                        </div>
                    </form>
                    <?php break; endforeach; ?>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col s12">
                        <table class="centered highlight responsive-table lateral-scrollbar">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Rol</th>
                                    <th>Detalles</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($register != null): ?>
                                <?php foreach ($register as $family): ?>
                                <tr>
                                    <td><?php echo $family->nombreIntegrante . " " . $family->apellidoIntegrante ?></td>
                                    <td><?php echo $family->telefonoIntegrante ?></td>
                                    <td><?php echo $family->rolPersona ?></td>
                                    <td><a href="<?php echo $helper->url('IntegranteFamilia', 'detailsIntegrante'); ?>&idIntegrante=<?php echo $family->idIntegrante ?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                </tr>
                                <?php endforeach; ?> 
                                <?php endif; ?> 
                            </tbody>
                        </table>
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
    <script type="text/javascript" src="Assets/js/AJAXController/"></script>
</body>
</html>