<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Solicitud</title>
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
                        <h3 class="center-align black-text">Listado de Solicitudes</h3>
                    </div>
                    <div class="row">
                        <ul id="tabs-swipe-demo" class="tabs center-align">
                            <li class="tab col m6"><a class="active" href="#one">Solicitudes Registradas</a></li>
                            <li class="tab col m6"><a href="#two">Buscar Solicitud</a></li>
                        </ul>
                    </div>
                    <!-- Tab 1 -->

                    <div class="row" id="one">
                        <div class="col s12">
                        <?php  error_reporting(0);if($Alluser == null):?> 
                            <h4 class="center-align">No existen registros.</h4>
                            <?php endif;  ?>
                            <?php if($Alluser !=null): ?>
                            <table class="centered highlight" id="test">
                                <thead>
                                    <tr>
                                        <th>N° Solicitud</th>
                                        <th>Solicitante</th>
                                        <th>Telefono</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($Alluser as $user):/*recore un objeto*/ ?> 
                                    <tr>
                                        <td><?php echo $user->nOficio;/*imprime el  objeto*/ ?></td>
                                        <td><?php echo $user->nombreIntegrante. $user->apellidoIntegrante; ?></td>
                                        <td><?php echo $user->telefonoIntegrante; ?></td>
                                        <td><a href="<?php echo $helper->url('Solicitud','details')?>&Id=<?php echo $user->idSolicitud?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                            <?php endif;  ?>
                        </div>
                        
                    </div>
                    <!-- Tab 2 -->
                    <div id="two" class="col s12">
                        <div class="row">
                            <form action="<?php echo $helper->url('Solicitud','busqueda')?>" method="post" class="col s12">
                                <div class="row">
                                    <div class="col s12 m6 input-field">
                                        <i class="icon-dialpad prefix grey-text"></i>
                                        <input pattern="[0-9]+" title="Introduzca cedula que este en el sistema" 
                                        type="text" name="nOficio" id="numSolicitud">
                                        <label for="numSolicitud">N° de Solicitud</label>
                                    </div>
                                    <div class="col s12 m6 xl4 input-field center-align">
                                    <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" id="consultar" ><i class="icon-search right"></i>Consultar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="row" id="tree">
                            <div class="col s12">
                            <?php if(isset($Busqueda)) { ?>
                                <table class="centered highlight responsive-table" id="consultar">
                                <thead>
                                    <tr>
                                        <th>N° Solicitud</th>
                                        <th>Solicitante</th>
                                        <th>Telefono</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php  foreach($Busqueda as $user):?> 
                                    <tr>
                                        <td><?php echo $user->nOficio?></td>
                                        <td><?php echo $user->nombreIntegrante. $user->apellidoIntegrante; ?></td>
                                        <td><?php echo $user->telefonoIntegrante; ?></td>
                                        <td><a href="<?php echo $helper->url('Solicitud','details')?>&Id=<?php echo $user->idSolicitud?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                                    <?php } else{?>
                                    
                                    <?php }?>

                        </div>
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