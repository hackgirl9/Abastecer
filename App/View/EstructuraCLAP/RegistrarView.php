<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Estructura CLAP</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="section">
                        <h3 class="center-align black-text">Estructura CLAP</h3>
                    </div>
                    <div class="col s12">
                        <form action="" method="post" class="row">
                            <div class="col s12 m4 input-field">
                                <!-- <i class="icon-map prefix grey-text"></i> -->
                                <select name="parroquia" id="parroquia" required>
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
                            <div class="col s12 m4 input-field">
                                <!-- <i class="icon-streetview prefix grey-text"></i> -->
                                <select name="idClap" id="idClap" required>
                                    <option disabled selected>Seleccione CLAP</option>
                                </select>
                                <label>CLAP</label>
                            </div>
                            <div class="col s12 m4 input-field center-align">
                                <button type="submit" class="btn orange-45deg-gradient-1 darken-1 waves-effect waves-light col s12" name="action">Filtrar
                                    <i class="icon-filter_list right"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                    <div class="col s12">
                        <table class="centered highlight">
                            <thead>
                                <tr>
                                    <th>Organización</th>
                                    <th>Representante</th>
                                    <th>Teléfono</th>
                                    <th>Correo</th>
                                    <th>Actualizar</th>
                                    <th>Eliminar</th>
                                </tr>
                            </thead>
                            <!-- Modal 1 -->
                            <?php require_once "form_update.php"; ?>
                            <!-- modal2 -->
                            <div id="modal-2" class="modal">
                                <div class="modal-content">
                                    <h4 class="center-align yellow-text text-darken-2">Eliminar Integrante</h4>
                                <div class="divider"></div>
                                    <p><span class="new badge red left" data-badge-caption="Confirmación"></span>¿Desea eliminar el integarnte de la estructura CLAP ??? de la base de datos?</p>
                                </div>
                                <div class="modal-footer">
                                    <a href="RegistrarEstructuraView.php" class="modal-action modal-close waves-effect btn green"><i class="icon-check right"></i>SI</a>
                                    <a href="" class="modal-action modal-close waves-effect btn red"><i class="icon-close right"></i>NO</a>
                                </div>
                            </div>
                            <!-- Table body -->
                            <tbody>
                                <tr>
                                    <td>UBCH</td>
                                    <td>Juan Pérez</td>
                                    <td>04121234567</td>
                                    <td>luissuares@correo.com</td>
                                    <td><a href="#modal-1" class="btn-floating waves-effect waves-light blue-45deg-gradient-1 modal-trigger"><i class="icon-update"></td>
                                    <td><a href="#modal-2" class="btn-floating waves-effect waves-light red-45deg-gradient-1  modal-trigger"><i class="icon-delete"></i></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php require_once("View/Public/footer.php"); ?>
    <script type="text/javascript" src="Assets/js/jquery-3.2.1.min.js"></script>
    <script type="text/javascript" src="Assets/js/materialize.min.js"></script>
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Estructura.js"></script>
</body>
</html>