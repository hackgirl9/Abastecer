<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Enlaces Políticos</title>
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
                        <h3 class="center-align black-text">Listado de Enlaces Políticos</h3>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <?php if($allEnlaces == null): ?>
                            <h5 class="center-align">No existen registros.</h5>
                            <?php endif; ?>
                            <?php if($allEnlaces != null): ?>
                            <table class="centered highlight">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Parroquia</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <!-- Modal -->
                                <tbody>
                                    <?php foreach($allEnlaces as $enlace): ?>
                                    <tr>
                                        <td><?php echo $enlace->nombreEnlace; ?></td>
                                        <td><?php echo $enlace->apellidoEnlace; ?></td>
                                        <td><?php echo $enlace->parroquiaEncargado; ?></td>
                                        <td><button value="<?php echo $enlace->idEnlace; ?>" class="enlace-delete tooltipped btn-floating waves-effect waves-light red-45deg-gradient-1" data-position="top" datadelay="5" data-tooltip="Eliminar"><i class="icon-delete_forever"></i></button></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col s12 center-align">
                                <ul class="pagination">
                                    <li class="disabled"><a href="#!"><i class="icon-navigate_before"></i></a></li>
                                    <?php for($i = 1; $i <= $totalPagina; $i++): ?>
                                    <li class="<?php if(isset($_GET['p'])&& $_GET['p']== $i){ echo "active teal-45deg-gradient-1"; } ?>"><a href="<?php echo $helper->url('EnlacePolitico','readData')?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php endfor; ?>
                                    <li class="waves-effect"><a href="#!"><i class="icon-navigate_next"></i></a></li>
                                </ul>
                            </div>
                        <?php endif; ?>
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
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/EnlacePolitico.js"></script>
</body>
</html>