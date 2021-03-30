<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - CLAP</title>
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
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title center-align black-text" style="font-size:32px;">Datos CLAP</span>
                                <div class="divider"></div>
                                <div class="row">
                                    <div class="col s12 m6">
                                        <ul>
                                            <li><b>Nombre del CLAP: </b><?php echo $register->nombreClap; ?></li>
                                            <li><b>Código CLAP: </b><?php echo $register->codigoClap; ?></li>
                                            <li><b>Código Sala: </b><?php echo $register->codigoSala; ?></li>
                                            <li><b>RIF del CLAP: </b><?php echo $register->rifClap; ?></li>
                                            <li><b>Parroquia: </b><?php echo $register->parroquia; ?></li>
                                            <li><b>Comunidad: </b><?php echo $register->nombreComunidad; ?></li>
                                            <li><b>Consejo Comunal: </b><?php echo $register->nombreConsejoComunal; ?></li>                                            
                                            <li><b>RIF Consejo Comunal: </b><?php echo $register->rifConsejoComunal; ?></li>
                                            <li><b>E-mail: </b><?php echo $register->emailClap; ?></li>
                                            <li><b>Teléfono: </b><?php echo $register->tlfClap; ?></li>
                                            <li><b>Limita al norte con: </b><?php echo $register->limiteNorteComunidad; ?></li>
                                        </ul>
                                    </div>
                                    <div class="col s12 m6">
                                        <div class="divider hide-on-med-and-up"></div>
                                        <ul>
                                            <li><b>Limita al sur con: </b><?php echo $register->limiteSurComunidad; ?></li>
                                            <li><b>Limita al este con: </b><?php echo $register->limiteEsteComunidad; ?></li>
                                            <li><b>Limita al oeste con: </b><?php echo $register->limiteOesteComunidad; ?></li>
                                            <li><b>Zona en Silencio: </b><?php echo $register->zonaSilencio ? "Si" : "No"; ?></li>
                                            <li><b>Empresa Distribuidora: </b><?php echo $register->nombreEmpresa; ?></li>
                                            <li><b>Eje: </b><?php echo $register->eje; ?></li>
                                            <li><b>Cantidad de Viviendas: </b><?php echo $register->cantViviendas; ?></li>
                                            <li><b>Cantidad de Familias: </b><?php echo $register->cantFamilias; ?></li>
                                            <li><b>Cantidad de Manzaneros: </b><?php echo $register->cantManzaneros; ?></li>
                                            <li><b>Enlace Político: </b><?php echo "$register->nombreEnlace $register->apellidoEnlace"; ?></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col s12 m4 input-field">
                                        <!-- Update Modal -->
                                        <a href="#clap-update" class="btn light-blue-45deg-gradient-1 waves-effect modal-trigger col s12"><i class="icon-settings_backup_restore left"></i>Actualizar</a>
                                        <?php require_once "UpdateForm.php"; ?>                                  
                                    </div>
                                    <div class="col s12 m4 input-field">
                                        <!-- Delete Button -->
                                        <button class="btn red-45deg-gradient-1 col s12" id="clap-delete"><i class="icon-delete_forever left"></i>Eliminar</button>
                                    </div>
                                    <?php if($register->estado == "1"): ?>
                                    <div class="col s12 m4 input-field">
                                        <button type="button" class="btn yellow-45deg-gradient-1 col s12" id="suspender"><i class="icon-info_outline left"></i>Suspender</button>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($register->estado == "0"): ?>
                                    <div class="col s12 m4 input-field">
                                        <button type="button" class="btn green-45deg-gradient-1 col s12" id="admitir"><i class="icon-info_outline left"></i>Habilitar</button>
                                    </div>
                                    <?php endif; ?>                                    
                                </div>
                            </div>
                        </div>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/CLAP.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/CLAPActualizar.js"></script>
</body>
</html>