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
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <?php foreach($resultado as $integrate): ?>
                <div class="row">
                    <div class="section">
                        <h3 class="center-align yellow-text text-darken-3">Integrante - Familia</h3>
                    </div>
                    <div class="card">
                        <div class="card-content">
                            <form action="" method="post" class="row">
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-person_pin prefix grey-text"></i>
                                    <input value="<?php echo $integrate->nombreIntegrante?>" disabled>
                                    <label>Nombres</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-person_pin prefix grey-text"></i>
                                    <input class="validate" value="<?php echo $integrate->apellidoIntegrante?>" disabled>
                                    <label>Apellidos</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-chrome_reader_mode prefix grey-text grey-text"></i>
                                    <input value="<?php echo $integrate->cedulaIntegrante?>" disabled required>
                                    <label>Cedula</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <input value="<?php 
                                    $fecha = $integrate->fechaNacimiento;
                                    $cambiofecha = date_create($fecha);
                                    echo date_format($cambiofecha, 'd/m/Y');
                                    ?>" disabled required>
                                    <label>Nacimiento</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-contact_phone prefix grey-text"></i>
                                    <input value="<?php echo $integrate->telefonoIntegrante?>" disabled required>
                                    <label for="telfIntegrante">Teléfono</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-contact_mail prefix grey-text"></i>
                                    <input value="<?php echo $integrate->emailIntegrante?>" disabled required>
                                    <label for="emailIntegrante">E-mail</label>
                                </div>
                                <div class="col s12 m6 input-field">
                                    <i class="icon-wc prefix grey-text"></i>
                                    <select disabled>
                                        <option><?php echo $integrate->sexoIntegrante?></option>
                                    </select>
                                    <label>Sexo</label>
                                </div>
                                <div class="col s12 m6 input-field">
                                    <i class="icon-face prefix grey-text"></i>
                                    <select disabled>
                                        <option><?php echo $integrate->rolPersona?></option>
                                    </select>
                                    <label>Rol</label>
                                </div>
                                <div class="col s12 m6 input-field">
                                    <i class="icon-card_membership prefix grey-text"></i>
                                    <input value="<?php echo $integrate->codigoCarnetPatria?>" disabled >
                                    <label for="codcarnet">Código Carnet de la Patria</label>
                                </div>
                                <div class="col s12 m6 input-field">
                                    <i class="icon-card_membership prefix grey-text"></i>
                                    <input value="<?php echo $integrate->serialCarnetPatria?>" disabled >
                                    <label>Serial Carnet de la Patria</label>
                                </div>
                                <div class="row">
                                    <div class="col s12 m12 xl6 input-field center-align">
                                        <a href="<?php echo $helper->url(Familia,updateIntegrante)?>" class="btn waves-effect waves-light blue-45deg-gradient-1 modal-trigger col s12"><i class="icon-update left"></i>Actualizar</a>
                                    </div>
                                    <div class="col s12 m6 input-field center-align">
                                        <!-- Delete Modal -->
                                        <a href="#modal1" class="btn red-45deg-gradient-1 waves-effect waves-light modal-trigger col s12"><i class="icon-delete_forever left"></i>Eliminar</a>
                                        <!-- Modal Body -->
                                        <div id="modal1" class="modal-delete modal modal-fixed-footer">
                                            <div class="modal-content">
                                                <h4>Eliminar Integrante</h4>
                                                <div class="divider"></div>
                                                <p class="left-align"><span class="new badge red-top-gradient-1 left" data-badge-caption="Confirmación"></span>¿Desea eliminar al Integrante?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?php echo $helper->url('IntegranteFamilia','deleteIntegrante')?>&idIntegrante=<?php echo $integrate->idIntegrante?>" class="modal-action modal-close waves-effect btn green-45deg-gradient-1"><i class="icon-check right"></i>SI</a>
                                                <a href="<?php echo $helper->url('IntegranteFamilia','Anterior')?>" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>NO</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>                               
                            </form>
                        </div>
                    </div>
                </div>
                <?php  endforeach; ?>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
</body>
</html>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
</body>
</html>