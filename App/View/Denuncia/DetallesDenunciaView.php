<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - Denuncia</title>
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
                <?php foreach($datos as $resultado):
                        if($resultado->idDenuncia==$id): ?>
                    <form action="" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align black-text">Denuncia N° <?php echo $resultado->nControl?></h3>
                        </div>
                        <div class="row">
                            <input type="hidden" id="id" name="idDenuncia" class="" value="<?php echo $resultado->idDenuncia?>">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="nameDenunciante" id="nombre" value="<?php echo $resultado->nombreIntegrante?>" disabled>
                                <label for="nameDenunciante">Nombre del Denunciante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="ciDenunciante" id="apellido" value="<?php echo $resultado->apellidoIntegrante?>" disabled>
                                <label for="lastnameDenunciante">Apellido del Denunciante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input type="text" name="ciDenunciante" id="cedula" value="<?php echo $resultado->cedulaIntegrante?>" disabled>
                                <label for="ciDenunciante">Cedula del Denunciante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-markunread prefix grey-text"></i>
                                <input type="email" name="emailDenunciante" id="email" value="<?php echo $resultado->emailIntegrante?>" disabled>
                                <label for="emailDenunciante">E-mail del Denunciante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone_iphone prefix grey-text"></i>
                                <input type="text" name="telfDenunciante" id="telefono" value="<?php echo $resultado->telefonoIntegrante?>" disabled>
                                <label for="telfDenunciante">Teléfono del Denunciante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-dialpad prefix grey-text"></i>
                                <input type="text" name="numControl" id="nControl" value=" <?php echo $resultado->nControl ?>" disabled>
                                <label for="numControl">Número de Control</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" id="clap" value="<?php echo $resultado->nombreClap ?> " disabled>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <input type="text" name="parroquia" id="parroquia" value="<?php echo $resultado->parroquia?>" disabled>
                                <label>Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <input type="text" name="date" id="fecha" class="datepicker validate" value="<?php echo $resultado->fechaDenuncia?>" disabled>
                                <label for="fecha">Fecha</label>
                            </div>
                            <div class="col s12 m6 xl12 input-field">
                                <i class="icon-import_export prefix grey-text"></i>
                                <select name="status" id="status">
                                    <option value="" selected class="grey-text"><?php echo$resultado->statusDenuncia; ?></option>
                                    <option value="Remitido">Remitido</option>
                                    <option value="Denegado">Denegado</option>
                                    <option value="En Proceso">En Proceso</option>
                                </select>
                                <label>Status</label>
                            </div>
                            <div class="col s12 input-field">
                                <i class="icon-insert_comment prefix grey-text"></i>
                                <input type="text" id="motivo" class="" disabled value="<?php echo $resultado->motivo?>">
                                <label for="motivo">Motivo</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field" id="Cbotones">
                                <button id="rActualizar" type="button" class="btn blue-45deg-gradient-1 waves-effect col s12" ><i class="icon-settings_backup_restore left"></i>Actualizar</button>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <button type="button" id="eliminar" class="btn red-45deg-gradient-1 waves-effect col s12"><i class="icon-delete_forever left" ></i>Eliminar</button>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <a href="<?php echo $helper->url("Denuncia","getPDF")?>&Id=<?php echo $resultado->idDenuncia?>" class="btn purple-45deg-gradient-1 darken-2 col s12"><i class="icon-description left"></i>PDF</a> 
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <button id="atender" type="button" class="btn blue-48deg-gradient-1 waves-effect darken-2 col s12"><i class="icon-assignment_turned_in left"></i>Atender</button>
                            </div>
                        </div>
                    </form>
                    <?php endif; endforeach; ?>
                </div>                    
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Denuncia/detallesDenuncia.js"></script> 
    <script type="text/javascript" src="Assets/js/AJAXController/Denuncia/AtenderDenuncia.js"></script>
</body>
</html>