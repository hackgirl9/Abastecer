<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estadisticas - Abastecer C.A.</title>
    <link rel="stylesheet" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col xl6 l6 m6 s12">
                        <div class="card-dashboard card-stats hoverable">
                            <div class="card-header red-45deg-gradient-1">
                                <i class="icon-streetview white-text"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">CLAP Registrados:</p>
                                <h3 class="title teal-text text-darken-2"><?php echo $novedades['numCLAP'] ;?></h3>
                            </div>
                            <div class="card-footer center-align">
                                    <a class="waves-effect waves-light red-45deg-gradient-1 btn" href="<?php echo $helper->url('CLAP','read'); ?>">Detalles <i class="icon-info right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col xl6 l6 m6 s12">
                        <div class="card-dashboard card-stats hoverable">
                            <div class="card-header teal-45deg-gradient-1">
                                <i class="icon-add_shopping_cart white-text"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Atenciones a las Comunidades:</p>
                                <h3 class="title teal-text text-darken-2"><?php echo $novedades['numAtenciones'] ;?></h3>
                            </div>
                            <div class="card-footer center-align">
                                    <a class="waves-effect waves-light btn teal-45deg-gradient-1" href="<?php echo $helper->url('Atencion','read'); ?>&p=<?php echo 1 ?>">Detalles <i class="icon-info right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col xl6 l6 m6 s12">
                        <div class="card-dashboard card-stats hoverable">
                            <div class="card-header yellow-45deg-gradient-1">
                                <i class="icon-people_outline white-text"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Familias Beneficiadas:</p>
                                <h3 class="title teal-text text-darken-2"><?php echo $novedades['familiasBene'] ;?></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>
                    <div class="col xl6 l6 m6 s12">
                        <div class="card-dashboard card-stats hoverable">
                            <div class="card-header blue-45deg-gradient-1">
                                <i class="icon-local_mall white-text"></i>
                            </div>
                            <div class="card-content">
                                <p class="category">Bolsas Entregadas:</p>
                                <h3 class="title teal-text text-darken-2"><?php echo $novedades['bolsasEntregadas'] ;?></h3>
                            </div>
                            <div class="card-footer">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col xl12 l12 m12 s12">
                        <div class="card-dashboard hoverable">
                            <div class="card-header purple-top-gradient-1">
                                <h4 class="title title-table">Denuncias.</h4>
                                <p class="category">Úlimas del mes (Sin Resolver).</p>
                            </div>
                            <div class="card-content">
                                <?php if($allDenuncias == null): ?>
                                    <h5 class="center-align">Ninguna denuncia registrada aún.</h5>
                                <?php endif;?>
                                <?php if($allDenuncias != null): ?>
                                <table class="table responsive-table highlight centered">
                                    <thead>
                                        <tr>
                                            <th>N° Denuncia</th>
                                            <th>Fecha</th>
                                            <th>CLAP</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                      <?php foreach ($allDenuncias as $denuncia):?>
                                        <tr>
                                            <td><?php echo $denuncia->nControl;?></td>
                                            <td><?php echo $denuncia->fechaDenuncia;?></td>
                                            <td><?php echo $denuncia->nombreClap;?></td>
                                            <td><?php echo $denuncia->statusDenuncia;?></td>
                                            <td><a href="<?php echo $helper->url('Denuncia','details')?>&idDenuncia=<?php echo $denuncia->idDenuncia; ?>" class="btn-floating waves-effect waves-light purple-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                        </tr>

                                        <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                    <div class="col xl12 l12 m12 s12">
                        <div class="card-dashboard hoverable">
                            <div class="card-header indigo-top-gradient-1">
                                <h4 class="title title-table">Solicitudes.</h4>
                                <p class="category">Últimas del mes (Sin Resolver).</p>
                            </div>
                            <div class="card-content">
                                <?php ?>
                                <?php if($allSolicitud == null): ?>
                                    <h5 class="center-align">Ninguna solicitud registrada aún.</h5>
                                <?php endif;?>
                                <?php if($allSolicitud!= null):  ?>
                                <table class="table responsive-table highlight centered">
                                    <thead>
                                        <tr>
                                            <th>N° Solicitud</th>
                                            <th>Fecha</th>
                                            <th>Solicitante</th>
                                            <th>Estatus</th>
                                            <th>Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                    <?php foreach ($allSolicitud as $solicitud):?>
                                        <tr>
                                            <td><?php echo $solicitud->nOficio;?></td>
                                            <td><?php echo $solicitud->fechaSolicitud;?></td>
                                            <td><?php echo $solicitud->nombreIntegrante ." " .$solicitud->apellidoIntegrante;?></td>
                                            <td><?php echo $solicitud->statusSolicitud;?></td>
                                            <td><a href="<?php echo $helper->url('Solicitud','details')?>&Id=<?php echo $solicitud->idSolicitud; ?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                        </tr>

                                    <?php endforeach;?>
                                    </tbody>
                                </table>
                                <?php endif;?>
                                    </tbody>
                                </table>
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