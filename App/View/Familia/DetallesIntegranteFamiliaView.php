<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - Integrante Familia</title>
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
                    <?php if($resultado == NULL) : ?>
                        <h3 class="center-align yellow-text text-darken-3 title-size">No existen Integrantes</h3>
                    <?php endif; ?>
                    <?php if($resultado != NULL): ?>
                    <?php foreach($resultado as $integrate):?>
                    <form action="" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text">Miembro de Familia</h3>
                        </div>
                        <div class="row">
                            <input type="hidden" id="idIntegrante" name="idIntegrante" value="<?php echo $integrate->idIntegrante?>">
                            <input type="hidden" name="manzanero" name="manzanero" value="<?php echo $integrate->manzanero?>">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="nombreIntegrante" id="nombreIntegrante" class="validate" value="<?php echo $integrate->nombreIntegrante ?>" disabled>
                                <label for="nombreIntegrante">Nombres</label>
                            </div>
                            <div class="input-field col s12 m6 xl4">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="apellidoIntegrante" id="apellidoIntegrante" class="validate" value="<?php echo $integrate->apellidoIntegrante ?>" disabled>
                                <label for="apellidoIntegrante">Apellidos</label>
                            </div>
                            <div class="input-field col s12 m6 xl4">
                                <i class="icon-chrome_reader_mode prefix grey-text grey-text"></i>
                                <input type="text" name="cedulaIntegrante" id="cedulaIntegrante" class="validate" value="<?php echo $integrate->cedulaIntegrante ?>" disabled>
                                <label for="cedulaIntegrante">Cedula</label>
                            </div>
                            <div class="input-field col s12 m6 xl4">
                                <i class="icon-date_range prefix grey-text"></i>
                                <input type="text" name="fechaNacimiento" id="fechaNacimiento" class="validate" value="<?php $fecha = $integrate->fechaNacimiento; $cambiofecha = date_create($fecha); echo date_format($cambiofecha, 'd/m/Y'); ?>" disabled>
                                <label for="fechaNacimiento">Fecha Nacimiento</label>
                            </div>
                            <div class="input-field col s12 m6 xl4">
                                <i class="icon-contact_phone prefix grey-text"></i>
                                <input type="text" name="telefonoIntegrante" id="telefonoIntegrante" class="validate" value="<?php echo $integrate->telefonoIntegrante ?>" disabled>
                                <label for="telefonoIntegrante">Teléfono</label>
                            </div>
                            <div class="input-field col s12 m6 xl4">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input type="text" name="emailIntegrante" id="emailIntegrante" class="validate" value="<?php echo $integrate->emailIntegrante ?>" disabled>
                                <label for="emailIntegrante">E-mail</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="icon-wc prefix grey-text"></i>
                                <select name="sexoIntegrante" id="sexoIntegrante" disabled>
                                    <option><?php echo $integrate->sexoIntegrante?></option>
                                </select>
                                <label for="sexoIntegrante">Sexo</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="icon-face prefix grey-text"></i>
                                <select name="rolPersona" id="rolPersona" disabled>
                                    <option><?php echo $integrate->rolPersona?></option>
                                </select>
                                <label for="rolPersona">Rol</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" name="codigoCarnetPatria" id="codigoCarnetPatria" class="validate" value="<?php echo $integrate->codigoCarnetPatria; ?>" disabled>
                                <label for="codigoCarnetPatria">Código Carnet de la Patria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" name="serialCarnetPatria" id="serialCarnetPatria" class="validate" value="<?php echo $integrate->serialCarnetPatria; ?>" disabled>
                                <label for="serialCarnetPatria">Serial Carnet de la Patria</label>
                            </div>
                            <div class="col s12 m6 input-field center-align">
                                <a href="<?php echo $helper->url('IntegranteFamilia','vistaUpdateIntegrante')?>&idIntegrante=<?php echo $integrate->idIntegrante?>" class="btn waves-effect waves-light blue-45deg-gradient-1 modal-trigger col s12"><i class="icon-update left"></i>Actualizar</a>
                            </div>
                            <div class="col s12 m6 input-field center-align">
                                <button id="elimina-miembro" class="btn red-45deg-gradient-1 col s12" ><i class="icon-delete_forever left"></i>Eliminar</button>
                            </div>
                        </div>                               
                    </form>
                </div>
                <?php  endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/helperCLAP.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Familia/eliminaIntegranteAjax.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Familia/actualizaIntegrante.js"></script>
</body>
</html>