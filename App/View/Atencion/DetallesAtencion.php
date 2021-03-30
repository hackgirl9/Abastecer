<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Detalles - Atención</title>
    <link rel="stylesheet" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div class="section">
            <div class="container">
                <div class="row">
                    <form action="" method="post" class="col s12">
                        <div class="row">
                            <h3 class="center-align yellow-text text-darken-3">Atención - Detalles</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-map prefix grey-text"></i>
                                <select name="parroquia" id="parroquia" disabled>
                                    <option disabled>Elige una opción</option>
                                    <option>Buena Vista</option>
                                    <option>Catedral</option>
                                    <option>Concepción</option>
                                    <option>Felipe Alvarado</option>
                                    <option>Juan de Villegas</option>
                                    <option>Juarez</option>
                                    <option>Santa Rosa</option>
                                    <option>Tamaca</option>
                                    <option selected>Unión</option>
                                </select>
                                <label>Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-find_in_page grey-text prefix"></i>
                                <select name="clap" id="clap" disabled>
                                    <option disabled>Elige una opción</option>
                                    <option selected>Alí Primera</option>
                                    <option>Caminos de Bolivar</option>
                                    <option>La Paz</option>
                                </select>
                                <label for="clap">CLAP</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-insert_invitation grey-text prefix"></i>
                                <input id="fecha" type="text" class="datepicker validate" value="22 June, 2018" disabled>
                                <label for="fecha">Fecha de Atención</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-insert_invitation grey-text prefix"></i>
                                    <input id="fecha" type="text" class="datepicker validate" value="22 June, 2018" disabled>
                                    <label for="fecha">Fecha Limite</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-people_outline grey-text prefix"></i>
                                <input type="number" min="1" id="cantFamilias" name="cantFamilias" class="validate" value="940" disabled>
                                <label for="cantFamilias">Familias Beneficiadas</label>
                            </div>

                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person grey-text prefix"></i>
                                <input type="number" min="1" id="cantFamilias" name="cantFamilias" class="validate" value="940" disabled>
                                <label for="cantPersonas">Personas Beneficiadas</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-group_work grey-text prefix"></i>
                                <select name="operativo" id="operativo" disabled>
                                    <option disabled>Elige una opción</option>
                                    <option selected>Casa por casa</option>
                                    <option>Feria ??</option>
                                    <option>Otro</option>
                                </select>
                                <label for="operativo">Operativo</label>
                            </div>
                            <div class="col s12 input-field">
                                <i class="icon-visibility prefix grey-text"></i>
                                <textarea id="textarea1" class="materialize-textarea" disabled></textarea>
                                <label for="textarea1">Observación</label>
                            </div>
                            <div class="col s12 center-align buttons section">
                            <div class="row">
                                <div class="col s12 m6 xl6 center-align">
                                    <a href="" class="btn blue-45deg-gradient-1 waves-effect col s12"><i class="icon-settings_backup_restore left"></i>Actualizar</a>
                                </div>
                                <div class="col s12 m6 xl6 center-align">
                                    <!-- Boton que activa la ventana modal -->
                                    <a href="#modal1" class="btn red-45deg-gradient-1 waves-effect modal-trigger col s12"><i class="icon-delete_forever left"></i>Eliminar</a>
                                    <!-- Estructura del Modal -->
                                    <div id="modal1" class="modal-delete-att modal modal-fixed-footer modal-delete-att">
                                        <div class="modal-content">
                                            <h4 class="yellow-text text-darken-3">Eliminar Atención al CLAP: Alí Primera</h4>
                                            <div class="divider"></div>
                                            <p class="left-align"><span class="new badge red-top-gradient-1 left" data-badge-caption="Confirmación"></span>¿Desea eliminar la atención de la base de datos?</p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="" class="modal-action modal-close waves-effect btn green-45deg-gradient-1"><i class="icon-check right"></i>SI</a>
                                            <a href="" class="modal-action modal-close waves-effect btn red-45deg-gradient-1"><i class="icon-close right"></i>NO</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
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