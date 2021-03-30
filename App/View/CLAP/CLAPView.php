<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionar CLAP</title>
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
                <div class="row">
                    <ul class="collection">
                        <li class="collection-item avatar">
                            <i class=" icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Registrar CLAP</span>
                            <p>Registra y conforma un nuevo CLAP.</p>
                            <a href="<?php echo $helper->url('CLAP','register'); ?>" class="secondary-content green-text accent-4"><i class="icon-group_add icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Consultar CLAP</span>
                            <p>Consulta los CLAP registrados en la aplicación.</p>
                            <a href="<?php echo $helper->url('CLAP','read'); ?>" class="secondary-content"><i class="icon-search icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Gestionar Estructura CLAP</span>
                            <p>Registra, consulta y elimina las personas que conforma la Estructura de un CLAP.</p>
                            <a href="<?php echo $helper->url('EstructuraCLAP','index'); ?>" class="secondary-content light-green-text"><i class="icon-recent_actors icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Gestionar Empresa Distribuidora</span>
                            <p>Registra, consulta y elimina las empresas distribuidora que abastecen un CLAP.</p>
                            <a href="<?php echo $helper->url('Distribuidora','index'); ?>" class="secondary-content brown-text"><i class="icon-location_city icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Gestionar Enlace Político</span>
                            <p>Registra, consulta y elimina los enlaces políticos que aprueban la conformación de un CLAP.</p>
                            <a href="<?php echo $helper->url('EnlacePolitico','index'); ?>" class="secondary-content indigo-text"><i class="icon-person_pin_circle icon-tam"></i></a>
                        </li>
                        <li class="collection-item avatar">
                            <i class="icon-streetview red-text grey lighten-4 circle icon-tam"></i>
                            <span class="title">Gestionar Cargo</span>
                            <p>Registra, consulta y elimina los enlaces políticos que aprueban la conformación de un CLAP.</p>
                            <a href="<?php echo $helper->url('Cargo','index'); ?>" class="secondary-content blue-text"><i class="icon-assignment icon-tam"></i></a>
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