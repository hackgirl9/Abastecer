<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registrar Cargo</title>
    <link rel="stylesheet" type="text/css" href="Assets/css/materialize.min.css">
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
            <div class="container">
                <div class="row">
                    <form action="" method="post" class="col s12" id="cargo-form">
                        <div class="row">
                            <h3 class="center-align black-text">Registrar Cargo</h3>
                        </div>
                        <div class="row">
                            <div class="col s12 input-field">
                                <i class="icon-art_track prefix grey-text"></i>
                                <input id="cargoRol" type="text" name="cargoRol" class="validate" pattern="[A-Z ]+" title="Solo puede usar letras en MAYÚSCULAS." required>
                                <label for="cargoRol">Nombre del Cargo</label>
                            </div>
                            <div class="col s12 center-align buttons section">
                                <button type="submit" class="btn indigo-45deg-gradient-1 waves-effect" name="register" id="register"><i class="icon-add_box right"></i>Registrar</button>
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
    <script type="text/javascript" src="Assets/js/sweetalert.min.js"></script>
    <script type="text/javascript" src="Assets/js/exec.js"></script>
    <script type="text/javascript" src="Assets/js/AJAXController/CLAP/Cargo.js"></script>
</body>
</html>