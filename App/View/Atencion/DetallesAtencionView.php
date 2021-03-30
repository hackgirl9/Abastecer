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
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
    <main>
        <div id="response-preloader">

        </div>
        <div class="section">
            <div class="container">
                <div class="row">
                    <div class="col s12">
                        <div class="card">
                            <div class="card-content">
                                <span class="card-title center-align black-text" style="font-size:32px;">Detalles - Atención</span>
                                <div class="row">
                                    <div class="col s12 m12">
                                        <ul>
                                            <li id="Parroquia"></li>
                                            <li id="nombreClap"></li>
                                            <li id="FamiliaBenefiaciadas"></li>
                                            <li id="fechaLimite"></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="section">
                                    <form action="" method="post" class="row" id="form-main">
                                        <div class="col s12 m6 xl6 input-field">
                                            <i class="icon-date_range prefix grey-text"></i>
                                            <label for="">Fecha Atención</label>
                                            <input type="text" name="date" id="date" class="datepicker validate" disabled>
                                        </div>
                                        <div class="col s12 m6 xl6 input-field">
                                            <i class="icon-streetview prefix grey-text"></i>
                                            <select name="tipoAtencion" id="tipoAtencion" disabled>
                                                <option disabled>Seleccione Atención</option>
                                                <option value="Casa a Casa">Casa a casa</option>
                                                <option value="Feria del Campo">Feria del Campo</option>
                                                <option value="Otro">Otro</option>
                                            </select>
                                            <label>Tipo de atención</label>
                                        </div>
                                        <div class="col s12 m12 xl12 l12 input-field">
                                            <i class="icon-insert_comment prefix grey-text"></i>
                                            <textarea id="observacion" name="observacion" class="materialize-textarea" disabled></textarea>
                                            <label for="observacion">Descripción</label>
                                        </div>
                                    </form>
                                </div>
                                <div class="row">
                                    <div class="section m6 l4 xl4 s12 mt-1 center-align">
                                        <button type="button" class="btn green-45deg-gradient-1 waves-effect col s12 cen" id="Agregar"><i class="icon-add_circle left"></i>Agregar más beneficiarios</button>
                                    </div>
                                </div>
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
    <script type="text/javascript" src="Assets/js/AJAXController/Atencion/Atencion.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Atencion/detailsAtencion.js"></script>
</body>
</html>