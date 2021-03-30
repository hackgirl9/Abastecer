<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicio - Abastecer C.A.</title>
    <link rel="stylesheet" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <!-- 1. Row -->
                <div class="row">
                    <!-- 2 cards by rows -->
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/CLAP_Icon-1.png" class="activator">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar CLAP</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home','clapHome'); ?>" class="btn btn-large red-45deg-gradient-1"><i class="icon-streetview right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/Family_Icon-1.png" class="activator responsive-img">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Familia</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home','familiaHome'); ?>" class="btn btn-large cyan-45deg-gradient-1"><i class="icon-people_outline right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/Atention_Icon-1.png" class="activator">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Atención</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home','atencionHome'); ?>" class="btn btn-large teal-45deg-gradient-1"><i class="icon-local_mall right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/Solicitud_Icon-1.png" class="activator responsive-img">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Solicitud</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home','solicitudHome'); ?>" class="btn btn-large light-green-45deg-gradient-1"><i class="icon-work right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/Advice_Icon.png" class="activator">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Denuncia</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home','denunciaHome'); ?>" class="btn btn-large orange-45deg-gradient-1"><i class="icon-assignment right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/Report_Icon-1.png" class="activator responsive-img">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Reportes</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Reporte','index'); ?>" class="btn btn-large blue-45deg-gradient-1"><i class="icon-voice_chat right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                    <?php if($_SESSION['ROLUSUARIO']=='SuperUsuario'):?>

                    <div class="col s12 m6 l6 xl4 show-on-medium">
                        <div class="card medium">
                            <div class="card-image waves-effect waves-block waves-light">
                                <img src="Assets/img/SuperUser_Icon-1.png" class="activator responsive-img">
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align activator grey-text text-darken-4">Gestionar Usuarios</span>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Home', 'usuarioHome'); ?>" class="btn btn-large purple-45deg-gradient-1"><i class="icon-voice_chat right"></i>Comenzar</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif;?>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
</body>
</html>