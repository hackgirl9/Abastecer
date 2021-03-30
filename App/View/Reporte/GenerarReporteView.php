<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Gestionar Reportes</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/dashboard.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css"> 
    <link rel="stylesheet" type="text/css" href="Assets/css/material_lite.css">
</head>

<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Gestión de Reportes</h3>
                    </div>
                    <!-- CLAPS -->
                    <div class="col s12">
                        <div class="card card-dashboard hoverable">
                            <div class="card-header red-top-gradient-1">
                                <div class="row">
                                    <div class="col s12">
                                        <h4 class="title title-table">CLAP's.</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <?php if ($allClaps == null) : ?>
                                <h5 class="center-align">No existen registros.</h5>
                                <?php endif; ?>
                                <?php if ($allClaps != null) : ?>
                                <table id="clap" class="table highlight responsive-table centered ">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Comunidad</th>
                                            <th>Parroquia</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allClaps as $clap) : ?>
                                        <tr>
                                            <td><?php echo $clap->nombreClap; ?></td>
                                            <td><?php echo $clap->nombreComunidad; ?></td>
                                            <td><?php echo $clap->parroquia; ?></td>
                                            <td><a href="<?php echo $helper->url('Reporte', 'getClapReport'); ?>&idClap=<?php echo $clap->idClap; ?>" class="btn-small btn-floating red-45deg-gradient-1"><i class="icon-insert_drive_file"></a></td>
                                            <!-- <td><button class="btn-small btn-floating red-45deg-gradient-1 clap-report" value="<?php echo $clap->idClap; ?>"><i class="icon-insert_drive_file"></i></button></td> -->
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                            <!-- <div class="card-action center-align">
                                <a href="<?php // echo $helper->url('Reporte','getPDF'); ?>" class="btn btn-large red-45deg-gradient-1" id="clap-pdf"><i class="icon-insert_drive_file right"></i>PDF</a>
                            </div> -->
                        </div>
                    </div>
                    <!-- Solicitudes -->
                    <div class="col s12 m12">
                        <div class="card card-dashboard hoverable">
                            <div class="card-header indigo-top-gradient-1">
                                <div class="row">
                                    <div class="col s12">
                                        <h4 class="title title-table">Solicitudes.</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <?php if ($allSolicitud == null) : ?>
                                    <h5 class="center-align">No existen registros.</h5>
                                <?php endif; ?>
                                <?php if ($allSolicitud != null) : ?>
                                <table id="solicitud" class="table responsive-table highlight centered ">
                                    <thead>
                                        <tr>
                                            <th>N° Solicitud</th>
                                            <th>Solicitante</th>
                                            <th>Status</th>
                                            <th>PDF</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($allSolicitud as $solicitud) : ?>
                                        <tr>
                                            <td><?php echo $solicitud->nOficio ?></td>
                                            <td><?php echo $solicitud->cedulaIntegrante ?></td>
                                            <td><?php echo $solicitud->statusSolicitud ?></td>
                                            <td>
                                                <a href="<?php echo $helper->url('Reporte', 'solicitudPdfInd'); ?>&idSolicitud=<?php echo $solicitud->idSolicitud; ?>" class="btn-small btn-floating indigo-top-gradient-1"><i class="icon-insert_drive_file"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                        
                                </table>
                                <?php endif ?>
                            </div>
                             <?php // if (!isset($parroquia)) { ?>
                            <!-- <div class="card-action center-align">
                                <a href="<?php // echo $helper->url('Reporte', 'solicitudPDF') ?>"><button type="button" id="denunciaPDF" class="btn btn-large indigo-top-gradient-1"><i class="icon-insert_drive_file right"></i>PDF</button></a>
                            </div> -->
                            <?php 
                        //} else { ?>
                            <!-- <div class="card-action center-align">
                                <a href="<?php //echo $helper->url('Reporte', 'filtrarSolicitudPDF') ?>&parroquia=<?php //echo $parroquia ?>"><button type="button" id="denunciaPDF" class="btn btn-large indigo-top-gradient-1"><i class="icon-insert_drive_file right"></i>PDF</button></a>
                            </div> -->
                            <?php 
                        //} ?>
                        </div>
                    </div>
                    <!-- Denuncias -->
                    <div class="col s12">
                        <div class="card card-dashboard hoverable">
                            <div class="card-header purple-top-gradient-1">
                                <div class="row">
                                    <div class="col s12">
                                        <h4 class="title title-table">Denuncias.</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="card-content">
                                <?php if ($allDenuncias == null) : ?>
                                    <h5 class="center-align">No existen registros.</h5>
                                <?php endif; ?>
                                <?php if ($allDenuncias != null) : ?>
                                <table id="denuncia" class="table responsive-table highlight centered">
                                    <thead>
                                        <tr>
                                            <th>N° Denuncia</th>
                                            <th>Fecha</th>
                                            <th>Denunciante</th>
                                            <th>Estatus</th>
                                        </tr>
                                    </thead>
                                    <tbody id="table-denuncia">
                                        <?php foreach ($allDenuncias as $denuncia) : ?>
                                        <tr>
                                            <td><?php echo $denuncia->nControl; ?></td>
                                            <td><?php echo $denuncia->fechaDenuncia; ?></td>
                                            <td><?php echo $denuncia->cedulaIntegrante; ?></td>
                                            <td><?php echo $denuncia->statusDenuncia; ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                                <?php endif; ?>
                            </div>
                            <?php // if (!isset($fecha1) && !isset($fecha2)) { ?>
                            <!-- <div class="card-action center-align">
                                <a href="<?php // echo $helper->url('Reporte', 'denunciaPDF') ?>"><button type="button" id="denunciaPDF" class="btn btn-large purple-45deg-gradient-1"><i class="icon-insert_drive_file right"></i>PDF</button></a>
                            </div> -->
                            <?php 
                        //} else { ?>
                            <!-- <div class="card-action center-align">
                                <a href="<?php // echo $helper->url('Reporte', 'filtrarDenunciasPDF') ?>&date1=<?php // echo $fecha1 ?>&date2=<?php // echo $fecha2 ?>"><button type="button" id="denunciaPDF" class="btn btn-large purple-45deg-gradient-1"><i class="icon-insert_drive_file right"></i>PDF</button></a>
                            </div> -->
                            <?php 
                        //} ?>
                        </div>
                    </div>
                    <!-- Atenciones -->
                    <div class="col s12">
                        <div class="card card-dashboard hoverable">
                            <div class="card-header teal-top-gradient-1">
                                <div class="row">
                                    <div class="col s12">
                                        <h4 class="title title-table">Atenciones.</h4>
                                    </div>
                                </div>
                            </div>
                                <div class="card-content">
                                    <table id="atencion" class="table responsive-table highlight centered ">
                                        <?php if ($allAtencion == null) : ?>
                                            <h5 class="center-align">Ninguna atención registrada aun.</h5>
                                        <?php endif; ?>

                                        <?php if ($allAtencion != null) : ?>
                                            <thead>
                                            <tr>
                                                <th>CLAP</th>
                                                <th>Parroquia</th>
                                                <th>Última Atención</th>
                                                <th>PDF</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            <?php foreach ($allAtencion as $atencion) : ?>
                                                <tr>
                                                    <td><?php echo $atencion->nombreClap ?></td>
                                                    <td><?php echo $atencion->parroquia ?></td>
                                                    <td><?php echo $atencion->fechaAtencion ?></td>
                                                    <td><a href="<?php echo $helper->url('Reporte', 'atencionPDF'); ?>&idAtencion=<?php echo $atencion->idAtencion; ?>" class="btn-small btn-floating teal-45deg-gradient-1"><i class="icon-insert_drive_file"></a></td>
                                                </tr>
                                            <?php endforeach; ?>

                                            </tbody>
                                        <?php endif; ?>
                                    </table>
                                </div>
                            <!-- <div class="card-action center-align">
                                <a href="" class="btn btn-large teal-45deg-gradient-1"><i class="icon-insert_drive_file right"></i>PDF</a>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/datatables.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Reporte.js"></script>


    <script type="text/javascript">
        
        $(document).ready(function() {

            $('#clap').DataTable({
                "pageLength":5,
                "language": {
                    "search":"Buscar:  ",
                    "lengthMenu": "",
                    "zeroRecords": "Upps, No Se Encontraron Datos",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No Hay Registro Para Mostrar",
                    "infoFiltered": "(Filtro De _MAX_ Resultado)",
                    "paginate":{
                        "first":"<i class='icon-first_page'></i>",
                        "last":"<i class='icon-last_page'></i>",
                        "next":"<i class='icon-navigate_next'></i>",
                        "previous":"<i class='icon-navigate_before'></i>"
                    },
                }
            });

           
            $('#solicitud').DataTable({
                "pageLength":5,
                "language": {
                    "search":"Buscar:",
                    "lengthMenu": "",
                    "zeroRecords": "Upps, No Se Encontraron Datos",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No Hay Registro Para Mostrar",
                    "infoFiltered": "(Filtro De _MAX_ Resultado)",

                    "paginate":{
                        "first":"<i class='icon-first_page'></i>",
                        "last":"<i class='icon-last_page'></i>",
                        "next":"<i class='icon-navigate_next'></i>",
                        "previous":"<i class='icon-navigate_before'></i>"
                    },
                }
            });

            $('#denuncia').DataTable({
                "pageLength":5,
                "language": {
                    "search":"Buscar:",
                    "lengthMenu": "",
                    "zeroRecords": "Upps, No Se Encontraron Datos",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No Hay Registro Para Mostrar",
                    "infoFiltered": "(Filtro De _MAX_ Resultado)",
                    "paginate":{
                        "first":"<i class='icon-first_page'></i>",
                        "last":"<i class='icon-last_page'></i>",
                        "next":"<i class='icon-navigate_next'></i>",
                        "previous":"<i class='icon-navigate_before'></i>"
                    },
                }
            });

            $('#atencion').DataTable({
                "pageLength":5,
                "language": {
                    "search":"Buscar:",
                    "lengthMenu": "",
                    "zeroRecords": "Upps, No Se Encontraron Datos",
                    "info": "Pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No Hay Registro Para Mostrar",
                    "infoFiltered": "(Filtro De _MAX_ Resultado)",
                    "paginate":{
                        "first":"<i class='icon-first_page'></i>",
                        "last":"<i class='icon-last_page'></i>",
                        "next":"<i class='icon-navigate_next'></i>",
                        "previous":"<i class='icon-navigate_before'></i>"
                    },
                }
            });
           
            $(".pagination li.active").addClass("teal-45deg-gradient-1");

          });
    </script>
</body>
</html>