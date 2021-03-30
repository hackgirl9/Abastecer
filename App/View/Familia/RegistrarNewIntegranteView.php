<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Integrante de Familia</title>
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
<div class="card">
    <?php foreach($register as $family):?>

                <div class="container">
                    <div class="section">
                        <h3 class="center-align yellow-text text-darken-3">Registrar Nuevo Integrante a la Familia N° <?php echo $family->grupoFamiliar?></h3>
                    </div>
                </div>

               
<div class="row" >
<div class="col s12">

    <form action="" method="post" class="col s12">
        <input type="text" name="idFamilia" id="idFamilia" value="<?php echo $family->idFamilia?>">
        
         <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="nombreIntegrante" name="nombreIntegrante" class="validate" required>
                                <label for="nombreIntegrante">Nombres</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-person_pin prefix grey-text"></i>
                                <input type="text" id="apellidoIntegrante" name="apellidoIntegrante" class="validate" required>
                                <label for="apellidoIntegrante">Apellidos</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-chrome_reader_mode prefix grey-text grey-text"></i>
                                <input type="text" id="ciIntegrante" name="ciIntegrante" class="validate">
                                <label for="ciIntegrante">Cedula</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-date_range prefix grey-text"></i>
                                <input type="text" id="fechaNacimiento" name="fechaNacimiento" class="datepicker" required>
                                <label for="fechaNacimiento">Nacimiento</label>
                            </div>
                            <div class="col s12 m4 xl4 input-field">
                                <i class="icon-wc prefix grey-text"></i>
                                <select id="sexoIntegrante" name="sexoIntegrante">
                                    <option disabled selected>Seleccione</option>
                                    <option>F</option>
                                    <option>M</option>
                                </select>
                                <label for="sexoIntegrante">Sexo</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-contact_mail prefix grey-text"></i>
                                <input type="email" id="emailIntegrante" name="emailIntegrante" class="validate">
                                <label for="emailIntegrante">E-mail</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-phone prefix grey-text grey-text"></i>
                                <input type="text" id="telefonoIntegrante" name="telefonoIntegrante" class="validate">
                                <label for="telefonoIntegrante">Telefono</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-face prefix grey-text"></i>
                                <select id="rolIntegrante" name="rolIntegrante">
                                    <option disabled selected>Seleccione</option>
                                    <option>Jefe Hogar</option>
                                    <option>Integrante</option>
                                </select>
                                <label for="rolIntegrante">Rol</label>
                            </div>
                            <div class="col s12 m6 xl4 input-field">
                                <i class="icon-star prefix grey-text"></i>
                                <select id="manzanero" name="manzanero">
                                    <option disabled selected>Seleccione</option>
                                    <option>No</option>
                                    <option>Si</option>
                                </select>
                                <label for="manzanero">Manzanero</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" id="codCarnet" name="codCarnet" class="validate">
                                <label for="codCarnet">Código Carnet de la Patria</label>
                            </div>
                            <div class="col s12 m6 input-field">
                                <i class="icon-card_membership prefix grey-text"></i>
                                <input type="text" id="serialCarnet" name="serialCarnet" class="validate">
                                <label for="serialCarnet">Serial Carnet de la Patria</label>
                            </div>
                            <?php break;
                        endforeach; ?> 
                        <div class="row">
                            <div class="col s12 center-align">
                                <a href="<?php echo $helper->url('IntegranteFamilia','registerNewIntegrante')?>&idFamilia=<?php echo $family->idFamilia?>"><button type="submit" class="btn waves-effect waves-light indigo-45deg-gradient-1"><i class="icon-add_box right"></i>Registrar</button></a>
                            </div>
                        </div>
    </form>



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
</body>
</html>