<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionar Enlace Político</title>
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
                            <i class="icon-person_pin_circle indigo-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Registrar Enlace Político</span>
                            <p>Registra un nuevo enlace político.</p>
                            <a href="<?php echo $helper->url('EnlacePolitico','register'); ?>" class="secondary-content green-text accent-4"><i class="icon-group_add icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-person_pin_circle indigo-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Consultar Enlace Político</span>
                            <p>Consulta los enlaces políticos registradas en la aplicación.</p>
                            <a href="<?php echo $helper->url('EnlacePolitico','readData'); ?>&p=1" class="secondary-content"><i class="icon-search icon-tam"></i></a>
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
</body>
</html>