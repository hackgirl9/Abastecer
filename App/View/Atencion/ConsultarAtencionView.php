<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consultar Atención</title>
    <link rel="stylesheet" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div id="preloader" class="loader">
        </div>
        <div class="section">
            <div class="container hide" id="main-content">
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Listado de Atenciones</h3>
                    </div>
                    <div class="row">
                        <div class="col s12">
                            <form action="" method="post" class="row" id="form-filter">
                                <div class="col s12 m4 l4 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <input type="text" id="desde" name="desde" class="datepicker" required>
                                    <label for="desde">Desde</label>
                                </div>
                                <div class="col s12 m4 l4 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <input type="text" id="hasta" name="hasta" class="datepicker" required>
                                    <label for="hasta">Hasta</label>
                                </div>
                                <div class="input-field col s12 m4 l4 xl4 center-align">
                                    <button class="btn orange-45deg-gradient-1 darken-1 waves-effect waves-light col s12" type="submit" id="filtrar">Filtrar
                                        <i class="icon-filter_list right"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="col s12">
                            <table class="centered highlight" id="table-atencion">
                                <thead>
                                    <tr>
                                        <th>Fecha de Atención</th>
                                        <th>Parroquia</th>
                                        <th>CLAP</th>
                                        <th>Acción</th>
                                    </tr>
                                </thead>
                                    <tbody id="consult-atencion">

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
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Atencion/AtencionesAll.js"></script>
</body>
</html>