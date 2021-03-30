<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - Estructura CLAP</title>
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
                        <h3 class="center-align black-text">Miembros de la Estructura CLAP</h3>
                    </div>
                    <div class="col s12">
                        <!-- Comprueba si existen datos en la tabla o no. -->
                        <?php if ($allMiembros == null) : ?>
                        <h5 class="center-align">No hay miembros que conformen a este CLAP.</h5>
                        <?php endif; ?>
                        <?php if($allMiembros != null): ?>
                        <table class="centered highlight responsive-table">
                            <thead>
                                <tr>
                                    <th>Miembro</th>
                                    <th>Cargo</th>
                                    <th>CLAP</th>
                                    <th>Status</th>
                                    <th>Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allMiembros as $miembro) : ?>
                                <tr>
                                    <td><?php echo "$miembro->nombreIntegrante $miembro->apellidoIntegrante"; ?></td>
                                    <td><?php echo $miembro->cargoRol; ?></td>
                                    <td><?php echo $miembro->nombreClap; ?></td>
                                    <td><?php if($miembro->statusRol == 1){ echo "<button class='btn-small green-45deg-gradient-1'><i class='icon-done'></i></button>"; } elseif($miembro->statusRol == 0){ echo "<button class='btn-small red-45deg-gradient-1'><i class='icon-close'></i></button>"; } ?></td>
                                    <td><button value="<?php echo $miembro->idRol; ?>" name="idRol" class="miembro-delete tooltipped btn-floating waves-effect waves-light red-45deg-gradient-1" data-position="top" datadelay="5" data-tooltip="Eliminar"><i class="icon-delete_forever"></i></button></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <?php endif; ?>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/Estructura.js"></script>
</body>
</html>