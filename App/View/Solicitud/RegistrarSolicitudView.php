<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Solicitud</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/media.css">
    <link rel="stylesheet" type="text/css" href="Assets/icons/style.css">
    <link rel="stylesheet" type="text/css" href="Assets/css/material-gradient.css">
</head>
<body>
    <?php require_once("View/Public/header.php"); ?>
   
   <main>
    <div id="Solicitud"></div>
        <div class="section">
            <div class="container">
                <div class="row">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Solicitud</h3>
                        </div>
                        <div class="row" >
                            <form id="CI" action="" method="POST" class="s12" >
                             <div class="col s12 m6 xl6 input-field">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input pattern="[9-0]+" required maxlength="8" minlength="7" title="cedula no esta en el sistema" type="text" name="ciSolicitante" id="ciSolicitante" class="validate">
                                <label for="ciSolicitante">Cedula del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl6 center-align buttons section">
                                  <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" id="submit" ><i class="icon-search right"></i>Consultar</button></a>
                            </div>
                        </div>
                            </form>
                       
                        <div class="row">
                            <form action="" method="post" class="col s12" id="form-main">
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text" ></i>
                                <input id="nameSolicitante" type="text" name="nameSolicitante" placeholder=""  class="validate">
                                <label for="nameSolicitante">Nombre del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" name="ciSolicitante" id="lastnameSolicitante" placeholder=""  class="validate">
                                <label for="lastnameSolicitante">Apellido del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-markunread prefix grey-text"></i>
                                <input type="email" name="emailSolicitante" id="emailSolicitante" placeholder="" class="validate">
                                <label for="emailSolicitante">E-mail del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone_iphone prefix grey-text"></i>
                                <input type="text" name="telfSolicitante" id="telfSolicitante" placeholder="" class="validate">
                                <label for="telfSolicitante">Teléfono del Solicitante</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="clap" placeholder="" id="parroquia" class="validate">
                                <label for="parroquia">Parroquia</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="clap" placeholder="" id="clap" class="validate">
                                <label>CLAP</label>
                            </div> 
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="clap" placeholder="" id="comunidad" class="validate">
                                <label>Comunidad</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-dialpad prefix grey-text"></i>
                                <input type="text" name="numOficio" id="nOficio" class="validate">
                                <label for="numOficio">Número de Oficio</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <label for="date" >Fecha Solicitud</label>
                                <input type="text" id="fecha" name="date" class="datepicker validate">
                            </div>
                           
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-streetview prefix grey-text"></i>
                                <input type="text" name="beneficio" placeholder="" id="beneficio" class="validate">
                                <label>tipo de Beneficio</label>
                            </div>
                            
                           
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-import_export prefix grey-text"></i>
                                <input type="text" name="status" placeholder="" id="status" value=" En proceso" class="validate"disabled >
                                <label>Status</label>
                            </div>
                            <div class="col s12 center-align buttons section">
                                  <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" id="registrar" ><i class="icon-add_box right"></i>Registrar</button></a>
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
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/Solicitud/Solicitud.js"></script>
</body>
</html>