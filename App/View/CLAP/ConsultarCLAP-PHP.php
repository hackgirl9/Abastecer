<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar CLAP</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="loader" id="preloader">
        </div>
        <div class="section">
            <div class="container" id="main-content">
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Listado de CLAP</h3>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <form action="<?php echo $helper->url('CLAP','getByParroquia'); ?>" method="post" class="row">
                                <div class="col s12 m8 l8 xl8 input-field">
                                    <i class="icon-map prefix grey-text"></i>
                                    <select name="parroquia">
                                        <option disabled selected>Elige una opción</option>
                                        <option>Buena Vista</option>
                                        <option>Catedral</option>
                                        <option>Concepción</option>
                                        <option>Felipe Alvarado</option>
                                        <option>Juan de Villegas</option>
                                        <option>Juarez</option>
                                        <option>Santa Rosa</option>
                                        <option>Tamaca</option>
                                        <option>Unión</option>
                                    </select>
                                    <label>Parroquia</label>
                                </div>
                                <div class="input-field col s12 m4 l4 xl4 center-align">
                                    <button type="submit" class="btn orange-45deg-gradient-1 waves-effect waves-light col s12" name="action">Filtrar<i class="icon-filter_list right"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12">
                            <!-- Verifica si existen registros o no. -->
                            <?php if($allClaps == null): ?>
                            <h5 class="center-align">No existen Registros.</h5>
                            <?php endif; ?>
                            <?php if($allClaps != null): ?>
                            <table class="centered highlight responsive-table lateral-scrollbar" id="test">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Comunidad</th>
                                        <th>Parroquia</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($allClaps as $clap): ?>
                                    <tr>
                                        <td><?php echo $clap->nombreClap; ?></td>
                                        <td><?php echo $clap->nombreComunidad; ?></td>
                                        <td><?php echo $clap->parroquia; ?></td>
                                        <td><?php if($clap->estado == 1){ echo "<button class='btn-small green-45deg-gradient-1'><i class='icon-done'></i></button>"; } elseif($clap->estado == 0){ echo "<button class='btn-small red-45deg-gradient-1'><i class='icon-close'></i></button>"; } ?></td>
                                        <td><a href="<?php echo $helper->url('CLAP', 'details'); ?>&idClap=<?php echo $clap->idClap; ?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="col s12 center-align">
                                <?php $page = 1; $next = ($page + 1); $previous = ($page - 1); // Control de paginacion ?>
                                <ul class="pagination">
                                    <?php if($page <= 1): ?>
                                    <li class="disabled"><a href="#"><i class="icon-navigate_before"></i></a></li>
                                    <?php endif; if($page > 1): ?>
                                    <li class="waves-effect"><a href="<?php $page = $_GET['p']; echo $helper->url('CLAP','readData')?>&p=<?php echo $previous; ?>"><i class="icon-navigate_before"></i></a></li>
                                    <?php endif; ?>
                                    <?php for($i = 1; $i <= $totalPagina; $i++): ?>
                                    <li class="<?php if(isset($page)&& $page == $i){ echo "active teal-45deg-gradient-1"; } ?>"><a href="<?php echo $helper->url('CLAP','readData')?>&p=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    <?php endfor; ?>
                                    <?php if($page == $totalPagina): ?>
                                    <li class="disabled"><a href="#!"><i class="icon-navigate_next"></i></a></li>
                                    <?php endif; if($page != $totalPagina): ?>
                                    <li class="waves-effect"><a href="<?php echo $helper->url('CLAP','readData')?>&p=<?php echo $next; ?>"><i class="icon-navigate_next"></i></a></li>
                                    <?php endif; ?>
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
</body>
</html>