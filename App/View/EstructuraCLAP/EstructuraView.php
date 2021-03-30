<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionar Estructura CLAP</title>
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
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <i class="icon-recent_actors light-green-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Registrar Rol de Miembro</span>
                            <p>Registra el rol de un miembro de la familia para conformar la estructura CLAP.</p>
                            <a href="<?php echo $helper->url('EstructuraCLAP', 'register'); ?>" class="secondary-content green-text accent-4"><i class="icon-group_add icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-recent_actors light-green-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Consultar Miembros de la Estructura</span>
                            <p>Consulta los miembros que conforman la estructura de un CLAP en la aplicación.</p>
                            <a href="<?php echo $helper->url('EstructuraCLAP', 'readData'); ?>" class="secondary-content"><i class="icon-search icon-tam"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/"></script>
</body>
</html>