<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Notificaciones</title>
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
                    <div class="section">
                        <h3 class="center-align black-text">Notificaciones</h3>
                    </div>
                    <?php if ($allNoti == null) : ?>
                        <h5 class="center-align">Ninguna notificación.</h5>
                    <?php endif; ?>

                    <?php if($allNoti != null): ?>
                    <!-- Cards -->
                    <?php foreach ($allNoti as $registerAtencion): ?>
                    <div class="col s12 m6 l6 xl6">
                        <div class="card">
                            <div class="card-image">
                                <a class="pulse btn-floating halfway-fab waves-effect waves-light red"><i class="icon-notifications_active"></i></a>
                            </div>
                            <div class="card-content">
                                <p><b>Atención:</b> CLAP <?php echo $registerAtencion->nombreClap?> debe ser atendido nuevamente.</p>
                                <p><b>Fecha de Atención:</b> <?php echo $registerAtencion->fechaAtencion ?></p>
                            </div>
                            <div class="card-action center-align">
                                <a href="<?php echo $helper->url('Atencion','registerMain');?>">Atender</a>
                                <a href="<?php echo $helper->url('Atencion','details'); ?>&idAtencion=<?php echo $registerAtencion->idAtencion; ?>">Detalles de Atencíon</a>
                            </div>
                        </div>
                    </div>
                    <?php endforeach;?>
                    <?php endif;?>
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