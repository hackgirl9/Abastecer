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
                            <form action="" method="post" class="row" id="clap-filter">
                                <div class="col s12 m8 l8 xl8 input-field">
                                    <i class="icon-map prefix grey-text"></i>
                                    <select name="parroquia" id=parroquia>
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
                            <table class="centered highlight responsive-table lateral-scrollbar" id="table-clap">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Comunidad</th>
                                        <th>Parroquia</th>
                                        <th>Estado</th>
                                        <th>Detalles</th>
                                    </tr>
                                </thead>
                                <tbody id="clap-registers">

                                </tbody>
                            </table>
                            <div class="col s12 center-align">
                                <ul class="pagination">
                                    
                                </ul>
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
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/CLAPConsultar.js"></script>
</body>
</html>