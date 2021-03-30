<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles Solicitud</title>
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
                <?php foreach($datos as $users):
                    if($users->idSolicitud==$id){
                    ?> 
                    <form action="<?php echo $helper->url('Solicitud','Actualizar')?>" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text"> <?php echo "Solicitud N° $users->nOficio"; /*recore un objeto*/?></h3>
                        </div>
                        <input type="hidden" name="idSolicitud" id="" value="<?php echo $users->idSolicitud; ?>">
                        <div class="row">    
                            <div class="section"></div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-person_pin prefix grey-text"></i>
                                <input type="text" name="nameSolicitante" id="" value="<?php echo $users->nombreIntegrante; ?>" disabled>
                                <label for="nameSolicitante">Nombre del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-person_pin prefix grey-text"></i>
                                <input type="text" name="ciSolicitante" id="" value="<?php echo $users->apellidoIntegrante; ?>" disabled>
                                <label for="lastnameSolicitante">Apellido del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-contact_mail prefix grey-text"></i>
                                <input type="text" name="ciSolicitante" id="" value="<?php echo $users->cedulaIntegrante; ?>" disabled>
                                <label for="ciSolicitante">Cedula del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-markunread prefix grey-text"></i>
                                <input type="email" name="emailSolicitante" id="" value="<?php echo $users->emailIntegrante; ?>" disabled>
                                <label for="emailSolicitante">E-mail del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone_iphone prefix grey-text"></i>
                                <input type="text" name="telfSolicitante" id="" value="<?php echo $users->telefonoIntegrante; ?>" disabled>
                                <label for="telfSolicitante">Teléfono del Solicitante</label>
                            </div><div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-dialpad prefix grey-text"></i>
                                <input type="text" name="numOficio" id="" value="<?php echo $users->nOficio; ?>" disabled>
                                <label for="numOficio">Número de Oficio</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <label for="date"  id="">Fecha Solicitud</label>
                                <input type="text" id="fecha" name="fechaSolicitud" value="<?php echo $users->fechaSolicitud; ?>" class="datepicker validate">
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-import_export prefix grey-text"></i>
                                <select disabled>
                                    <option value=""><?php echo $users->statusSolicitud?></option>
                                    <option value="remitido">Remitido</option>
                                    <option value="denegado">Denegado</option>
                                </select>
                                <label>Status</label>
                            </div>
                            <div class="col s12 input-field">
                                <i class="icon-insert_comment prefix grey-text"></i>
                                <textarea id="" class="materialize-textarea"name="beneficio"><?php echo $users->beneficioSolicitud; ?></textarea>
                                <label id="beneficioSolicitud"  for="beneficio">Beneficio</label>
                            </div>
                        </div>
                        <div class="col s12 center-align buttons section">
                            <div class="row">
                                <div class="col12 s6 m6 xl6">
                                    <button type="submit"  class="btn blue-45deg-gradient-1 waves-effect col s12"><i class="icon-update left"></i>Actualizar</button>
                                   <!-- <a href=" " id="actualizar" class="btn blue waves-effect col s12"><i class="icon-settings_backup_restore left"></i>Actualizar</a>-->
                                </div>
                                    
                               <?php  } endforeach;?>  
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
</body>
</html>