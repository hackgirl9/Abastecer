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
                    <?php foreach($resultado as $integrate): ?>
                    <form action="<?php echo $helper->url('IntegranteFamilia', 'updateIntegrante');?>" method="post" class="col s12" id="registrar-miembro">
                        <div class="row">
                            <h3 class="black-text center-align">Actualizar Integrante de Familia</h3>
                        </div>
                        <div class="row">
                            <input type="hidden" name="idIntegrante" name="idIntegrante" value="<?php echo $integrate->idIntegrante?>">
                            <input type="hidden" name="idClap" name="idClap" value="<?php echo $integrate->idClap?>">
                            <input type="hidden" name="idFamilia" name="idFamilia" value="<?php echo $integrate->idFamilia?>">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="nombreIntegrante" name="nombreIntegrante" value="<?php echo $integrate->nombreIntegrante?>" minlength="3" maxlength="20" class="validate" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s  ]+">
                                <label for="nombreIntegrante">Nombres</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="apellidoIntegrante" name="apellidoIntegrante" value="<?php echo $integrate->apellidoIntegrante?>" minlength="3" maxlength="20" class="validate" required pattern="[a-zA-ZñÑáéíóúÁÉÍÓÚ\s  ]+">
                                <label for="apellidoIntegrante">Apellidos</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-chrome_reader_mode prefix grey-text grey-text"></i>
                                <input type="text" id="ciIntegrante" name="ciIntegrante" value="<?php echo $integrate->cedulaIntegrante?>" minlength="6" maxlength="8" class="validate" pattern="[0-9]+">
                                <label for="ciIntegrante">Cedula</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <input type="text" id="fechaNacimiento" name="fechaNacimiento" class="datepicker" value="<?php $fecha = $integrate->fechaNacimiento; $cambiofecha = date_create($fecha); echo date_format($cambiofecha, 'd/m/Y'); ?>"  required>
                                <label for="fechaNacimiento">Nacimiento</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-wc prefix grey-text"></i>
                                <select id="sexoIntegrante" name="sexoIntegrante">
                                    <option selected><?php echo $integrate->sexoIntegrante?></option>
                                    <option>F</option>
                                    <option>M</option>
                                    </select>
                                <label for="sexoIntegrante">Sexo</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input type="email" id="emailIntegrante" name="emailIntegrante" value="<?php echo $integrate->emailIntegrante?>" class="validate" minlength="5" maxlength="48">
                                <label for="emailIntegrante">E-mail</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone prefix grey-text grey-text"></i>
                                <input type="text" id="telefonoIntegrante" name="telefonoIntegrante"  value="<?php echo $integrate->telefonoIntegrante?>" minlength="1" maxlength="12" class="validate" pattern="[0-9]+">
                                <label for="telefonoIntegrante">Telefono</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-face prefix grey-text"></i>
                                <select id="rolIntegrante" name="rolIntegrante">
                                    <option selected><?php echo $integrate->rolPersona?></option>
                                    <option>Jefe Hogar</option>
                                    <option>Integrante</option>
                                </select>
                                <label for="rolIntegrante">Rol</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-star prefix grey-text"></i>
                                <select id="manzanero" name="manzanero">
                                    <option selected><?php echo $integrate->manzanero?></option>
                                    <option>No</option>
                                    <option>Si</option>
                                </select>
                                <label for="manzanero">Manzanero</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" id="codCarnet" name="codCarnet" value="<?php echo $integrate->codigoCarnetPatria?>"  minlength="8" maxlength="10" class="validate" pattern="[0-9]+">
                                <label for="codCarnet">Código Carnet de la Patria</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" id="serialCarnet" name="serialCarnet"  value="<?php echo $integrate->serialCarnetPatria?>" minlength="8" maxlength="10" class="validate" pattern="[0-9]+">
                                <label for="serialCarnet">Serial Carnet de la Patria</label>
                            </div>
                            <div class="input-field col s12 m6">
                                <button type="submit" class="waves-effect btn blue-45deg-gradient-1 col s12" name="update"><i class="icon-check right"></i>Actualizar</button>
                            </div>
                            <div class="input-field col s12 m6">
                                <a href="" class="waves-effect btn red-45deg-gradient-1 col s12"><i class="icon-close right"></i>Cancelar</a>
                            </div>
                        </div>
                    </form>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    
</body>
</html>