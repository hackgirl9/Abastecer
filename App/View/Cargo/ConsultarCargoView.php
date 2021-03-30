<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Cargo</title>
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
                        <h3 class="center-align black-text">Listado de Cargos</h3>
                    </div>
                        <div class="col s12">
                            <!-- Comprueba si existen datos en la tabla o no. -->
                            <?php if ($allCargos == null) : ?>
                            <h5 class="center-align">No existen registros.</h5>
                            <?php endif; ?>
                            <?php if ($allCargos != null) : ?>
                            <table class="centered highlight">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($allCargos as $cargo) : ?>
                                    <tr>
                                        <td><?php echo $cargo->cargoRol; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col s12 center-align">
                                <?php $page = $_GET['p']; $next = ($page + 1); $previous = ($page - 1); // Control de paginacion ?>
                                <ul class="pagination">
                                    <?php if($page <= 1): ?>
                                    <li class="disabled"><a href="#"><i class="icon-navigate_before"></i></a></li>
                                    <?php endif; if($page > 1): ?>
                                    <li class="waves-effect"><a href="<?php echo $helper->url('Cargo','readData')?>&p=<?php echo $previous; ?>"><i class="icon-navigate_before"></i></a></li>
                                    <?php endif; ?>
                                    <?php for($i = 1; $i <= $totalPagina; $i++): ?>
                                    <li class="<?php if($page == $i){ echo "active teal-45deg-gradient-1"; } ?>"><a href="<?php echo $helper->url('Cargo','readData')?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php endfor; ?>
                                    <?php if($page == $totalPagina): ?>
                                    <li class="disabled"><a href="#!"><i class="icon-navigate_next"></i></a></li>
                                    <?php endif; if($page != $totalPagina): ?>
                                    <li class="waves-effect"><a href="<?php echo $helper->url('Cargo','readData')?>&p=<?php echo $next; ?>"><i class="icon-navigate_next"></i></a></li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                            <?php endif; ?>
                        </div>
                    <div class="row">
                    </div>
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