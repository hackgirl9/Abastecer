<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Denuncia</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
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
                        <h3 class="center-align black-text">Registrar Denuncia</h3>
                    </div>
                    <div class="row">
                        <form action="" id="form-CI" method="post" accept-charset="utf-8" class="col s12">
                            <div class="row">
                                <div class="col s12 m6 input-field">
                                     <i class="icon-contact_mail prefix grey-text"></i>
                                     <input type="text" name="ciDenunciante" id="cedula" class="validate" minlength="7" maxlength="8" pattern="[0-9]+" title="Introducir cedula registrada en el sistema" required>
                                     <label for="cedula">Cedula del Denunciante</label>
                                </div>
                                <div class="col s12 m6  input-field center-align">
                                    <button class="btn indigo-45deg-gradient-1 waves-effect col s12" type="submit" id="buscar"><i class="icon-search right"></i>Buscar</button>
                                </div>
                            </div>
                        </form>
                        <form action="" id="form-main" method="post" class="col s12">
                            <div class="row">            
                                <div class="col s12 m6 xl4 input-field">                                     
                                    <i class="icon-map prefix grey-text"></i>
                                    <input type="text" name="parroquia" placeholder="" id="parroquia" class="validate"> <label for="parroquia">Parroquia</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <input type="text" name="clap" placeholder="" id="clap" class="validate">
                                    <label>CLAP</label>
                                </div>        
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <input type="text" name="clap" placeholder="" id="nombre" class="validate">
                                    <label>Nombre:</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <input type="text" name="clap" placeholder="" id="apellido" class="validate">
                                    <label>Apellido</label>
                                </div>        
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-streetview prefix grey-text"></i>
                                    <input type="text" name="clap" placeholder="" id="comunidad" class="validate">
                                    <label>Comunidad</label>
                                </div>                                    
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-phone_iphone prefix grey-text"></i>
                                    <input type="text" name="telfDenunciante" placeholder="" id="telf" class="validate">
                                    <label for="telfDenunciante">Teléfono del Denunciante</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-dialpad prefix grey-text"></i>
                                    <input type="text" placeholder="" name="numOficio" id="nOficio" class="validate">
                                    <label for="numOficio">Número de Oficio</label>
                                </div>
                                <div class="col s12 m6 xl4 input-field">
                                    <i class="icon-date_range prefix grey-text"></i>
                                    <label for="fecha">Fecha Denuncia</label>
                                    <input type="text" id="fecha" name="date" class="datepicker validate" required>
                                </div>
                                <div class="col s12 input-field">
                                    <i class="icon-import_export prefix grey-text"></i>
                                    <label for="status">Status</label>
                                    <input type="text" id="status" name="date" placeholder="" class="validate">
                                </div>
                                <div class="col s12 input-field">
                                    <i class="icon-insert_comment prefix grey-text"></i>
                                    <textarea id="textarea1" name="descripcion" class="materialize-textarea" pattern="[a-zA-Z]+" title="Solo letras y numeros" required></textarea>
                                    <label for="textarea1">Motivo</label>
                                </div>
                                <div class="col s12 center-align buttons section">
                                    <button type="submit"  name="register" id="enviar" class="btn indigo-45deg-gradient-1 waves-effect"><i class="icon-add_box right"></i>Registrar</button>
                                    <div id="preloader"></div>            
                                </div>
                            </div>
                        </form>

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
    <script type="text/javascript" src="Assets/js/AJAXController/Denuncia/Denuncia.js"></script>
</body>
</html>