<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Perfil - Abastecer C.A.</title>
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
                    <div class="col s12 m8 offset-m2">
                        <div class="card">
                            <div class="card-image">
                                <?php if($_SESSION['ROLUSUARIO']=='SuperUsuario'): ?>
                                <img src="Assets/img/SuperUser_Icon-1.png" alt="300"  class="responsive-img" style="width:auto;height: auto; !important ">
                                <?php endif;?>

                                <?php if($_SESSION['ROLUSUARIO']=='Administrador'): ?>
                                    <img src="Assets/img/Admin_Icon-2.png" alt="300"  class="responsive-img" style="width:auto;height: auto; !important ">
                                <?php endif;?>


                                <?php if($_SESSION['ROLUSUARIO']=='Usuario'): ?>
                                    <img src="Assets/img/User_Icon-1.png" alt="300"  class="responsive-img" style="width:auto;height: auto; !important ">
                                <?php endif;?>
                            </div>
                            <div class="card-content">
                                <span class="card-title center-align black-text">Información Personal</span>
                                <div class="row">
                                    <div class="col s12">
                                        <ul>
                                            <li><b>Nombre: </b> <?php echo  $_SESSION['NOMBREUSUARIO']; ?></li>
                                            <li><b>Apellido: </b><?php echo  $_SESSION['APELLIDOUSUARIO']; ?> </li>
                                            <li><b>Cedula: </b><?php echo  $_SESSION['CEDULAUSUARIO']; ?></li>
                                            <li><b>Usuario: </b><?php echo  $_SESSION['USUARIO']; ?></li>
                                            <li><b>E-mail: </b> <?php echo  $_SESSION['EMAILUSUARIO']; ?></li>
                                            <li><b>Teléfono: </b><?php echo  $_SESSION['TELEFONOUSUARIO']; ?></li>
                                            <li><b>Rol: </b> <?php echo  $_SESSION['ROLUSUARIO']; ?></li>
                                        </ul>
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
</body>
</html>