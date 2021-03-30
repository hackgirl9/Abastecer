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
    <link rel="stylesheet" type="text/css" href="actualizarView.php">
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
                    <form action="" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text"> <?php echo "Solicitud N° $users->nOficio"; /*recore un objeto*/?></h3>
                        </div>
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
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="material-icons icon-dialpad prefix grey-text"></i>
                                <input type="text" name="numOficio" id="" value="<?php echo $users->nOficio; ?>" disabled>
                                <label for="numOficio">Número de Oficio</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <label for="date" name="fechaSolicitud" id="">Fecha Solicitud</label>
                                <input type="text" id="fecha"  value="<?php echo $users->fechaSolicitud; ?>" name="date" class="datepicker validate" disabled>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-insert_comment prefix grey-text"></i>
                                <textarea id="" class="materialize-textarea" disabled><?php echo $users->beneficioSolicitud; ?></textarea>
                                <label id="beneficioSolicitud" for="textarea1">Beneficio</label>
                            </div>
                            <div class="col s12 m6 xl4  input-field">
                                <i class="icon-import_export prefix grey-text"></i>
                                <select disabled>
                                    <option value=""><?php echo $users->statusSolicitud; ?></option>
                                    <option value="1" >Remitido</option>
                                    <option value="2">Denegado</option>
                                </select>
                                <label>Status</label>
                            </div>
                        </div>
                        <div class="col s12 center-align buttons section">
                            <div class="row">
                                <div class="col s12 m6 xl4">
                                    <a href="<?php echo $helper->url('Solicitud','redirectUpdate'); ?>&id=<?php echo $users->idSolicitud  ?>" id="actualizar" class="btn waves-effect col s12 blue-45deg-gradient-1"><i class="icon-settings_backup_restore left"></i>Actualizar</a>
                                </div>
                                <div class="col s12 m6 xl4">
                                        <a href="<?php echo $helper->url('Solicitud','redirectUpdate2')?>&id=<?php echo $users->idSolicitud?>&status=<?php echo $users->statusSolicitud?>" class="btn green-45deg-gradient-1 waves-effect col s12"><i class="icon-business_center left"></i>Atender</a>
                                 </div>
                                <div class="col s12 m6 xl4">
                                    <!-- Boton que activa la ventana modal -->
                                    <a href="#modal1" class="btn red-45deg-gradient-1 waves-effect modal-trigger col s12"><i class="icon-delete_forever left" ></i>Eliminar</a>
                                    <!-- Estructura del Modal -->
                                    <div id="modal1" class="modal-delete modal modal-fixed-footer modal-delete">
                                        <div class="modal-content">
                                            <h4 class="yellow-text text-darken-3">Eliminar Solicitud n° 12234</h4>
                                            <div class="divider"></div>
                                            <p><span class="new badge red left" data-badge-caption="Confirmación"></span>¿Desea eliminar la solicitud de la base de datos?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?php echo $helper->url('Solicitud','delete') ?>&id=<?php echo $users->idSolicitud ?>"  class="modal-action modal-close waves-effect btn green-45deg-gradient-1"><i class="icon-check right"></i>SI</a>
                                            <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>NO</a>
                                        </div>
                                    </div>
                                </div>
                                   <?php
                                    }
                                endforeach;
                                 ?>            
                               
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