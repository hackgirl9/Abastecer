<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Denuncias</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php")?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Listado de Denuncias</h3>
                    </div>
                    <div class="row">
                        <ul id="tabs-swipe-demo" class="tabs center-align">
                            <li class="tab col m6"><a class="active" href="#one">Denuncias Registradas</a></li>
                            <li class="tab col m6"><a href="#two">Buscar Denuncia</a></li>
                        </ul>
                    </div>
                    <!-- Tab 1 -->
                    <div class="row" id="one">
                        <div class="col s12">
                            <form action="" method="post" class="row" id="form-filter">
                                <div class="col s12 m4 l4 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <input type="text" name="date1" id="desde" class="datepicker" required>
                                    <label for="desde">Desde</label>
                                </div>
                                <div class="col s12 m4 l4 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <input type="text" name="date2" id="hasta" class="datepicker" required>
                                    <label for="hasta">Hasta</label>
                                </div>
                                <div class="input-field col s12 m4 l4 xl4 center-align">
                                    <button class="btn orange-45deg-gradient-1 darken-1 waves-effect waves-light col s12" type="submit" name="action">Filtrar
                                        <i class="icon-filter_list right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12">
                            <table class="centered highlight responsive-table" id="table-denuncia">
                                <thead>
                                    <tr>
                                        <th>N° Denuncia</th>
                                        <th>Fecha</th>
                                        <th>Denunciante</th>
                                        <th>Estatus</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                <tbody id="consult-denuncia">
                             
                                </tbody>
                            </table>
                        </div>
                        <div class="col s12 center-align">
                            <ul class="pagination">

                            </ul>
                        </div>
                    </div>
                    <!-- Tab 2 -->
                    <div id="two" class="col s12">
                        <div class="row">
                            <form id="form-buscar" action="" method="post" class="col s12">
                                <div class="row">
                                    <div class="col s12 m6 input-field">
                                        <i class="icon-dialpad prefix grey-text"></i>
                                        <input type="text" name="numSolicitud" id="numSolicitud" pattern="[0-9]+" title="Introducir Numero De Oficio 'solo numeros'">
                                        <label for="numSolicitud">N° de Denuncia</label>
                                    </div>
                                    <div class="col s12 m6 input-field center-align">
                                        <button class="btn indigo-45deg-gradient-1 waves-effect col s12" type="submit"><i class="icon-search right"></i>Consultar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                         <div class="col s12">
                            <table class="centered highlight" id="test">
                                <thead id="head-table-denuncia">
                                    
                                </thead>
                                <tbody id="consultDenunciaBuscar">
                                   
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
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Denuncia/DenunciaAll.js"></script>

</body>
</html>