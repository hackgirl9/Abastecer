<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Familias</title>
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
                        <h3 class="center-align black-text">Listado de Familias</h3>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <form action="<?php echo $helper->url('Familia','filtradoFamilia')?>" method="post" class="row">
                                <div class="col s12 m4 input-field">
                                    <i class="icon-map prefix grey-text"></i>
                                    <select id="parroquia" name="parroquia">
                                        <option disabled selected>Seleccione</option>
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
                                <div class="col s12 m4 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <select id="idClap" name="idClap">
                                        <option disabled selected>Elige un CLAP</option>
                                    </select>
                                    <label>CLAP</label>
                                </div>
                                <div class="input-field col s12 m4 l4 xl4 center-align">
                                    <button class="btn orange-45deg-gradient-1 darken-1 waves-effect waves-light col s12" type="submit" name="action" id="filter-familia">Filtrar<i class="icon-filter_list right"></i></button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12">
                            <table class="centered highlight responsive-table">
                                <thead>
                                    <tr>
                                        <th>Grupo Familiar</th>
                                        <th>Apellido Familiar</th>
                                        <th>Dirección</th>
                                        <th>CLAP</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($allFamily as $family): ?>
                                    <tr>
                                        <td><?php echo $family->grupoFamiliar; ?></td>
                                        <td><?php echo $family->apellidoFamilia; ?></td>
                                        <td><?php echo $family->direccionFamilia; ?></td>
                                        <td><?php echo $family->nombreClap; ?></td>
                                        <td><a href="<?php echo $helper->url('Familia','detailsFamilia')?>&idFamilia=<?php echo $family->idFamilia?>" class="btn-floating waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-pageview"></i></a></td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
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
    <script type="text/javascript" src="Assets/js/AJAXController/helperCLAP.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#filter-familia").attr('disabled', 'disabled');
            $("select[name=idClap]").on("change",function(){
                $("#filter-familia").prop('disabled',false);
            });
        });
    </script>
</body>
</html>