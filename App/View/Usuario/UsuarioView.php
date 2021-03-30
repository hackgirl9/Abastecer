<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionar Usuario</title>
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
                <ul class="collection">
                    <li class="collection-item avatar">
                        <i class=" icon-account_circle green-text grey lighten-4 circle icon-tam"></i>
                        <span class="title">Gestionar Usuario</span>
                        <p>Registra, consulta, actualiza y elimina los datos de los usuarios en la aplicación.</p>
                        <a href="<?php echo $helper->url('Usuario','redirectGestionarUsuario'); ?>" class="secondary-content indigo-text accent-4"><i class="icon-contacts icon-tam"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
</body>
</html>