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
            <div class="loader center-align" id="loader-gestionar">

            </div>


            <div class="container hide" id="main-content" >
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Gestionar Usuarios</h3>
                    </div>
                    <div class="col s12">
                        <a href="<?php echo $helper->url('Usuario','redirectRegister'); ?>"class="btn purple-45deg-gradient-1 modal-trigger col s12">
                            <i class="icon-add left"></i>Registrar Nuevo Usuario<i class="icon-person_add right"></i>
                        </a>
                    </div>


                    <div class="col s12 m12">
                        <table class="centered highlight responsive-table" id="test">
                            <thead>
                                <tr>
                                    <th>Usuario</th>
                                    <th>Nombre y Apellido</th>
                                    <th>Rol</th>
                                    <th>Detalles</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <tbody id="consult-usuario">

                            </tbody>
                        </table>
                    </div>
                    <div class="col s12 center-align">
                        <ul class="pagination">

                        </ul>
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
    <script type="text/javascript" src="Assets/js/AJAXController/Usuario.js"></script>
</body>
</html>